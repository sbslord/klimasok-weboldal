<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;
	protected $guarded = [];
	
	// Egy brandhez több klíma tartozhat
    public function klimas()
    {
        return $this->hasMany(Klima::class);
    }
}
