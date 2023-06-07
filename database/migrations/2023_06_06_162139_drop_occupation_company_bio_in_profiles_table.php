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
        if (Schema::hasColumn('profiles', 'occupation')) {
            Schema::table('profiles', function (Blueprint $table) {
                $table->dropColumn('occupation');
            });
        }
        if (Schema::hasColumn('profiles', 'company')) {
            Schema::table('profiles', function (Blueprint $table) {
                $table->dropColumn('company');
            });
        }
        if (Schema::hasColumn('profiles', 'bio')) {
            Schema::table('profiles', function (Blueprint $table) {
                $table->dropColumn('bio');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('occupation')->nullable();
            $table->string('company')->nullable();
            $table->text('bio')->nullable();
        });
    }
};
