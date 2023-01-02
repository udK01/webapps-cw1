<?php

namespace Database\Seeders;

use App\Models\Handle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $h = new Handle();
        $h->handle_name = "dK932";
        $h->user_id = 1;
        $h->save();
    }
}
