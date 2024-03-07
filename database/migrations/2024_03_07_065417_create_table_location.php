<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('area')->nullable();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('locations')->insert([
            [
                'name' => "Hà Nội",
                'area' => "Miền bắc"
            ],
            [
                'name' => "Quy Nhơn",
                'area' => "Miền trung"
            ],
            [
                'name' => "Hồ Chí Minh",
                'area' => "Miền nam"
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
