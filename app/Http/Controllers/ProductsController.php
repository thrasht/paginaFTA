<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Illuminate\Http\Request;

class ProductsController extends Controller {

	public function show()
	{
		$articles = Article::where('type_id',1)->get();

		return view('product', compact('articles'));
	}

}