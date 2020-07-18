<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all__events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('event_type')->nullable();
            $table->longText('event_name')->nullable();
            // $table->longText('cities')->nullable();
            // $table->longText('countries')->nullable();
            // $table->longText('categories')->nullable();
            // $table->longText('icons')->nullable();
            // $table->longText('img')->nullable();
            $table->longText('description')->nullable();
            $table->longText('banner')->nullable();
            $table->longText('discount')->nullable();
            // $table->longText('location')->nullable();
            $table->longText('price')->nullable();
            // $table->longText('about')->nullable();
            $table->longText('itinerary')->nullable();
            $table->longText('inclusion')->nullable();
            $table->longText('exclusion')->nullable();
            $table->longText('code')->nullable();
            $table->longText('duration')->nullable();
            $table->longText('added_by')->nullable();
            $table->longText('terms_conditions')->nullable();
            $table->longText('payment_policy')->nullable();
            $table->longText('payment_methods')->nullable();
            $table->longText('cancellation_policy')->nullable();
            $table->longText('visa_info')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('questions')->nullable();
            $table->longText('group_size')->nullable();
            $table->longText('tour_code')->nullable();
            $table->longText('destinations')->nullable();
            $table->longText('start_location')->nullable();
            $table->longText('end_location')->nullable();
            $table->longText('tour_style')->nullable();
            $table->longText('tour_language')->nullable();
            $table->longText('avalibility_details')->nullable();
            $table->longText('transport_details')->nullable();
            $table->longText('accomodation_details')->nullable();
            $table->longText('meals_details')->nullable();
            $table->longText('guide_details')->nullable();
            $table->longText('status')->nullable();

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
        Schema::dropIfExists('all__events');
    }
}
