<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('username');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('postcode');
            $table->string('city');
            $table->string('contact_telephone_number');
            $table->boolean('is_newsletter_subscriber');
            $table->unsignedTinyInteger('customer_type');
            $table->timestamps();

            // specify foreign key between customers and users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
