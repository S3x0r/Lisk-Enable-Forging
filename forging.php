<?php

if (is_file('config.php')) {
    require('config.php');
    if (!extension_loaded('curl')) {
        echo PHP_EOL.' Error:'.PHP_EOL;
        echo ' I need php curl extension to work, Exiting.'.PHP_EOL.PHP_EOL;
        echo ' Minions advise:'.PHP_EOL;
        echo ' 1. To install php curl extension:'.PHP_EOL;
        echo '    sudo apt-get install php-curl'.PHP_EOL.PHP_EOL;
        die();
    } else {
        if (empty($PUBLICKEY)) {
            echo PHP_EOL.' Error:'.PHP_EOL;
            echo ' You need to specify your Public Key: \'$PUBLICKEY\' value in forging.php, Exiting.'.PHP_EOL.PHP_EOL;
            die();
        } elseif (empty($PASSWORD)) {
                  echo PHP_EOL.' Error:'.PHP_EOL;
                  echo ' You need to specify your Password: \'$PASSWORD\' value in forging.php, Exiting.'.PHP_EOL.PHP_EOL;
                  die();
        } else {
            if (empty(@file_get_contents('http://'.$NODE_IP.':'.$NODE_PORT.'/api/node/status/forging'))) {
                echo PHP_EOL.' Error:'.PHP_EOL;
                echo ' Cannot connect to your core node ('.$NODE_IP.':'.$NODE_PORT.'), node not runned, bad port or'.PHP_EOL;
                echo ' forging.php was used not on this server where node is located, Exiting.'.PHP_EOL.PHP_EOL;
                echo ' Minions advise:'.PHP_EOL;
                echo ' 1. Check if you specified good node port: \'$NODE_PORT\' in forging.php'.PHP_EOL;
                echo '    (5000 - betanet, 7000 - testnet, 8000 - mainnet)'.PHP_EOL.PHP_EOL;
                echo ' 2. Are you using forging.php on server where core is runned?'.PHP_EOL.PHP_EOL;
                echo ' 3. Check if you specified good node ip address: \'$NODE_IP\' in forging.php'.PHP_EOL;
                echo '    (runned locally ip should be: \'127.0.0.1\')'.PHP_EOL.PHP_EOL;
                echo ' 4. Maybe core after starting exited?'.PHP_EOL;
                echo '    (Check your node config.json and \'logs\' directory)'.PHP_EOL.PHP_EOL;
                die();
            } else {
                     $data = ['forging'=>true, 'publicKey'=>$PUBLICKEY, 'password'=>$PASSWORD];
                     $data_json = json_encode($data);

                     $ch = curl_init();
                     curl_setopt($ch, CURLOPT_URL, 'http://'.$NODE_IP.':'.$NODE_PORT.'/api/node/status/forging');
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
                    echo PHP_EOL.' B@B@B@B@@@B@B@B@B@B@B@B@@@B@B@B@B@B@@@@@@@B@B@B@B@B@@@B@B'.PHP_EOL.
                         ' @B@BGB@B@B@B@B@@@B@@@B@B@B@@@B@B@B@B@B@@@B@B@B@@@B@@@@@B@'.PHP_EOL.
                         ' B@B@  :@Bi:@B@B@B@@@B@BGS522s22SXMB@B@B@B@B@B@B@B@@@B@B@B'.PHP_EOL.
                         ' @: r   :   H@B@B@B@9sr;rrs5ssss2H2229M@@@B@B@B@B@B@B@B@@@'.PHP_EOL.
                         ' B         S@B@@@B,      ,::rsGB5:,  ,:i9@@B@B@B@B@B@, B@B'.PHP_EOL.
                         ' @B@M,     @B@X@X   rMB@Mr:,:MS          iB@B@B2  B@   @@@'.PHP_EOL.
                         ' B@@@B@    :@BGB  sB@B@;sBBrii  rB@B@B2:, :B@B@i         s'.PHP_EOL.
                         ' @@@B@@@ii:sB@9X ,@@B,    BSi  9Bi ,B@B@r,  M@B@B        S'.PHP_EOL.
                         ' B@@@B@B@92,@9,X  @B@,   ,@2i  @     B@GX:,  B@@,     X@@B'.PHP_EOL.
                         ' @B@@@B@BMs:r@r;i i@B@G2M@S::, @s  ,X@G92,   ,B@    B@B@B@'.PHP_EOL.
                         ' @@B@B@M@B2r:sssr: i29@B5i,  r :@B@B@BXr,,   ,@;::rM@B@B@B'.PHP_EOL.
                         ' @B@B@B@B@Gs:rHSSsi:,,,,     ,:,,rssri,,,iir,9s  rB@B@B@B@'.PHP_EOL.
                         ' B@B@B@B@B@si:XSSSsrsi::,,,::,:::,,,, ,,:;rsr,  :B@B@B@B@B'.PHP_EOL.
                         ' @B@B@B@@@BG: :XXG: :rssssS3x0rS2ssr::irrrrrr  ,B@B@B@B@B@'.PHP_EOL.
                         ' B@B@B@B@B@Bs  :SGM                 :rrrsr,    G@B@@@B@B@@'.PHP_EOL.
                         ' @B@@@B@B@B@Xs  :SM@               ,ssss,     r@B@B@B@B@B@'.PHP_EOL.
                         ' B@B@B@@@B@B2Hs  :SM@@sr:,      :sMG22s,   ,r:@@@B@B@B@B@B'.PHP_EOL.
                         ' @B@B@B@B@B@2s9s,  ,::r222sHSX222srri:   ,rrirB@B@B@B@B@B@'.PHP_EOL.
                         ' B@B@B@B@B@B2s292                       :rri:2@B@B@B@B@B@B'.PHP_EOL.
                         ' @B@B@B@@@B@Ss29s,  ,, ,         ,     rrrii,M@@B@@@B@B@B@'.PHP_EOL.
                         ' B@B@B@B@B@@MsXGs,,,,, ,,:i:,,,       ,ssrriiB@B@B@@@B@B@B'.PHP_EOL.
                         ' @B@B@B@@@B@r:r5r ,,,, ,,,,, ,,       ,rii:,,@B@B@@@B@B@B@'.PHP_EOL.
                         ' B@B@B@B@B@@:   ,,:,,,,          ,,          G@@@B@B@B@B@B'.PHP_EOL.
                         ' @B@B@B@B@B@B   ,,,,,,,,   ,                X@B@B@B@B@B@@@'.PHP_EOL.
                         ' B@B@B@B@B@B@B        , , ,,               9@B@B@B@B@B@B@B'.PHP_EOL.
                         ' @B@B@@@B@B@B@Br                         i@@B@B@B@B@B@B@B@'.PHP_EOL.
                         ' B@B@B@B@B@@@B@B@Br:                  rM@B@B@B@B@B@B@B@B@@'.PHP_EOL.
                         ' @B@B@B@B@@@B@B@@@B@B@2           :GB@BBG9XXSSS9X9999G9GGM'.PHP_EOL.
                         ' B@B@@@B@B@B@B@@@B@B@@s           Srri;i;rrrssssssss22S5HS'.PHP_EOL.
                         ' @B@B@B@B@B@BBMMGG9G:              :,::::iir;rs22SXGGMMMMB'.PHP_EOL;
                    echo PHP_EOL.PHP_EOL.' >>> Your node is forging now! <<<'.PHP_EOL.PHP_EOL;
                } else {
                    if (strpos($response, 'Object didn\'t pass validation for format publicKey') or
                        strpos($response, 'not found')) {
                        echo PHP_EOL.' Error:'.PHP_EOL;
                        echo ' Bad Public Key, check \'$PUBLICKEY\' value in forging.php,'.PHP_EOL;
                        echo ' or your node is not fully synced yet, Exiting.'.PHP_EOL.PHP_EOL;
                        echo ' Minions advise:'.PHP_EOL;
                        echo ' 1. Check if your node is fully synced by typing in lisk core directory:'.PHP_EOL;
                        echo '    bash lish.sh logs | grep "height:"'.PHP_EOL;
                        echo '    And compare your height with height from explorer.'.PHP_EOL.PHP_EOL;
                        echo ' 2. Check if you have good Public Key in \'$PUBLICKEY\' value in forging.php'.PHP_EOL;
                        echo '    You can compare your Public Key also in explorer.'.PHP_EOL.PHP_EOL;
                        die();
                    } elseif (strpos($response, 'Invalid password and public key combination')) {
                              echo PHP_EOL.' Error:'.PHP_EOL;
                              echo ' Bad Password, check \'$PASSWORD\' value in forging.php, Exiting.'
                                    .PHP_EOL.PHP_EOL;
                              die();
                    } else {
                             echo PHP_EOL.' Error:'.PHP_EOL;
                             echo ' Something goes wrong, cannot check forging status'.PHP_EOL;
                             echo PHP_EOL.' RAW Response: '.$response.PHP_EOL.PHP_EOL;
                             die();
                    }
                }
                curl_close($ch);
            }
        }
    }
} else {
         echo PHP_EOL.' Error:'.PHP_EOL;
         echo ' I cannot find config file (config.php), Exiting!'.PHP_EOL;
         die();
}
