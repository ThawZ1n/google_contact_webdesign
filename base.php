<?php

function con(){
    return mysqli_connect("localhost","root","","phone");
}

$url = "http://{$_SERVER['HTTP_HOST']}/my_class/web_deb";

$genderArr = ["male","female","gay","tom"];
$skillArr = ["HTML","CSS","JS","PHP","SQL","Node.js","Kotlin","Flutter"];