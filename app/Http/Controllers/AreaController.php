<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    function index(Request $request){
        $title  = $request->query('title'); //for handling query params
        $country_id  = $request->query('district_id'); //for handling query params
        $res= Area::where('title', 'like', '%'.$title."%")->andWhere('district_id', 'like', '%'.$country_id."%")->get();

        return response()->jsonAs('areas', $res, 200);
    }


    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'sub' => 'required',
            'district_id' => 'required'
        ]);

        $res= Area::create($request->all());
        return response()->jsonAs('areas',$res, 201 );
    }


    public function show(Area $Area){

        return Area::find($Area->id);
    }

    public function update(Request $request,Area $Area){
        $Area = Area::find($Area->id);

        $request->validate([
            "title"=> "required",
             'description' => 'required',
            'sub' => 'required',
            'district_id' => 'required'
        ]);



        $Area->update($request->all());
        return $Area;

    }

    function destroy(Area $Area){
        return Area::destroy($Area->id);
    }
}
