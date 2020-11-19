<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Trees extends Eloquent {
	protected $table = 'trees';
	protected $fillable =	[	
								"id",
								"name",
								"parent_id",
							];
}