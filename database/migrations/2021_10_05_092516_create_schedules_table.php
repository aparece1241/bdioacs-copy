<?php

use App\Models\Schedule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->string('contact_number');
            $table->date('dob');
            $table->text('address');
            $table->date('schedule_date');
            $table->time('schedule_time');
            $table->text('reason');
            $table->enum('type', ['online', 'physical'])->default('online');
            $table->json('images')->nullable();
            $table->float('temperature')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('status')->default(Schedule::PENDING);
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
        Schema::dropIfExists('schedules');
    }
}
