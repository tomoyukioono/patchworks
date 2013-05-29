<?php
/**
if(preg_match("/Chrome/",$_SERVER['HTTP_USER_AGENT'])){
header( "HTTP/1.1 301 Moved Permanently" );
header("Location:http://www.netcommons.org");
exit;}
**/
//$this->xxx = $this->patchworksView->getMulti(1);
//$this->xxx = print_r($this->patchworksView->getRoomsByUser($this->user_id),true);
//$this->xxx = print_r($this->patchworksView->getMultis(),true);
$this->xxx = print_r($this->patchworksView->getMulti(3),true);
?>
