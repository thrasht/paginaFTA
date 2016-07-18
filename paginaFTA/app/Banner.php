<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {

	protected $table = 'banner';
	public $timestamps = false;
	protected $fillable = ['id', 'description', 'position', 'imagen'];


}
