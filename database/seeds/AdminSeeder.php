<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('username', 'superadmin')->first();

        if (is_null($admin)) {
            $admin           = new Admin();
            $admin->name     = "Jatinder Makker";
            $admin->email    = "jatinder@grizzlytrucks.ca";
            $admin->username = "jatinder";
            $admin->password = Hash::make('123456');
            $admin->save();
        }
    }
}
