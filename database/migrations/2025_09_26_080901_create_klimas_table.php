<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('klimas', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade');
			$table->foreignIdFor(Brand::class)->constrained('brands')->onDelete('cascade');
			$table->string('name');                 // termék neve
			$table->string('image')->nullable()->after('name'); 
			$table->decimal('price', 10, 2);        // ár, pontosabb pénzügyi mező
			$table->text('description')->nullable(); // leírás
			//$table->string('brand');                // márka

			$table->decimal('cooling_capacity', 8, 2)->nullable(); // hűtőteljesítmény (kW)
			$table->decimal('heating_capacity', 8, 2)->nullable(); // fűtőteljesítmény (kW)
			$table->decimal('seer', 5, 2)->nullable(); // hűtési hatékonyság
			$table->decimal('scop', 5, 2)->nullable(); // fűtési hatékonyság
			$table->integer('noise_level')->nullable();            // zajszint (dB)
			$table->integer('warranty_years')->nullable(); // garancia évben
			$table->integer('heating_min_temp')->nullable(); // Fűtési működési tartomány minimum (°C)
			$table->integer('heating_max_temp')->nullable(); // Fűtési működési tartomány maximum (°C)
			$table->integer('cooling_min_temp')->nullable(); // Hűtési működési tartomány minimum (°C)
			$table->integer('cooling_max_temp')->nullable(); // Hűtési működési tartomány maximum (°C)
			$table->boolean('wifi_enabled')->default(false);       // wifi (igen/nem)
			$table->string('refrigerant_type')->nullable();        // gáz típusa
			$table->boolean('extra_filter')->default(false);            // extra szűrő 
			$table->boolean('h_tarifa')->default(false); // H tarifa támogatás
			$table->boolean('in_stock')->default(true);
			$table->boolean('featured')->default(false);

			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klimas');
    }
};
