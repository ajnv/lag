<?php

$connect = mysqli_connect("localhost", "root", "", "lagm");
if (mysqli_connect_errno($connect)){
	echo "Failed to connect to MySQL: " . mysqli_connect_error($connect);
}