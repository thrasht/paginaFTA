<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

use App\User;
use App\Sell;
use App\SellDescript;
use Illuminate\Http\Request;


class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
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
	public function store(CreateUserRequest $req)
	{
		$user = new User($req->all());
		$user->type = '1';
		$user->save();


		return redirect()->route('home')->withMessage('Usuario registrado, por favor inicia sesión');
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

	public function register()
	{
		return view('register');
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

	/**
	 * Display profile
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile()
	{
		if(\Auth::guest())
		{
			return redirect()->guest('auth/login');
		}
		else
			return view('profile');
	}

	/**
	 * User update his profile
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function userUpdate(Request $req)
	{
		if(\Auth::guest())
		{
			return redirect()->guest('auth/login');
		}
		else
		{
			$user = User::findOrFail(\Auth::user()->id);
			$user->full_name = $req->full_name;
			$user->user = $req->user;
			$user->email = $req->email;
			$user->save();

			return redirect()->back()->with('message', 'Datos actualizados');
		}
	}

	/**
	 * Display user address
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function address()
	{
		if(\Auth::guest())
		{
			return redirect()->guest('auth/login');
		}
		else
		{
			$user = User::find(\Auth::user()->id);
			return view('address', compact('user'));
		}
	}

	/**Edit the user address
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editAddress(Request $req)
	{
		if(\Auth::guest())
		{
			return redirect()->guest('auth/login');
		}
		else
		{
			$user = User::find(\Auth::user()->id);

			$user->street 	= $req->street;
			$user->number 	= $req->number;
			$user->zipcode 	= $req->zipcode;
			$user->city 	= $req->city;
			$user->state 	= $req->state;
			$user->phone 	= $req->phone;
			$user->save();

			return redirect()->back()->withMessage('Dirección actualizada');
		}
	}


	/**
	 * Display user orders
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function orders()
	{
		if(\Auth::guest())
		{
			return redirect()->guest('auth/login');
		}
		else
		{
			$orders = Sell::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);

			return view('orders', compact('orders'));
		}
	}

	/**
	 * Display order detail
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function detail(Request $req, $folio)
	{
		if(\Auth::guest())
		{
			return redirect()->guest('auth/login');
		}
		else
		{
			$details = SellDescript::where('sell_id', $folio)->get();

			return view('details', compact('details'));
		}
	}

}
