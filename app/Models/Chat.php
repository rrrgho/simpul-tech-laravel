<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'group_chats';
    protected $guarded = [];

    protected $appends = ['name'];
    protected $hidden = ['user'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getNameAttribute(){
        return $this->user->name;
    }
}
