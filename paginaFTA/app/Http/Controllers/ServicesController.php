<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Http\Request;

class ServicesController extends Controller {

	public function show()
	{
		$articles = Article::where('type_id',2)->get();

		return view('service', compact('articles'));
	}

}