# Tool to Enable Forging on Lisk Node

If PHP is not present:
sudo apt-get install php<br>
sudo apt-get install php-curl<br>


Download:
wget https://raw.githubusercontent.com/S3x0r/Lisk-Enable-Forging/master/forging.php


Configure:
nano forging.php
$PUBLICKEY = ''; /* <----- your publickey */
$PASSWORD = '';  /* <----- your password */


Usage:
php forging.php