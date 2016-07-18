<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Cart;
use App\Sell;
use App\SellDescript;

use Illuminate\Http\Request;

class SellsController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$res = true;

		$cart = Cart::where('user_id', \Auth::user()->id)->get();

		foreach ($cart as $car) 
		{
			$art = Article::find($car->article_id);
			if ($art->available < $car->amount)
			{
				$res = false;
				break;
			}
		}

		if ($res == false)
		{
			return redirect()->back()->withErrors('No hay suficientes artículos en el inventario');
		}

		$cont = 0;

		$sell = new Sell();
		$sell->user_id = \Auth::user()->id;
		$sell->save();

		foreach($cart as $car)
		{
			$art = Article::find($car->article_id);
			$art->available = $art->available - $car->amount;
			$art->save();

			$desc = new SellDescript();
			$desc->sell_id 		= $sell->id;
			$desc->article_id 	= $car->article_id;
			$desc->amount 		= $car->amount;
			$desc->subTotal 	= $car->amount * $car->article->cost;
			$desc->save();
			$cont = $cont + $desc->subTotal;
		}

		$sell->sellTotal = $cont;
		$sell->save();

		foreach($cart as $car)
		{
			$car->delete();
		}


		return redirect()->route('profile.orders');
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		dd($id);
	}

	/**
	 * User removes the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function userDestroy($id)
	{
		$sell = Sell::find($id);

		if($sell->status_id < 4)
		{
			$descripts = SellDescript::where('sell_id', $id)->get();

			foreach ($descripts as $descript) 
			{

				$art = Article::find($descript->article_id);
				$art->available = $art->available + $descript->amount;
				$art->save();
			}

			$sell->cancel = true;
			$sell->seen = 2;
			$sell->save();
			
			return redirect()->back()->withMessage('Orden cancelada correctamente');
		}
		else
			return redirect()->back()->withErrors(['El pedido está en un estado en el que no se puede cancelar']);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editPayment($id)
	{
		
		return view('editPayment', compact('id'));
	}

	/**
	 * Show the form for upload the payment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function uploadPayment(Request $req, $folio)
	{
		$order = Sell::find($folio);
		if($req->hasFile('payment'))
		{
	 		$order->image = $req->file('payment')->getClientOriginalName();
			$req->file('payment')->move(base_path() . '/public/payments/', $order->image);
	 		$order->status_id = 2;
	 		$order->seen = 0;
	 		$order->save();
 		}

 		if($req->comment)
 		{
 			$order->comments = $req->comment;
 			$order->status_id = 2;
 			$order->seen = 0;
 			$order->save();
 		}

 		$details = SellDescript::where('sell_id', $folio)->get();

 		return redirect()->route('profile.orders.detail', ['folio' => $folio])->withMessage('Pago actualizado correctamente');
	}

	public function orderList()
	{
		$orders = Sell::orderBy('created_at', 'desc')->get();


		return view('admin.orders.list', compact('orders'));
	}

	public function orderDetail($id)
	{
		$details = SellDescript::where('sell_id', $id)->get();


		return view('admin.orders.detail', compact('details'));
	}

	public function orderAprove($id)
	{
		$order = Sell::find($id);

		$order->seen = 1;
		$order->status_id = $order->status_id + 1;

		$order->save();

		return redirect()->back();
	}

	public function orderShipping(Request $req, $id)
	{
		$ord = Sell::find($id);

		$ord->shipping = $req->shipping;
		$ord->tracking = $req->tracking;
		$ord->seen = 1;
		$ord->status_id = 4;
		$ord->save();

		return redirect()->back()->withMessage('Has actualizado correctamente la información del envío'); 

	}

	public function closeOrder($id)
	{
		$ord = Sell::find($id);
		$ord->status_id = 5;
		$ord->seen = 2;
		$ord->save();

		return redirect()->back()->withMessage('¡Has completado tu compra con éxito!');
	}


}
