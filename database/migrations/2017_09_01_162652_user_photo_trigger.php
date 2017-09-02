<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPhotoTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_User_Photo AFTER INSERT ON `users` FOR EACH ROW
        BEGIN
         INSERT INTO photos (`user_id`, `link`) 
         VALUES (NEW.id, "default-avatar.jpg"); 
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_User_Photo`');
    }
}
