<?php

use App\Models\admin\File;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(File::class, 20)->create();
    }
}
