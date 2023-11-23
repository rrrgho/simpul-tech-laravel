<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\GroupMember;
use App\Models\Group;
use Carbon\Carbon;

class GroupMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $group = Group::all();
        $group_queue = $group[0];
        foreach($users as $user){            
            GroupMember::create([
                'user_id' => $user->id,
                'group_id' => $group_queue->id,
                'join_date' => Carbon::now()
            ]);
        }
    }
}
