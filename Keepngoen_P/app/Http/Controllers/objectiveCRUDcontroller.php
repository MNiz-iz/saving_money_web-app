<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use App\Models\Objectivy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class objectiveCRUDcontroller extends Controller
{

    //create index with show data by user id and condition is status  == unsuccess 
    public function index() {
        $user_id = Auth::id();
        $datas = Objective::find($user_id)->where('status','LIKE','unsuccess')->orderBy('id', 'asc')->paginate(2);
        return view('objectivies.index')->with('datas',$datas);
    }

    //return create page
    public function create() {
        return view('objectivies.create1');
    }

    //create save data from create
    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'picture'=>'required',
            'price'=>'required',
            'start_d'=>'required',
            'end_d'=>'required',
        ]); //check data required

        $data = new Objective(); //create new data
        //set data in db is data from user create
        $data->name = $request->input('name');

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $extendtion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extendtion;
            $file->move('uploads/goals/', $filename);
            $data->picture = $filename;
        }

        $data->start_d = $request->input('start_d');
        $data->end_d = $request->input('end_d');

        //calculation daydift between start day and stopday
        $daydift = (strtotime($request->input('end_d')) - strtotime($request->input('start_d')))/  ( 60 * 60 * 24 );
        $data->days = $daydift;

        $data->goal_Keep = $request->price;

        //calculation saving per day 
        $perday = ($request->price) / $daydift;
        $data->saving_perDay = $perday;
        $data->status = 'unsuccess'; //set status
        $data->user_id = Auth::id(); //set user_id = id from authentication now

       
        $data->save(); //save data to database
        return redirect()->route('objectivies.index')->with('success', 'The New Goals has been Create Success');
    }

    //return edit page with data
    public function edit(Objectivy $objectivy) {
        return view('objectivies.edit1', compact('objectivy'));
    }

    //update data from edit page
    public function update(Request $request, $id) {
        $request->validate([
            'name'=>'required',
            'picture'=>'required',
            'price'=>'required',
            'start_d'=>'required',
            'end_d'=>'required',
        ]); //check data required

        $data = Objectivy::find($id); //find data by id

        //set data in db is data from user update
        $data->name = $request->input('name');

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $extendtion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extendtion;
            $file->move('uploads/goals/', $filename);
            $data->picture = $filename;
        }

        $data->start_d = $request->input('start_d');
        $data->end_d = $request->input('end_d');

        //calculation daydift between start day and stopday
        $daydift = (strtotime($request->input('end_d')) - strtotime($request->input('start_d')))/  ( 60 * 60 * 24 );
        $data->days = $daydift;

        $data->goal_Keep = $request->price;
        
        //calculation saving per day 
        $perday = ($request->price) / $daydift;
        $data->saving_perDay = $perday;
        $data->status = 'unsuccess'; //set status 
        $data->user_id = Auth::id(); //set user_id = id from authentication now

        $data->save(); //save data to database
        return redirect()->route('objectivies.index')->with('success','The Goal has been edit success');
    }
    
    public function destroy(Objectivy $objectivy) {
        $objectivy->delete();
        return redirect()->route('objectivies.index')->with('success', 'The Goal has been delete success');
    }
}
