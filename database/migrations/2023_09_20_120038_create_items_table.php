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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('lot_number')->nullable(false);
            $table->string('name_of_artist')->nullable(false);
            $table->year('year_work_produced')->nullable(false);
            $table->string('subject_classification')->nullable(false);
            $table->longText('description')->nullable(false);
            $table->longText('auction_date')->nullable();
            $table->double('estimated_price')->nullable(false);
            $table->boolean('is_archived')->nullable();
            $table->string('category')->nullable('false');
            $table->string('image_type')->nullable();
            $table->string('dimension')->nullable();
            $table->string('drawing_medium')->nullable();
            $table->boolean('framed')->nullable();
            $table->string('material_used')->nullable();
            $table->double('weight')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
