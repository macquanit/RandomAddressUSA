<?php

$source = get('https://www.elfqrin.com/fakeid.php');

$street = explode(';', explode('ADR;TYPE=Home:;;', $source)[1])[0];
$city = explode(';', explode($street.';', $source)[1])[0];
$state = explode(';', explode($city.';', $source)[1])[0];
$postcode = explode(';', explode($state.';', $source)[1])[0];

$data = [
  'fname' => explode('<', explode('First name</td><td valign="top">', $source)[1])[0],
  'lname' => explode('<', explode('Last name</td><td valign="top">', $source)[1])[0],
  'street' => $street,
  'city' => $city,
  'state' => $state,
  'postcode' => $postcode
];

echo json_encode($data);





function get($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    $ch = curl_exec($curl);
    curl_close($curl);
    return $ch;
}
