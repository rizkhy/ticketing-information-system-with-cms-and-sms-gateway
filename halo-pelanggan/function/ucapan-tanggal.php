<?php

date_default_timezone_set("Asia/Jakarta");

$b = time();
$hour = date("G",$b);

if ($hour>=0 && $hour<=11)
{
echo "Selamat Pagi :)";
}
elseif ($hour >=12 && $hour<=14)
{
echo "Selamat Siang :) ";
}
elseif ($hour >=15 && $hour<=17)
{
echo "Selamat Sore :) ";
}
elseif ($hour >=17 && $hour<=18)
{
echo "Selamat Petang :) ";
}
elseif ($hour >=19 && $hour<=23)
{
echo "Selamat Malam :) ";
}

?>