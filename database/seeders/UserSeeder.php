<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    

    public function run()
    {
        // \App\Models\User::factory()->create();

        $user=User::where('email','smo@gmail.com')->first();
        if(is_null($user))
        {
            $user=new User();
            $user->name='smo';
            $user->email='smo@gmail.com';
            $user->email_verified_at= now();
            $user->password= Hash::make('12345678'); // 12345678
            $user->remember_token=Str::random(10);
            $user->save();
            
    }
}
}
