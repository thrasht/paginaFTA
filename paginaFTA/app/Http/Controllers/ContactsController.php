<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Inbox;

use Illuminate\Http\Request;

class ContactsController extends Controller {

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
	public function store(ContactRequest $req)
	{
		$message = new Inbox($req->all());
		$message->save();


		return redirect()->route('contact')->withMessage('Mensaje enviado correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		if( \Auth::user() && \Auth::user()->type == 0)
		{
			$inbox = Inbox::get();
			return view('admin.contacts.inbox', compact('inbox'));
		}
		else
		{
			return view('contact');
		}
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

	public function open($id)
	{
		$message = Inbox::find($id);

		if($message->seen == 0)
		{
			$message->seen = 1;
			$message->save();
		}

		return view('admin.contacts.open', compact('message'));
	}

	public function reply(Request $req, $id)
	{
		$message = Inbox::find($id);
		$message->reply = $req->message;

		\Mail::send('asdf', ['mes' => $message], function ($msg) use ($message)
		{
			$msg->to($message->email, $message->name)->subject('RE: '.$message->subject);
		});
		$message->save();

		return view('admin.contacts.open', compact('message'));
	}

}
