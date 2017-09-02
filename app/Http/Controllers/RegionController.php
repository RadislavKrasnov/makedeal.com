<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
    public function selectRegions(Request $request)
    {
        $regions = Region::getRegions($request->input('country_id'));

        $regionsArray = json_decode(json_encode($regions), true);
        foreach ($regionsArray as $key => $value) {
        echo "<option value=".$key.">".$value."</option>";
        }
    }
}
