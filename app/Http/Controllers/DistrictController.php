<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    //

    function index(Request $request){
        $title  = $request->query('title'); //for handling query params
        $res= District::where('title', 'like', '%'.$title."%")->get();

        return response()->jsonAs('districts', $res, 200);
    }


    public function store(Request $request){
        $request->validate([
            'title' => 'required'
        ]);

        $res= District::create($request->all());
        return response()->jsonAs('districts',$res, 201 );
    }


    public function show(District $country){

        return District::find($country->id);
    }

    public function update(Request $request, District $country){
       $country = District::find($country->id);

       $request->validate([
           "title"=> "required"
       ]);



         $country->update($request->all());
         return $country;

    }

    function destroy(District $country){
        return District::destroy($country->id);
    }



}
