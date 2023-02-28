<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\postdata;
use Illuminate\Support\Facades\DB;

class postdataController extends Controller
{
    public function store(Request $request)
    {
        $data=new postdata();
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->save();
        return redirect()->back()->with('data','Data Inserted');
    }

    public function show_data()
    {
        $data=DB::table('postdatas')->get();
        return view('Pages.add_update')->with(compact('data'));
    }

    public function update(Request $request)
    {
        $id=$request->id;
$update=array(
'name'=>$request->name,
);
DB::table('postdatas')->where('id', $id)->update($update);
return redirect()->back()->with('updatesuccess', 'Data Update Successfully !');
    }
}