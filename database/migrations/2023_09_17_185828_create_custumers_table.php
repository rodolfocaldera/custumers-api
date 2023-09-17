<?php

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
        Schema::create('custumers', function (Blueprint $table) {
            $table->string("dni",45);
            $table->unsignedBigInteger('id_reg');
            $table->foreign('id_reg')->references('id')->on('region');
            $table->unsignedBigInteger('id_com');
            $table->foreign('id_com')->references('id')->on('communes');
            $table->string("email",120)->unique();
            $table->string("name",45);
            $table->string("last_name",45);
            $table->string("address",255)->nullable();
            $table->timestamp("date_reg");
            $table->enum('status', ['A', 'I', 'Trash'])->default('A');
            $table->primary(["dni","id_reg","id_com"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custumers');
    }
};
