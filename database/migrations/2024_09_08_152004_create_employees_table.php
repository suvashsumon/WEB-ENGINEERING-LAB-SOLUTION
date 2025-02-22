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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name", length: 255)->nullable(false);
            $table->string("designation", length: 100)->nullable(false);
            $table->date("joining_date")->nullable(false);
            $table->float("salary")->nullable(false);
            $table->string("email")->nullable(true);
            $table->string("mobile_no")->nullable(false);
            $table->text("address");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
