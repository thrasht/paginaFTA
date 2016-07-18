<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SellDescript extends Model {

	protected $table = 'sellDescript';
	public $timestamps = false;
	protected $fillable = ['sell_id', 'article_id', 'amount', 'subTotal'];


	public function article()
	{
		return $this->hasOne('App\Article', 'id', 'article_id');
	}

	public function sell()
	{
		return $this->belongsTo('App\Sell');
	}

}
