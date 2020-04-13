<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutHistory extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('workout_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("training_id");
            $table->dateTime("start");
            $table->dateTime("end")->nullable();
            $table->integer("last_step")->nullable();

            $table->index('client_id');
            $table->index('training_id');
        });

        Schema::table('workout_history', function (Blueprint $table) {
           $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
           $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('workout_history', function(Blueprint $table){
           $table->dropForeign('workout_history_client_id_foreign');
           $table->dropIndex('workout_history_client_id_index');
           $table->dropColumn('training_id');
           $table->dropForeign('workout_history_training_id_foreign');
           $table->dropIndex('workout_history_training_id_index');
           $table->dropColumn('client_id');
        });
    }
}
