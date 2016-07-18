<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\Cart;
use App\ArticleType;

use Illuminate\Http\Request;

class ArticlesController extends Controller {


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
	public function create($type)
	{

		return view('admin.articles.create', compact('type'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $req)
	{
		$type = ArticleType::where('name', $req->type)->first();

		$art = new Article($req->all());
		$art->type_id = $type->id;
		$art->image = $req->file('image')->getClientOriginalName();
		$req->file('image')->move(base_path() . '/public/articles/', $art->image);
		$art->save();
		
		return redirect()->route('article', $art->type->name)->withMessage('Has agregado un elemento al inventario con éxico');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name)
	{

		$articles = \DB::table('articles')
					->leftjoin('articleTypes', 'articles.type_id', '=', 'articleTypes.id')
					->select(\DB::raw('articles.id as id, articles.name as name, cost, image, available, description, articleTypes.id as idType, articleTypes.name as nameType'))
					->where('articleTypes.name', '=', $name )
					->get();
		//$articles = Article::where('type_id',$name)->get();

		return view('product', compact('articles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$art = Article::find($id);

		return view('admin.articles.edit', compact('art', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $req, $id)
	{
		$art = Article::find($id);

		$art->name = $req->name;
		$art->cost = $req->cost;
		$art->available = $req->available;
		$art->description = $req->description;	

		if($req->hasFile('image'))
		{
			$art->image = $req->file('image')->getClientOriginalName();
			$req->file('image')->move(base_path() . '/public/articles/', $art->image);
		}

		$art->save();


		return redirect()->back()->withMessage('Se ha actualizado con éxito');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::destroy($id);

		return redirect()->back()->withMessage('Articulo eliminado correctamente');
	}

	public function add($type)
	{

	}

}
