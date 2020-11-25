<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Henry (Admin)';
        $user->email = 'henry@root.com';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 1; #admin
        $user->save();

        $user = new User();
        $user->name = 'Henry (Creator)';
        $user->email = 'henry@creator.com';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 2; #creator
        $user->save();

        $user = new User();
        $user->name = 'Henry (Guest)';
        $user->email = 'henry@user.com';
        $user->password = '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq';
        $user->role_id = 3; #user
        $user->save();
    }
}
