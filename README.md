# Tool to Enable Forging on Lisk Node

If PHP is not present:<br>
sudo apt-get install php<br>
sudo apt-get install php-curl<br>
<br>

Download:<br>
wget https://raw.githubusercontent.com/S3x0r/Lisk-Enable-Forging/master/forging.php
<br>

Configure:<br>
nano forging.php<br>
$PUBLICKEY = ''; /* <----- your publickey */<br>
$PASSWORD = '';  /* <----- your password */<br>
<br>

Usage:<br>
php forging.php