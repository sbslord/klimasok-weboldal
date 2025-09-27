<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
	public function up()
	{
		Schema::create('carts', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
			$table->string('status')->default('pending'); // pending, paid, cancelled
			$table->timestamps();
		});
	}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
