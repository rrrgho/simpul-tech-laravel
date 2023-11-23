<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;
    protected $table = 'group_members';

    public function user_info(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
