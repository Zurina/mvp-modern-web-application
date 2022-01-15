<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use View;

class MapController extends Controller
{
    
    function map(Request $request) {
        $queryCountry = $request->input('country');
        $countries = Country::has('addresses')->with('addresses')->get();
        $arrMapConfig = array(
            "chart" => array(
                "caption" => "The International Map",
                "numbersuffix" => " student(s)",
                "entityFillHoverColor" => "#FFF9C4",
                "theme" => "fusion",
                )
            );
            
        $mapDataArray = $countries->map(function ($country) {
            return [$country['mapId'], count($country['addresses']), "1"];
        });
        
        $mapData = array();
        
        for($i = 0; $i < count($mapDataArray); $i++) {
            array_push($mapData,array("link" => "/?country=".$mapDataArray[$i][0], "id" => $mapDataArray[$i][0], "value" => $mapDataArray[$i][1], "showLabel" => $mapDataArray[$i][2]));
        }
        
        $arrMapConfig["data"] = $mapData;

        $students = null;
        $countryName = null;

        if ($queryCountry) {
            $country = Country::with('addresses')->where('mapId', '=', $queryCountry)->first();
            $countryName = $country->label;
            $addresses = $country->addresses;
            $students = $addresses->map(function ($address) {
                return $address->user;
            });
        }

        return view("map", [
            "mapConfig"   => json_encode($arrMapConfig),
            "students"    => $students,
            "countryName" => $countryName,
        ]);
    }
}
