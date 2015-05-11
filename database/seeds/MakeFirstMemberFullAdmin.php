<?php

use Illuminate\Database\Seeder;

use App\User;

class MakeFirstMemberFullAdmin extends Seeder {

    public function run()
    {
        // Getting the first user
        $first = User::find(1);

        // We place the first user in every category
        foreach (range(1, 5) as $i)
        {
            $first->attachRole($i);
        }
    }
}
