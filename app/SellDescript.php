<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SellDescript extends Model {

	protected $table = 'sellDescript';
	public $timestamps = false;
	protected $fillable = ['sell_id', 'article_id', 'amount', 'subTotal'];


}
