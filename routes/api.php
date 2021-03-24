<?php

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//include 'utils/simple_html_dom.php';

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

    if(gettype($data) == 'object') return 'Country not found';

    // //check if country exists
    // $country_found = Country::where('name', ucfirst($country_name))->count();

    // if($country_found != 0) return (new CountryResource($country_found))->response()->setStatusCode(409);

    return Country::create([
        'name' => $data[0]->name,
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
        ->where('name', 'LIKE', ucfirst($country_name))
        ->orWhere('name', 'LIKE', "%{$country_name}%")
        ->get();

    return CountryResource::collection($country);
});

Route::get('/countries', function() {
    $countries = Country::all();

    return CountryResource::collection($countries);
});
