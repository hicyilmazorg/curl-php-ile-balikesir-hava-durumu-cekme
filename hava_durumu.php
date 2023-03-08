<?php
// API anahtarınızı buraya girin
$api_key = "API_ANAHTARI_BURAYA_YAZIN";

// Şehir adı ve ülke kodu
$city = "Balikesir";
$country_code = "tr";

// API isteği yapmak için kullanacağımız URL
$url = "http://api.openweathermap.org/data/2.5/weather?q={$city},{$country_code}&appid={$api_key}";

// cURL kullanarak API isteği yapalım
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

// Gelen JSON verisini diziye çevirelim
$result = json_decode($data, true);

// Hava durumu bilgilerine erişelim
$temperature = $result['main']['temp'];
$description = $result['weather'][0]['description'];
$humidity = $result['main']['humidity'];
$wind_speed = $result['wind']['speed'];

// Sıcaklık birimini Kelvin'den Celsius'a çevirelim
$temperature = $temperature - 273.15;
$temperature = round($temperature, 1);

// Sonuçları ekrana yazdıralım
echo "Balıkesir'de hava durumu: " . $description . "<br>";
echo "Sıcaklık: " . $temperature . " °C<br>";
echo "Nem oranı: " . $humidity . "%<br>";
echo "Rüzgar hızı: " . $wind_speed . " m/s<br>";
?>
