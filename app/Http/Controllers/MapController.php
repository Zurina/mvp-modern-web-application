<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class MapController extends Controller
{

    function map() {
        $arrMapConfig = array(
            "chart" => array(
                "caption" => "The international map",
                "numbersuffix" => " student(s)",
                "labelsepchar" => ": ",
                "entityFillHoverColor" => "#FFF9C4",
                "theme" => "fusion"
            )
        );

        // Widget color range data
        // $colorDataObj = array("minvalue" => "0", "code" => "#FFE0B2", "gradient" => "1",
        // "color" => array(
        //     ["minValue" => "0", "maxValue" => "50", "code" => "#F2726F"],
        //     ["minValue" => "50", "maxValue" => "75", "code" => "#FFC533"],
        //     ["minValue" => "75", "maxValue" => "100", "code" => "#62B58F"]
        // ));
        // $arrMapConfig["colorRange"] = $colorDataObj;

        $countries = Country::has('addresses')->with('addresses')->get();

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
            array_push($mapData,array("id" => $mapDataArray[$i][0], "value" => $mapDataArray[$i][1], "showLabel" => $mapDataArray[$i][2]));
        }

        $arrMapConfig["data"] = $mapData;

        return view("map", ["mapConfig" => json_encode($arrMapConfig)]);
    }
}
