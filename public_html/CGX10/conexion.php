<?php

$connect = mysqli_connect("localhost", "diezlagc", "Ul3Us98s5a", "diezlagc_lag");
if (mysqli_connect_errno($connect)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error($connect);
}