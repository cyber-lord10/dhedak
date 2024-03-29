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
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marker_id')->unique(); 
            $table->float('lat');
            $table->float('lon');
            $table->tinyInteger('init_zoom')->default('13');
            $table->string('popup')->nullable();
            $table->string('tooltip')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('checked')->default('0');
            $table->timestamps();
        });

        // Schema::create('maps', function (Blueprint $table) {
        //   $table->id();
        //   $table->unsignedBigInteger('marker_id')->unique(); 
        //   $table->float('lat');
        //   $table->float('lon');
        //   $table->tinyInteger('init_zoom')->default('13');
        //   $table->string('popup')->nullable();
        //   $table->string('tooltip')->nullable();
        //   $table->longText('description')->nullable();
        //   $table->tinyInteger('checked')->default('0');
        //   $table->dateTime('created_at')->timestamp();
        //   $table->dateTime('updated_at')->default(currentTimeStamp());
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maps');
    }
};
