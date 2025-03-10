<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('people_amount');
            $table->integer('table_id');
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
