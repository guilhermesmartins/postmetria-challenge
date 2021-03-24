<?php

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

include 'utils/simple_html_dom.php';

//use Illuminate\Support\Facades\DB;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// COUNTRIES
Route::post('/country/{country_name}', function($country_name) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://restcountries.eu/rest/v2/name/' . $country_name,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'x-rapidapi-host: restcountries-v1.p.radpidapi.com',
            'x-rapidapi-key: SIGN-UP-FOR-KEY'
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if($err) return 'curl error #:' . $err;

    $data = json_decode($response);

    return Country::create([
        'name' => $data[0]->name,
        'code' => $data[0]->alpha2Code,
        'capital' => $data[0]->capital,
        'region' => $data[0]->region,
        'subregion' => $data[0]->subregion,
        'population' => $data[0]->population,
        'demonym' => $data[0]->demonym,
        'nativeName' => $data[0]->nativeName,
    ]);
});

Route::get('/country/{country_name}', function(string $country_name) {
    $country = Country::query()
        ->where('name', ucfirst($country_name))
        ->orWhere('name', 'LIKE', "%{$country_name}%")
        ->get();

    return CountryResource::collection($country);
});

Route::get('/countries', function() {
    $countries = Country::all();

    return CountryResource::collection($countries);
});

/** GOOGLE SCRAPPER  */
Route::post('/google', function(Request $search) {
    $formated_search = str_replace(' ', '%20', $search->text);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://google.com/search?q=' . $formated_search);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    curl_close($ch);

    $html = new simple_html_dom();
    $html->load($response);

    $info_array = array();

    foreach ($html->find('.g') as $link) {
        array_push($info_array, [
            'title' => $link->find('h3')->plaintext,
            'desc' => '',
            'link' => '',
        ]);
    }



    return $info_array;
});
