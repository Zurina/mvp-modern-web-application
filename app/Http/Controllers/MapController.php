<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class MapController extends Controller
{

    function indexMap(Request $request)
    {
        $queryCountry = $request->input('country');
        $countries = Country::has('addresses')->with(['addresses' => function ($address) {
            $address->where('addresses.current_address', '=', 1);
        }])->get();

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

        for ($i = 0; $i < count($mapDataArray); $i++) {
            array_push($mapData, array("link" => "/?country=" . $mapDataArray[$i][0], "id" => $mapDataArray[$i][0], "value" => $mapDataArray[$i][1], "showLabel" => $mapDataArray[$i][2]));
        }

        $arrMapConfig["data"] = $mapData;

        $students = null;
        $countryName = null;

        if ($queryCountry) {
            $country = Country::with(['addresses' => function ($address) {
                $address->where('addresses.current_address', '=', 1);
            }])->where('mapId', '=', $queryCountry)->first();
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

    function personalMap($id)
    {
        $countries = Country::with(['addresses' => function ($address) use($id) {
            $address->where('addresses.user_id', '=', $id);
        }])->get();

        $countries = $countries->filter(function($item)
        {
            if(count($item['addresses']) > 0)
            {
                return $item;
            }
        });

        $user = User::find($id);

        $arrMapConfig = array(
            "chart" => array(
                "caption" => "The map of ".$user->name,
                "numbersuffix" => " addresses(s)",
                "entityFillHoverColor" => "#FFF9C4",
                "theme" => "fusion",
            )
        );

        $mapDataArray = $countries->map(function ($country) {
            return [$country['mapId'], count($country['addresses']), "1"];
        });

        $mapData = array();

        foreach ($mapDataArray as $data) {
            array_push($mapData, array("id" => $data[0], "value" => $data[1], "showLabel" => $data[2]));
        }

        $arrMapConfig["data"] = $mapData;

        $countryName = null;

        return view("map", [
            "mapConfig"   => json_encode($arrMapConfig),
            "countryName" => $countryName,
        ]);
    }
}
