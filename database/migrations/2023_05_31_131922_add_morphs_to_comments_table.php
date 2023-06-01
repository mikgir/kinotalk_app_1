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
        Schema::table('comments', function (Blueprint $table) {
            $table->morphs('commentable');
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('comments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('comments', 'comments_commentable_type_commentable_id_index')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropForeign('comments_commentable_type_commentable_id_index');
            });
        }

        if (Schema::hasColumn('comments', 'commentable_id')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropColumn('commentable_id');
            });
        }

        if (Schema::hasColumn('comments', 'commentable_type')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropColumn('commentable_type');
            });
        }

        if (Schema::hasColumn('comments', 'parent_id')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropForeign('comments_parent_id_foreign');
                $table->dropColumn('parent_id');
            });
        }
    }
};
