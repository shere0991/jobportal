<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentRequisitionFormTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_requisition_form_twos', function (Blueprint $table) {
            $table->increments('id');
             $table->string('head_office')->nullable();
             $table->string('factory')->nullable();
             $table->string('field')->nullable();
             $table->string('permanent')->nullable();
             $table->string('contract')->nullable();
             $table->string('temporary')->nullable();
             $table->string('casual')->nullable();
             $table->string('slary_grade')->nullable();
             $table->string('job_class')->nullable();
             $table->text('comments')->nullable();
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
        Schema::dropIfExists('recruitment_requisition_form_twos');
    }
}
