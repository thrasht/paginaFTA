<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

	protected $table = 'cart';
	public $timestamps = false;

	protected $fillable = ['user_id', 'article_id', 'amount'];


	public function user()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function article()
	{
		return $this->hasOne('App\Article', 'id', 'article_id');
	}


}
