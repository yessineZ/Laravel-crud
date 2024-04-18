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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name') ; 
            $table->string('origin') ;
            $table->integer('price') ;
             $table->renameColumn('origin', 'Country');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_name', function (Blueprint $table) {
            // Rename the column
            $table->renameColumn('origin', 'Country');
        });
        Schema::dropIfExists('computers');
    }
};