<?php

session_start();
$con = mysqli_connect('localhost','root','','brucre');
// $con = mysqli_connect('localhost','u164389542_root','aN5/HoNYfN','u164389542_brucre');

if (mysqli_connect_errno()) {
    echo "Connection could not be established..." . mysqli_connect_error();
}
