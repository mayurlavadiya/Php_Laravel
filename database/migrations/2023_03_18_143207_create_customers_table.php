<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            
            // By default created this 2 fields
            $table->id('customer_id'); //  by default
            $table->timestamps(); // by default ...created_ad, updated_at

            // made by us
            $table->string('name',60); // name string ma and 60 character sudhi lkhva mate
            $table->string('email',100); // email
            $table->enum('gender',["M","F"]); // fakat selected data mate...array bnavine store kryu male k female
            $table->text('address');
            $table->date('dob');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
