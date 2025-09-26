<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klima extends Model
{
    /** @use HasFactory<\Database\Factories\KlimaFactory> */
    use HasFactory;
	protected $guarded = [];
	
	protected $casts = [
		'wifi_enabled' => 'boolean',
		'h_tarifa' => 'boolean',
		'in_stock' => 'boolean',
	];
	
	// Egy klíma egy brandhez tartozik
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
	public function getImageUrlAttribute()
	{
		return $this->image && file_exists(storage_path('app/public/' . $this->image))
			? asset($this->image)
			: asset('images/klimak/default.png');
	}
	public function getStockStatusAttribute()
	{
		return $this->in_stock ? 'Raktáron' : 'Rendelésre';
	}
	 // Hűtési energiaosztály automatikus getter
	public function getCoolingEnergyClassAttribute()
    {
        $seer = $this->seer;

        if (!$seer) {
            return null;
        }

        if ($seer >= 8.5) return 'A+++';
        if ($seer >= 6.1) return 'A++';
        if ($seer >= 5.6) return 'A+';
        if ($seer >= 5.1) return 'A';
        if ($seer >= 4.6) return 'B';
        if ($seer >= 4.1) return 'C';
        if ($seer >= 3.6) return 'D';
        if ($seer >= 3.1) return 'E';
        if ($seer >= 2.6) return 'F';
        return 'G';
    }
	public function getHeatingEnergyClassAttribute()
    {
        $scop = $this->scop;

        if (!$scop) {
            return null;
        }

        if ($scop >= 5.1) return 'A+++';
        if ($scop >= 4.6) return 'A++';
        if ($scop >= 4.1) return 'A+';
        if ($scop >= 3.6) return 'A';
        if ($scop >= 3.1) return 'B';
        if ($scop >= 2.6) return 'C';
        if ($scop >= 2.1) return 'D';
        if ($scop >= 1.6) return 'E';
        if ($scop >= 1.1) return 'F';
        return 'G';
    }
}
