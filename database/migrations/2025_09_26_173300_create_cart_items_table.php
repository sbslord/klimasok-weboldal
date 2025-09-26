<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Cart;
use App\Models\Klima;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
	{
		Schema::create('cart_items', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Cart::class)->constrained()->onDelete('cascade');
			$table->foreignIdFor(Klima::class)->constrained()->onDelete('cascade');
			$table->integer('quantity')->default(1);
			$table->decimal('price', 10, 2); // aktuális ár megőrzése
			$table->boolean('with_install')->default(false);
			$table->integer('install_price')->nullable()->default(0);
			$table->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
