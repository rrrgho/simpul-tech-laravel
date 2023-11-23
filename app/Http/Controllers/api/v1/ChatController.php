<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use Auth;

class ChatController extends Controller
{
    public function ChatRoom(Request $request){
        $queryWhere = [
            ['group_id', $request->query('group_id')]
        ];
        $chats = Chat::where($queryWhere)->paginate(1000);
        return response()->json([
            'error' => false,
            'message' => 'success',
            'data' => $chats
        ]);
    }

    public function SendMessage(Request $request){
        $user = Auth::user();
        $id = Chat::latest()->first()->id + 1;

        $create = Chat::create([
            'id' => $id,
            'user_id' => $user->id,
            'group_id' => $request->group_id,
            'message' => $request->message,
        ]);        
        if($create){
            return response()->json([
                'error' => false,
                'message' => 'success',
                'data' => $create
            ]);
        }
    }
}
