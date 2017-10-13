<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Repository;

class SiteController extends Controller {

    const _apikey = 'e8c15c7fa36020334f7bd9182b79d23c';

    /**
     * Wyświetlamy dane
     * @return type
     */
    public function index() {
// sprawdzamy czy istnieje w cachu klucz 'data' jeśli nie, to pobieramy dane z Api i dodajemy je do kesza
        if (!Cache::has('data')) {
            //pobiearamy dane dla warszawy
            $data = $this->getWheter('Warszawa');
            Cache::add('data', $data, 10);
        }else{
            // pobieramy dane z kesza
            $data = Cache::get('data');
        }
        return view('weather', ['data' => $data]);
    }

    /**
     * Pobieramy dane z Api OpenWeatherMap
     * @param string $city_name nazwa miasta
     * @return array
     */
    public function getWheter($city_name = 'Warszawa') {
        // otwieramy plik json-a
        return json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=' . ucfirst($city_name) . '&appid=' . self::_apikey));
    }

}
