<?php

$user = [
    'id' =>  20,
    'type_id' => 'test',
];

$template = "/api/items/%id%/%type_id%";
$result = $template; 
foreach ($user as $key => $value)
{
    $result = preg_replace("/%{$key}%/u", $value, $result);
    $result = preg_replace('/\s+/', '%20', $result);
}


echo '<pre>'.print_r($result, true).'</pre>';

?>