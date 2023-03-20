<?php

namespace App\Http\Controllers;

//used Model and request and authentication
use Illuminate\Http\Request;
use App\Models\Objective;
use App\Models\Objectivy;
use App\Models\Upgoal;
use App\Models\Upkeep;
use Illuminate\Support\Facades\Auth;


class UpdateKeep extends Controller
{
    //show view index_goalsuccess with find data
    public function index(){
        $user_id = Auth::id(); //call user id by authentication
        //find data by user id with condition statud == success
        $datas = Objective::find($user_id)->where('status','LIKE','success')->orderBy('id', 'asc')->paginate(2);
        return view('objectivies.index_goalsuccess')->with('datas',$datas);
    }
    //show view update by user with data this goal
    public function show(Upkeep $upkeep){
        $data = Objective::find($upkeep); //find data by id of goal
        return view('objectivies.updatebyuser', compact('upkeep'));
    }
}
