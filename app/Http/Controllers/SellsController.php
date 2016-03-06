<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
		$cont = 0;

		$sell = new Sell();
		$sell->user_id = \Auth::user()->id;
		$sell->save();

		$cart = Cart::where('user_id', \Auth::user()->id)->get();

		foreach($cart as $car)
		{
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



		return view('home');
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
		//
	}

}
