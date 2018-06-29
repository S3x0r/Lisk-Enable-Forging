<?php


$PUBLICKEY = ''; /* <----- your publickey */
$PASSWORD = '';  /* <----- your password */

/* optional */
$NODE_IP   = '127.0.0.1';
$NODE_PORT = '7000'; /* ports: 5000 betanet, 7000 testnet, 8000 mainnet */


if (!extension_loaded('curl')) {
    echo PHP_EOL.' I need php curl extension to work, Exiting.'.PHP_EOL.PHP_EOL;
    die();
} else {
    if (empty($PUBLICKEY)) {
        echo PHP_EOL.' You need to specify \'publickey\' value in forging.php, Exiting.'.PHP_EOL.PHP_EOL;
        die();
    } elseif (empty($PASSWORD)) {
              echo PHP_EOL.' You need to specify \'password\' value in forging.php, Exiting.'.PHP_EOL.PHP_EOL;
              die();
    } else {
        if (empty(@file_get_contents('http://'.$NODE_IP.':'.$NODE_PORT.'/api/node/status/forging'))) {
            echo PHP_EOL.' Cannot connect to node ('.$NODE_IP.':'.$NODE_PORT.
                         '), node not runned or forging.php'.PHP_EOL;
            echo ' was used not on this server where node is located, Exiting.'.PHP_EOL.PHP_EOL;
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
                    echo PHP_EOL.' Bad Public Key, check \'$PUBLICKEY\' value in forging.php, Exiting.'.PHP_EOL.PHP_EOL;
                    die();
                } elseif (strpos($response, 'Invalid password and public key combination')) {
                           echo PHP_EOL.' Bad Password, check \'$PASSWORD\' value in forging.php, Exiting.'
                                .PHP_EOL.PHP_EOL;
                           die();
                } else {
                         echo PHP_EOL.' Something goes wrong, cannot check forging status'.PHP_EOL;
                         echo PHP_EOL.' RAW Response: '.$response.PHP_EOL;
                         die();
                }
            }
            curl_close($ch);
        }
    }
}
