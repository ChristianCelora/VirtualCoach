<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysiquesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('physiques', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->float('weight');
            $table->float('height');
            $table->timestamps();

            $table->index('client_id');
        });

        Schema::table('physiques', function (Blueprint $table) {
          $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('physiques', function(Blueprint $table){
           $table->dropForeign('lists_client_id_foreign');
           $table->dropIndex('lists_client_id_index');
           $table->dropColumn('client_id');
        });
    }
}
