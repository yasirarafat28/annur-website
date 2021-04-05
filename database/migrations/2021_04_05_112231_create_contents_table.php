<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->char('type')->default('contact');
            $table->text('title')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        DB::table('contents')->insert(
            [
                [
                    'type'=>'academy_maktab',
                    'title'=>'Maktab  Department',
                    'content'=>''
                ],
                [
                    'type'=>'academy_hifz',
                    'title'=>'Hifz  Department',
                    'content'=>''
                ],
                [
                    'type'=>'academy_kitab',
                    'title'=>'Kitab  Department',
                    'content'=>''
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
