<?php
	// работа с API
	// (https://openweathermap.org/)
	// https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=

	$url = 'https://api.openweathermap.org/data/2.5/weather';
	$options = array(
		'lat' => '52.59100612008015',
		'lon' => '39.558274893739615',
        //'units' => 'metric',
		'appid' => ''
	);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($options));

	$response = curl_exec($ch);
	$data = json_decode($response, true);
	curl_close($ch);

	echo '<pre>';print_r($data);
	echo '</pre>';

// Вывод на экран в браузере:
/* Array
(
    [coord] => Array
        (
            [lon] => 10.99
            [lat] => 44.34
        )

    [weather] => Array
        (
            [0] => Array
                (
                    [id] => 802
                    [main] => Clouds
                    [description] => scattered clouds
                    [icon] => 03d
                )

        )

    [base] => stations
    [main] => Array
        (
            [temp] => 294.44
            [feels_like] => 294.43
            [temp_min] => 292.56
            [temp_max] => 295.42
            [pressure] => 1015
            [humidity] => 69
            [sea_level] => 1015
            [grnd_level] => 931
        )
... */