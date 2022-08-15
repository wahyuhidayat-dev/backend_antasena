<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('asset_id');
            $table->string('periode');
            $table->integer('revenue_usd');
            $table->integer('rate_idr');
            $table->integer('revenue_idr');
            $table->integer('label_revenue');
            $table->integer('get_ugc');
            $table->integer('marketing');
            $table->integer('share_revenue');
            $table->integer('tax');
            $table->integer('final_revenue');
            $table->integer('share');
            $table->integer('ads');
            $table->softDeletes();
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
        Schema::dropIfExists('reports');
    }
}
