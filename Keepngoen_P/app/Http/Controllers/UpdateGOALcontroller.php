<?php

namespace App\Http\Controllers;

//used Model and request
use Illuminate\Http\Request;
use App\Models\Objective;
use App\Models\Objectivy;
use App\Models\Upgoal;


class UpdateGOALcontroller extends Controller
{
    //return view for update saving with this goal
    public function show(Upgoal $upgoal){
        $data = Objective::find($upgoal);
        return view('objectivies.updateKeepngoen', compact('upgoal'));
    }

    //update data saving to db by user 
    public function update(Request $request, $id){
        $request->validate([
            'kept'=>'required',
            'date'=>'required',
        ]); //check input from user 
        //set data for save to db
        
        $data = Objectivy::find($id); //find data from database by id
        //calculation sum saving with input
        $sum = $data->sum_saving  + $request->input('kept'); 
        $data->sum_saving = $sum; 
        //if check sum_saving >= goal price set status is success
        if($data->sum_saving >= $data->goal_Keep){
            $data->status = 'success';
        };
        $data->save(); //save data to database

        return redirect()->route('objectivies.index')->with('success','The Goal has been edit success');
    }
}
