<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klima extends Model
{
    /** @use HasFactory<\Database\Factories\KlimaFactory> */
    use HasFactory;
	protected $guarded = [];
	
	// Egy klíma egy brandhez tartozik
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
	public function getImageUrlAttribute()
	{
		return $this->image && file_exists(storage_path('app/public/' . $this->image))
			? asset('images/' . $this->image)
			: asset('images/klimak/default.png');
	}
}
