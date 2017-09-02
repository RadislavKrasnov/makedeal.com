<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function selectCities(Request $request)
    {
        $cities = City::getCities($request->input('region_id'));

        $citiesArray = json_decode(json_encode($cities), true);

        foreach ($citiesArray as $key => $value) {
            echo "<option value=".$key.">".$value."</option>";
        }
    }
}
