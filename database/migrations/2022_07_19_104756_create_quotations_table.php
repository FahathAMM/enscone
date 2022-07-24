<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('client')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('address')->nullable();
            $table->string('project')->nullable();
            $table->string('dated')->nullable();
            $table->string('quote_ref')->nullable();

            $table->longText('payment_term')->nullable();

            $table->unsignedBigInteger('term_id')->nullable();
            $table->unsignedBigInteger('work_id')->nullable();


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
        Schema::dropIfExists('quotations');
    }
}
