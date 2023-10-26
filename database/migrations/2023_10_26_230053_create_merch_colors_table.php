<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('merch_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merch_id')->constrained();
            $table->string('image_src');
            $table->string('image_alt');
            $table->string('color');
            $table->string('selected_color');
            $table->tinyInteger('order');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merch_colors');
    }
};
