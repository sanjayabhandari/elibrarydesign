<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_types')->insert([
            'id' => 1,
            'name' => 'Document',
            'description' => 'document description',
            'extension' => 'pdf,doc,txt,xls,pptx',
            'status' => 1,
        ]);
        DB::table('media_types')->insert([
            'id' => 2,
            'name' => 'Video',
            'description' => 'video description',
            'extension' => 'mp4,flv,webm,3gp,avi',
            'status' => 1,
        ]);
        DB::table('media_types')->insert([
            'id' => 3,
            'name' => 'Audio',
            'description' => 'auido description',
            'extension' => 'mp3,wav,aif,4mp',
            'status' => 1,
        ]);
    }
}
