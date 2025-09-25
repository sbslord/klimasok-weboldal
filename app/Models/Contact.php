<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
	protected $fillable = [
		'user_id',
		'name',
		'email',
		'phone',
		'message'
	];
	
	public function user(){
		return $this->belongsTo(User::class);
	}
}
