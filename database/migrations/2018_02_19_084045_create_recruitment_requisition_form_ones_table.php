<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentRequisitionFormOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_requisition_form_ones', function (Blueprint $table) {
            $table->increments('id');
             $table->string('unit_name')->nullable();
            $table->string('position')->nullable();
            $table->integer('no_of_employees_required')->nullable();
            $table->integer('no_of_existing_positions')->nullable();
            $table->string('department')->nullable();
            $table->string('vacancy_created_on')->nullable();
            $table->string('anticipated_start_date')->nullable();
            $table->string('last_hiring_for_same')->nullable();
            $table->string('replaced_employee_name')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('replaced_employee_designation')->nullable();
            $table->string('requester_designation')->nullable();
            $table->string('education')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('training')->nullable();
            $table->string('skills')->nullable();
            $table->string('additional_requirements')->nullable();
            $table->text('remarks')->nullable();
            $table->string('internal_or_transfer')->nullable();
            $table->string('newspaper')->nullable();
            $table->string('online')->nullable();
            $table->string('cv_bank')->nullable();
            $table->string('referral')->nullable();
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
        Schema::dropIfExists('recruitment_requisition_form_ones');
    }
}
