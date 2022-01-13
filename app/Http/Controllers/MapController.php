<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class MapController extends Controller
{
    
    function map(Request $request) {
        $queryCountry = $request->input('country');
        if ($queryCountry) {
            $countries = Country::with('addresses')->where('mapId', '=', $queryCountry)->get();
            $addresses = $countries[0]->addresses;
            $users = $addresses->map(function ($address) {
                return $address->user->name;
            });
            $arrMapConfig = array(
                "chart" => array(
                    "caption" => "The international map",
                    "numbersuffix" => " student(s)".$users,
                    "entityFillHoverColor" => "#FFF9C4",
                    "theme" => "fusion",
                )
            );
        } else {
            $countries = Country::has('addresses')->with('addresses')->get();
            $arrMapConfig = array(
                "chart" => array(
                    "caption" => "The international map",
                    "numbersuffix" => " student(s)",
                    "entityFillHoverColor" => "#FFF9C4",
                    "theme" => "fusion",
                )
            );
        }

        // Widget color range data
        // $colorDataObj = array("minvalue" => "0", "code" => "#FFE0B2", "gradient" => "1",
        // "color" => array(
        //     ["minValue" => "0", "maxValue" => "50", "code" => "#F2726F"],
        //     ["minValue" => "50", "maxValue" => "75", "code" => "#FFC533"],
        //     ["minValue" => "75", "maxValue" => "100", "code" => "#62B58F"]
        // ));
        // $arrMapConfig["colorRange"] = $colorDataObj;
        

        // dd($countries);

        // for($i = 0; $i < count($countries); $i++) {
        //     $country = $countries[$i];
        //     $country->addresses = $country->addresses->filter(function ($address) {
        //         return $address['current_address'] == 1;
        //     });
        // }

        $mapDataArray = $countries->map(function ($country) {
            return [$country['mapId'], count($country['addresses']), "1"];
        });

        // $mapDataArray = array(
        //     ["138", "1", "1"],
        //     ["23", "5", "1"],
        //     ["22", "2", "1"],
        //     ["74", "3", "1"],
        //     ["21", "10", "1"],
        //     ["24", "13", "1"],
        //     ["25", "15", "1"],
        //     ["66", "11", "1"],
        //     ["07", "7", "1"],
        // );
        
        $mapData = array();

        for($i = 0; $i < count($mapDataArray); $i++) {
            array_push($mapData,array("link" => "http://localhost/map?country=".$mapDataArray[$i][0], "id" => $mapDataArray[$i][0], "value" => $mapDataArray[$i][1], "showLabel" => $mapDataArray[$i][2]));
        }

        $arrMapConfig["data"] = $mapData;

        return view("map", ["mapConfig" => json_encode($arrMapConfig)]);
    }
}
