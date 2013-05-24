<?php
if(preg_match("/Chrome/",$_SERVER['HTTP_USER_AGENT'])){
header( "HTTP/1.1 301 Moved Permanently" );
header("Location:http://www.netcommons.org");
exit;}
?>
