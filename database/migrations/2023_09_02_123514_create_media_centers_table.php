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
        Schema::create('media_centers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'unactive', 'scheduled'])->default('active');
            $table->timestamp('publication_at');
            $table->bigInteger('visited_count')->default(0);
            $table->string('slug')->unique();
            $table->string('type');
            $table->string('basicFile');
            $table->enum('showInSlider', ['yes', 'no'])->default('no');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_centers');
    }
};
