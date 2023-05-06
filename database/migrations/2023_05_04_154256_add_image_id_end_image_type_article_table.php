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
        Schema::table('articles', function (Blueprint $table){
            $table->bigInteger('image_id')->unsigned()->index()->nullable();
            $table->enum('image_type', ['Article', 'News', 'Avatar'])
                ->default('Article')
                ->nullable();

            $table->foreign('image_id')
                ->references('id')
                ->on('media');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table){
            $table->dropForeign('image_id');
            $table->dropColumn('image_id');
            $table->dropColumn('image_type', ['Article', 'News', 'Avatar']);
        });
    }
};
