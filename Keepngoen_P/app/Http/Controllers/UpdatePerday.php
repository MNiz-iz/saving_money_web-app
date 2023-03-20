<?php
namespace App\Http\Controllers;
//used model and request
use App\Models\Upperday;
use App\Models\Objective;
use App\Models\Objectivy;
use Illuminate\Http\Request;

class UpdatePerday extends Controller
{
    //show view for update saving data by fixed per day with data of this goal
    public function show(Upperday $upperday){
        $data = Objective::find($upperday); //find data by goal id
        return view('objectivies.updatefixed', compact('upperday'));
    }
    //save and update saving fiexed data to database
    public function update(Request $request, $id){
        $request->validate([
            'date'=>'required',
        ]); //check input form user

        $data = Objectivy::find($id); //find data by goal id
        //set kept from saving_perDay from database
        $kept = $data->saving_perDay;
        //calculation sum
        $sum = $data->sum_saving + $kept;
        $data->sum_saving = $sum;
        //if check sum_saving >= goal price set status is success
        if($data->sum_saving >= $data->goal_Keep){
            $data->status = 'success';
        };
        $data->save(); //save data to db
        return redirect()->route('objectivies.index')->with('success','The Goal has been edit success');
    }
}
