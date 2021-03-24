<?php

function getCountryByName(string $country) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://restcountries.eu/rest/v2/name/' . $country,
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

    if($err) echo "cURL Error #:" . $err;

    $data = array(
        'name' => $response,
    );

    echo $data;
}
getCountryByName('brazil');


/**
 * name
 * alpha2Code
 * capital
 * region
 * subregion
 * population
 * demonym
 * borders
 * nativeName
 * currencies: []
 * languages: []
 * translations
 */
