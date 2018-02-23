<?php

$json = '
{
  "secret": "89273234293848923",
  "sessid": "897f8ds0d8f0fvd70vd0vd0vd9",
  "name": "Some event name",
  "state": "new",
  "date_start": "12.03.2020 00:00:00",
  "date_end": "15.05.2020 00:00:00",
  "mail":
          {
          	"list":"",
          	"subject":"",
          	"sender_addr": "user@example.com",
          	"sender_name":"Vladimir Vladimirovich",
          	"text": 
                {
          				"ru": "",
          				"ua": "some text"
          			}
        	}
}
';

var_dump(validateJson(json_decode($json,true)));


function validateJson($json)
{
	$errors = [];
	foreach ($json as $key => $value) {
		if(is_array($value)){ 
			$errors[] = validateJson($value);
		} else {
			if(empty(trim($value))) {
				$errors[] = $key . " is empty";
			}
		}
	}
	return $errors;
}