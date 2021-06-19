<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //

    function index(Request $request){
        $title  = $request->query('title'); //for handling query params
        $res= Country::where('title', 'like', '%'.$title."%")->get();

        return response()->jsonAs('Countries', $res, 200);
    }


    public function store(Request $request){
        $request->validate([
            'title' => 'required'
        ]);

        $res= Country::create($request->all());
        return response()->jsonAs('Countries',$res, 201 );
    }


    public function show(Country $country){

        return Country::find($country->id);
    }

    public function update(Request $request,Country $country){
       $country = Country::find($country->id);

       $request->validate([
           "title"=> "required"
       ]);



         $country->update($request->all());
         return $country;

    }

    function destroy(Country $country){
        return Country::destroy($country->id);
    }



}
