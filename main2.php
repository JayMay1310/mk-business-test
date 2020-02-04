<?php

$user = [
    'id' =>  20,
    'name' => 'John Dow',
    'role' => 'QA',
    'salary' => 100
];
$apiTemplatesSet1 = [
    '/api/items/%id%/%name%',
    '/api/items/%id%/%role%',
    '/api/items/%id%/%salary%',
];

$apiPathes = $apiTemplatesSet1;

array_walk($apiPathes, 'getApiPath', $user);

function getApiPath(&$item, $key, $user) 
{
    foreach ($user as $key => $value)
    {
        $item = preg_replace("/%{$key}%/u", $value, $item);
        $item = preg_replace('/\s+/', '%20', $item);
    }
}

$json = json_encode($apiPathes);
echo '<pre>'.print_r($json, true).'</pre>';


?>