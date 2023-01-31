<?php

use App\Models\Ritual;
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
        Schema::create('rituals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ritual::class, 'user_id');
//            $table->unsignedBigInteger('user_id')->nullable();
//            $table->index('user_id', 'ritual_user_idx');
//            $table->foreign('user_id', 'ritual_user_fk')
//                ->on('users')->references('id');

            $table->unsignedTinyInteger('order_number');
            $table->unsignedTinyInteger('size');
            $table->string('shape');
            $table->string('holes');
            $table->boolean('cross');
            $table->boolean('photo');
            $table->string('epitaph')->nullable();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('patronymic')->nullable();
            $table->date('birthday')->nullable();
            $table->date('day_of_death')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rituals');
    }
};
