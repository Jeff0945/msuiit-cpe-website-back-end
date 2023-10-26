<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('merch_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merch_id')->constrained();
            $table->text('name');
            $table->boolean('is_available');
            $table->tinyInteger('order');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merch_sizes');
    }
};
