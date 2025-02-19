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
        Schema::table('users', function (Blueprint $table) {
            $table->string('rfc')->nullable();
            $table->string('contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('direccion')->nullable();
            $table->string('rol',1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rfc');
            $table->dropColumn('contacto');
            $table->dropColumn('telefono_contacto');
            $table->dropColumn('direccion');
            $table->dropColumn('rol');
        });
    }
};
