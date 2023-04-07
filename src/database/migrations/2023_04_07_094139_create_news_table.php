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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->boolean("published")->default(0)->index();
            $table->enum("step", ['draft', 'revision', 'done'])->default('draft')->index();
            
            // Inside the News
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('content')->nullable();

            // On a list of News
            $table->text('short_title')->nullable();
            $table->text('short_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
