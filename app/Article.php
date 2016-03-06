<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $table = 'articles';

	protected $fillable = ['id', 'type_id', 'name', 'cost', 'image', 'available', 'description'];


	public function type()
	{
		return $this->hasOne('App\ArticleType', 'id', 'type_id');
	}
	
}
