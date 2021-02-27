<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->char('slug')->nullable();
            $table->longText('title')->nullable();
            $table->longText('image')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
        });

        DB::table('page_contents')->insert([
            [
                'title'=>'Know Us',
                'content'=>'lorem3',
                'slug'=>'know_us'
            ],
            [
                'title'=>'Contact Us',
                'content'=>'lorem3',
                'slug'=>'contact_us'
            ],
            [
                'title'=>'Appointment',
                'content'=>'lorem3',
                'slug'=>'appointment'
            ],
            [
                'title'=>'Happy Patients',
                'content'=>'lorem3',
                'slug'=>'happy_patients'
            ],
            [
                'title'=>'Testimonials',
                'content'=>'lorem3',
                'slug'=>'testimonials'
            ],
            [
                'title'=>'Media Release',
                'content'=>'lorem3',
                'slug'=>'media_release'
            ],
            [
                'title'=>'About CP Treatment',
                'content'=>'lorem3',
                'slug'=>'about_cp'
            ],
            [
                'title'=>'Gallery',
                'content'=>'lorem3',
                'slug'=>'gallery'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_contents');
    }
}
