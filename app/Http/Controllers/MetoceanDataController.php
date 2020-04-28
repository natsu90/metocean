<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MetoceanDescription;
use App\MetoceanData;

class MetoceanDataController extends Controller
{
    public function retrieveAvailableInputs()
    {
    	$available_dates = MetoceanData::selectRaw('distinct date(datetime) as date')
    		->get()->pluck('date')->toArray();

    	$available_types = MetoceanDescription::select('code', 'description')
    		->get()->pluck('description', 'code')->toArray();

    	return response()->json(compact('available_dates', 'available_types'));
    }

    public function retrieveData(Request $request, $date, $data_type)
    {
    	$data = MetoceanData::selectRaw("time(datetime) as time, $data_type as value")
    		->whereRaw("date(datetime) = '$date'")->get();

    	return $data->toJson();
    }
}
