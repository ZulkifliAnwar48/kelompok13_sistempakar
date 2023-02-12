<?php
$page=htmlentities(filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING));
$halaman="$page.php";

if(!file_exists($halaman) || empty($page)){
	include "content.php";
}else{
	include "$halaman";
}
?>

