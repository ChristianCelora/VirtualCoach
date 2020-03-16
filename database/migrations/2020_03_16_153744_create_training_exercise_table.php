<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingExerciseTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('training_exercise', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('exercise_id');
            $table->integer('order');
            $table->integer('sets');
            $table->string('reps'); // String because reps can change between sets
            $table->string('rest_between_sets');
            $table->longText('trainer_notes')->nullable();
            $table->longText('client_notes')->nullable();

            $table->index('trainer_id');
            $table->index('exercise_id');
        });

        Schema::table('training_exercise', function (Blueprint $table) {
           $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('training_exercise', function(Blueprint $table){
           $table->dropForeign('lists_trainer_id_foreign');
           $table->dropIndex('lists_trainer_id_index');
           $table->dropColumn('trainer_id');
           $table->dropForeign('lists_exercise_id_foreign');
           $table->dropIndex('lists_exercise_id_index');
           $table->dropColumn('exercise_id');
        });
    }
}
