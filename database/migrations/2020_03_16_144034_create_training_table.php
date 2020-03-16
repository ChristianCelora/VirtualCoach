<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up(){
      Schema::create('trainings', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('client_id');
            $table->longText('notes')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index('trainer_id');
            $table->index('client_id');
        });

        Schema::table('trainings', function (Blueprint $table) {
           $table->foreign('trainer_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('trainings', function(Blueprint $table){
           $table->dropForeign('lists_trainer_id_foreign');
           $table->dropIndex('lists_trainer_id_index');
           $table->dropColumn('trainer_id');
           $table->dropForeign('lists_client_id_foreign');
           $table->dropIndex('lists_client_id_index');
           $table->dropColumn('client_id');
        });
    }
}
