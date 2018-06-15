<?php


$PUBLICKEY = ''; /* <----- your publickey */
$PASSWORD = '';  /* <----- your password */


if (!extension_loaded('curl')) {
    echo PHP_EOL.' I need php curl extension to work, Exiting.'.PHP_EOL.PHP_EOL;
    die();
} else {
    if (empty($PUBLICKEY)) {
        echo PHP_EOL.' You need to specify \'publickey\' value in forge.php, Exiting.'.PHP_EOL.PHP_EOL;
        die();
    } elseif (empty($PASSWORD)) {
              echo PHP_EOL.' You need to specify \'password\' value in forge.php, Exiting.'.PHP_EOL.PHP_EOL;
              die();
    } else {
        if (empty(@file_get_contents('http://127.0.0.1:5000/api/node/status/forging'))) {
            echo PHP_EOL.' Cannot connect to node - not runned? Exiting.'.PHP_EOL.PHP_EOL;
            die();
        } else {
                 $data = ['forging'=>true, 'publicKey'=>$PUBLICKEY, 'password'=>$PASSWORD];
                 $data_json = json_encode($data);

                 $ch = curl_init();
                 curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:5000/api/node/status/forging');
                 curl_setopt(
                     $ch,
                     CURLOPT_HTTPHEADER,
                     ['Content-Type: application/json','Content-Length: '.strlen($data_json)]
                 );
                 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                 curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 $response = curl_exec($ch);

            if (strpos($response, '"forging":true')) {
                echo PHP_EOL.' Your node is forging now :)'.PHP_EOL.PHP_EOL;
            } else {
                     echo PHP_EOL.' Something goes wrong, cannot check forging status'.PHP_EOL.
                                  ' Probably bad publickey or password, Exiting.'.PHP_EOL.PHP_EOL;
                     die();
            }

            curl_close($ch);
        }
    }
}
