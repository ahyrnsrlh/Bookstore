<?php

namespace Database\Seeders;

use App\Models\Setting;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Setting::create([
    		'name' => 'Bookstore',
    		'description' => 'A place to buy book with a lot of virus',
    		'logo' => 'default.jpg'
    	]);
    }
}
