# Tool to Enable Forging on Lisk Node

Usage:<br>
php forging.php<br>
<br>

If PHP is not present:<br>
sudo apt-get install php<br>
sudo apt-get install php-curl<br>
<br>

Download:<br>
wget https://raw.githubusercontent.com/S3x0r/Lisk-Enable-Forging/master/forging.php
<br>

Configure:<br>
nano forging.php<br>
$PUBLICKEY = '' <----- your publickey<br>
$PASSWORD = ''  <----- your password<br>
<br>

Optional:<br>
$NODE_IP   = '127.0.0.1' <----- your node ip address<br>
$NODE_PORT = '7000' <----- your node port<br>
<br>

Ports:<br>
5000 - betanet<br>
7000 - testnet<br>
8000 - mainnet<br>
