<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_books', function (Blueprint $table) {
            $table->unsignedInteger('Book_RackID');
            $table->string('Book_ID', 50);
            $table->string('Book_Title', 50);
            $table->string('Book_Author', 50);
            $table->string('Book_PublisheYear', 50);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->primary('Book_ID');
            $table->foreign('Book_RackID')->references('Rack_ID')->on('lms_racks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
