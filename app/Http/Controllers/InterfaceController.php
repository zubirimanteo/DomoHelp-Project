<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterfaceController extends Controller
{
    function sendCommand($item, $data) {
      $url = "http://86046c81.ngrok.io/rest/items/" . $item;

      $options = array(
        'http' => array(
            'header'  => "Content-type: text/plain\r\n",
            'method'  => 'POST',
            'content' => $data  //http_build_query($data),
        ),
      );

      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

      return $result;
    }
}
