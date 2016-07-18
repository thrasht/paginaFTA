<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Banner;

use Illuminate\Http\Request;

class BannersController extends Controller {


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
		$ban = new Banner();

		$ban->description = $req->description;
		$ban->imagen = 'banner' . $ban->id . '.' . $req->file('imagen')->getClientOriginalExtension();
		$req->file('imagen')->move(base_path() . '/public/banner/', $ban->imagen);

		$ban->save();


		return redirect()->route('banner.edit')->withMessage('Has agregado una imagen al Banner');
		
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
		$banner = Banner::orderBy('position', 'asc')->get();


		return view('admin.editBanner', compact('banner'));
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
		Banner::destroy($id);

		return redirect()->back()->withMessage('Has eliminado una imagen del Banner');
	}

}
