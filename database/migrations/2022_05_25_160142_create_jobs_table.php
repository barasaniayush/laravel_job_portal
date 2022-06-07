<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('company_id')->constrained();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('roles');
            $table->foreignId('category_id')->constrained();
            $table->string('position');
            $table->string('address');
            $table->string('type');
            $table->integer('status');
            $table->date('last_date');
            $table->integer('no_of_vacancy');
            $table->timestamps();
        });
        return redirect()->back()->with('message', 'Job posted successfully');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
