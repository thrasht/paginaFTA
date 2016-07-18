<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cart;

use Illuminate\Http\Request;


class CartsController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

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
	public function store(Request $req)
	{
		$art = Cart::where('article_id', $req->article_id)->first();

		if($art)
		{
			$art->amount = $art->amount + $req->amount;
			$art->save();
		}
		else
		{
			$cart = new Cart($req->all());
			$cart->user_id 	= \Auth::user()->id; 

			$cart->save();
		}

		
		return redirect()->back();	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

		$carts = Cart::where('user_id', \Auth::user()->id)->get();

		return view('cart', compact('carts'));
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
		$art = Cart::destroy($id);


		return redirect()->back();
	}

}