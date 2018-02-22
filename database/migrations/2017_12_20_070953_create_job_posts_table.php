<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->string('JobTitle')->nullable();
            $table->integer('NoofVacancies')->nullable();
            $table->text('ApplyInstruction')->nullable();
            $table->string('ApplicationDeadline')->nullable();
            $table->integer('AgeRangeFrom')->nullable();
            $table->integer('AgeRangeTo')->nullable();
            $table->integer('Gender')->nullable();
            $table->string('JobType')->nullable();
            $table->string('JobLevel')->nullable();
            $table->text('EducationalQualification')->nullable();
            $table->text('JobContext')->nullable();
            $table->text('JobDescription')->nullable();
            $table->text('AdditionalJobRequirements')->nullable();
            $table->integer('ExperienceRequiredOption')->nullable();
            $table->integer('MinimumExperience')->nullable();
            $table->integer('MaximumExperience')->nullable();
            $table->text('JobLocation')->nullable();
            $table->integer('SalaryRangeOption')->nullable();
            $table->integer('MinimumSalaryRange')->nullable();
            $table->integer('MaximumSalaryRange')->nullable();
            $table->text('SalaryDetails')->nullable();
            $table->text('OtherBenefits')->nullable();
            $table->integer('status')->default(0);
            $table->integer('deleted')->default(0);
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
        Schema::dropIfExists('job_posts');
    }
}
