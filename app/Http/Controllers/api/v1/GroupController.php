<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupMember;

class GroupController extends Controller
{
    public function Groups(){
        $groups = Group::with(['members'])->paginate(10);
        return response()->json([
            'error' => false,
            'message' => 'success',
            'data' => $groups,
        ]);
    }

    public function GroupMember(Request $request){
        $data = GroupMember::where('group_uid', $request->query('group_uid'))->get();
        return response()->json([
            'error' => false,
            'message' => 'success',
            'data' => $data,
        ]);
    }
}
