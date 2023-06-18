<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('comments', 'article_id')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropForeign('comments_article_id_foreign');
                $table->dropColumn('article_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('article_id')
                ->nullable()
                ->constrained('articles')
                ->onDelete('cascade');
        });
    }
};
