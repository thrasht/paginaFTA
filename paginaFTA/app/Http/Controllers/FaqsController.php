<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Faq;

use Illuminate\Http\Request;

class FaqsController extends Controller {



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
		return view('admin.faqs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		$faq = new Faq($req->all());
		$faq->save();

		return redirect()->route('faq')->withMessage('Pregunta agregada correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		//faqs = \DB::table('faqs')->get();

		$faqs = Faq::paginate(6);

		return view('faq', compact('faqs'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$faq = Faq::find($id);

		return view('admin.faqs.edit', compact('faq'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req, $id)
	{
		$faq = Faq::find($id);

		$faq->question = $req->question;
		$faq->answer = $req->answer;
		$faq->save();

		return redirect()->back()->withMessage('Pregunta actualizada');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Faq::destroy($id);

		return redirect()->back()->withMessage('Pregunta eliminada con éxito');
	}

}
