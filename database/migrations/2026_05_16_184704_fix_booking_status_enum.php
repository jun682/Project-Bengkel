<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("UPDATE bookings SET status = 'Menunggu' WHERE status NOT IN ('Menunggu', 'Dikerjakan', 'Selesai')");
    }

    public function down()
    {
        // No action needed
    }
};
