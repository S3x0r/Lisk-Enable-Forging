<?php

if (is_file('config.php')) {
    require('config.php');
    if (!extension_loaded('curl')) {
        echo "\n Error:\n".
             " I need php curl extension to work, Exiting.\n\n".
             " Minions advise:\n".
             " 1. To install php curl extension in Ubuntu:\n".
             "    sudo apt-get install php-curl\n\n";
    } else {
        if (empty($PUBLICKEY)) {
            exit("\n Error:\n You need to specify your Public Key value: 'PUBLICKEY' in config.php, Exiting.\n\n");
        } elseif (empty($PASSWORD)) {
                  exit("\n Error:\n You need to specify your Password value: 'PASSWORD' in config.php, Exiting.\n\n");
        } else {
            if (empty(@file_get_contents("{$NODE_HTT}://{$NODE_IP}:{$NODE_PORT}/api/node/status/forging"))) {
                echo "\n Error:\n".
                     " Cannot connect to your core node ({$NODE_HTT}://{$NODE_IP}:{$NODE_PORT}), node not runned, bad port or\n".
                     " forging.php was used not on this server where node is located, Exiting.\n\n".
                     " Minions advise:\n".
                     " 1. Check if you specified good node port: 'NODE_PORT' in forging.php\n".
                     "    (5000 - betanet, 7000 - testnet, 8000 - mainnet)\n\n".
                     " 2. Are you using forging.php on server where core is runned?\n\n".
                     " 3. Check if you specified good node ip address: 'NODE_IP' in config.php\n".
                     "    (runned locally ip should be: '127.0.0.1')\n\n".
                     " 4. Maybe core after starting exited?\n".
                     "    (Check your node config.json and 'logs' directory)\n\n";
            } else {
                     $data = ['forging'=>true, 'publicKey'=>$PUBLICKEY, 'password'=>$PASSWORD];

                     $ch = curl_init();
                     curl_setopt($ch, CURLOPT_URL, "{$NODE_HTT}://{$NODE_IP}:{$NODE_PORT}/api/node/status/forging");
                     curl_setopt(
                         $ch,
                         CURLOPT_HTTPHEADER,
                         ['Content-Type: application/json','Content-Length: '.strlen(json_encode($data))]
                     );
                     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                     $response = curl_exec($ch);

                if (strpos($response, '"forging":true')) {
                    echo "\n B@B@B@B@@@B@B@B@B@B@B@B@@@B@B@B@B@B@@@@@@@B@B@B@B@B@@@B@B\n".
                         " @B@BGB@B@B@B@B@@@B@@@B@B@B@@@B@B@B@B@B@@@B@B@B@@@B@@@@@B@\n".
                         " B@B@  :@Bi:@B@B@B@@@B@BGS522s22SXMB@B@B@B@B@B@B@B@@@B@B@B\n".
                         " @: r   :   H@B@B@B@9sr;rrs5ssss2H2229M@@@B@B@B@B@B@B@B@@@\n".
                         " B         S@B@@@B,      ,::rsGB5:,  ,:i9@@B@B@B@B@B@, B@B\n".
                         " @B@M,     @B@X@X   rMB@Mr:,:MS          iB@B@B2  B@   @@@\n".
                         " B@@@B@    :@BGB  sB@B@;sBBrii  rB@B@B2:, :B@B@i         s\n".
                         " @@@B@@@ii:sB@9X ,@@B,    BSi  9Bi ,B@B@r,  M@B@B        S\n".
                         " B@@@B@B@92,@9,X  @B@,   ,@2i  @     B@GX:,  B@@,     X@@B\n".
                         " @B@@@B@BMs:r@r;i i@B@G2M@S::, @s  ,X@G92,   ,B@    B@B@B@\n".
                         " @@B@B@M@B2r:sssr: i29@B5i,  r :@B@B@BXr,,   ,@;::rM@B@B@B\n".
                         " @B@B@B@B@Gs:rHSSsi:,,,,     ,:,,rssri,,,iir,9s  rB@B@B@B@\n".
                         " B@B@B@B@B@si:XSSSsrsi::,,,::,:::,,,, ,,:;rsr,  :B@B@B@B@B\n".
                         " @B@B@B@@@BG: :XXG: :rssssS3x0rS2ssr::irrrrrr  ,B@B@B@B@B@\n".
                         " B@B@B@B@B@Bs  :SGM                 :rrrsr,    G@B@@@B@B@@\n".
                         " @B@@@B@B@B@Xs  :SM@               ,ssss,     r@B@B@B@B@B@\n".
                         " B@B@B@@@B@B2Hs  :SM@@sr:,      :sMG22s,   ,r:@@@B@B@B@B@B\n".
                         " @B@B@B@B@B@2s9s,  ,::r222sHSX222srri:   ,rrirB@B@B@B@B@B@\n".
                         " B@B@B@B@B@B2s292                       :rri:2@B@B@B@B@B@B\n".
                         " @B@B@B@@@B@Ss29s,  ,, ,         ,     rrrii,M@@B@@@B@B@B@\n".
                         " B@B@B@B@B@@MsXGs,,,,, ,,:i:,,,       ,ssrriiB@B@B@@@B@B@B\n".
                         " @B@B@B@@@B@r:r5r ,,,, ,,,,, ,,       ,rii:,,@B@B@@@B@B@B@\n".
                         " B@B@B@B@B@@:   ,,:,,,,          ,,          G@@@B@B@B@B@B\n".
                         " @B@B@B@B@B@B   ,,,,,,,,   ,                X@B@B@B@B@B@@@\n".
                         " B@B@B@B@B@B@B        , , ,,               9@B@B@B@B@B@B@B\n".
                         " @B@B@@@B@B@B@Br                         i@@B@B@B@B@B@B@B@\n".
                         " B@B@B@B@B@@@B@B@Br:                  rM@B@B@B@B@B@B@B@B@@\n".
                         " @B@B@B@B@@@B@B@@@B@B@2           :GB@BBG9XXSSS9X9999G9GGM\n".
                         " B@B@@@B@B@B@B@@@B@B@@s           Srri;i;rrrssssssss22S5HS\n".
                         " @B@B@B@B@B@BBMMGG9G:              :,::::iir;rs22SXGGMMMMB\n";
                    echo "\n\n >>> Your node is forging now! <<<\n\n";
                } else {
                    if (strpos($response, 'Object didn\'t pass validation for format publicKey') or
                        strpos($response, 'not found')) {
                        echo "\n Error:\n".
                             " Bad Public Key, check 'PUBLICKEY' value in forging.php,\n".
                             " or your node is not fully synced yet, Exiting.\n\n".
                             " Minions advise:\n".
                             " 1. Check if your node is fully synced by typing in lisk core directory:\n".
                             "    bash lish.sh logs | grep \"height:\"\n".
                             "    And compare your height with height from explorer.\n\n".
                             " 2. Check if you have good Public Key in 'PUBLICKEY' value in forging.php\n".
                             "    You can compare your Public Key also in explorer.\n\n".
                             " 3. Check if publicKey is added to node config.json under forging/delegates section\n\n";
                    } elseif (strpos($response, 'Invalid password and public key combination')) {
                              exit("\n Error:\n Bad Password, check 'PASSWORD' value in config.php, Exiting.\n\n");
                    } else {
                             exit("\n Error:\n Something goes wrong, cannot set forging status :(\n RAW Response: {$response}\n\n");
                    }
                }
                curl_close($ch);
            }
        }
    }
} else {
         exit("\n Error:\n I cannot find config file (config.php), Exiting!\n");
}
