<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model {

	protected $table = 'sells';
	protected $fillable = ['id', 'user_id', 'sellTotal'];


	public function sellDescript()
    {
        return $this->hasMany('App\SellDescript', 'sell_id', 'id');
    }

}
