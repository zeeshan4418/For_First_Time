<?php
  use App\Configs;

  function data()
  {
    $username = Configs::find(1)->username;
    $url = 'http://config.rathemes.com/' . $username;

    // /setup the request, you can also use CURLOPT_URL
    $ch = curl_init($url);

    // Returns the data/output as a string instead of raw data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // get stringified data/output. See CURLOPT_RETURNTRANSFER
    $data = json_decode(curl_exec($ch));

    // close curl resource to free up system resources
    curl_close($ch);

    return $data;
  };
