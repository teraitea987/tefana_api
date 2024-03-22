<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('adress');
            $table->string('phone_number')->nullable();
            $table->string('club_name')->nullable();
            $table->date('birthday_date');
            $table->string('picture_url')->nullable();
            $table->integer('licence_category_1');
            $table->integer('licence_category_2')->nullable();
            $table->integer('licence_category_3')->nullable();
            $table->date('licence_season_1');
            $table->date('licence_season_2')->nullable();
            $table->date('licence_season_3')->nullable();
            $table->integer('licence_number_1');
            $table->integer('licence_number_2')->nullable();
            $table->integer('licence_number_3')->nullable();
            $table->string('country');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};
