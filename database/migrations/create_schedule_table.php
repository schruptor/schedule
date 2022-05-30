<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->string('command');
            $table->string('expression');
            $table->boolean('evenInMaintenanceMode');
            $table->boolean('withoutOverlapping');
            $table->string('user')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedule');
    }
};
