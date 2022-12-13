<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ashram_visitors', function (Blueprint $table) {
            $table->enum('checkin_status', [0, 1])->after('number_of_person')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ashram_visitors', function (Blueprint $table) {
            $table->dropColumn('checkin_status');
        });
    }
};
