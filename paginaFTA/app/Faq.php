<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Faq extends Model {

	protected $table = 'faqs';
	protected $fillable = ['question', 'answer'];
	public $timestamps = false;

}
