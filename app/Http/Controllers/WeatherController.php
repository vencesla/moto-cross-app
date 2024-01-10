<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class WeatherController extends Controller
{
    public function index()
    {
        $weather = Http::get('https://api.meteo-concept.com/api/forecast/daily?token=3b47786a910ad2670e6b8fa22bf21f12070e7092bbf6b88288eded9d43046b78&insee=35238')->json();
        // return response()->json($weather);
        return view("weather.index")->with("weather", $weather);
    }

    public function city()
    {
        return view("weather.city");
    }

    public function code(Request $request)
    {
        $city = $request->input('city');
        $cities = Http::get('https://api.meteo-concept.com/api/location/cities?token=3b47786a910ad2670e6b8fa22bf21f12070e7092bbf6b88288eded9d43046b78&search=' . $city)->json();

        return view('weather.inse')->with('cities', $cities);

    }

    public function showCode($insee)
    {
        $code_insee = Http::get('https://api.meteo-concept.com/api/location/city?token=3b47786a910ad2670e6b8fa22bf21f12070e7092bbf6b88288eded9d43046b78&insee=' . $insee)->json();
        return view('weather.show')->with('code_insee', $code_insee);
    }
}
