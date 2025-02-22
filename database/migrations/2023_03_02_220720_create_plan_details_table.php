<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('plan_name');

            $table->foreignId('plan_category_id')
                ->constrained('plan_categories')
                ->onDelete('cascade');

            $table->foreignId('bmi_detail_id')
                ->constrained('bmi_details')
                ->onDelete('cascade');
                
            $table->string('duration');
            $table->text('description');
            $table->text('suggestion');
            
            $table->string('file_path')->nullable();
            $table->string('file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_details');
    }
}
