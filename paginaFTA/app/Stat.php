<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model {

	protected $table = 'status';
	protected $fillable = ['id', 'name'];

}
