<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            $table->boolean('learnable')->default(true);
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->boolean('learnable')->default(true);
        });

        Schema::table('mind_notes', function (Blueprint $table) {
            $table->boolean('learnable')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            $table->dropColumn('learnable');
        });
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('learnable');
        });
        Schema::table('mind_notes', function (Blueprint $table) {
            $table->dropColumn('learnable');
        });
    }
};
