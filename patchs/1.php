<?php
if ( isset( $this->item ) && 
isset( $this->item->patchworks_item_url ) && 
$this->item->patchworks_item_agent ) {
if(preg_match("/".$this->item->patchworks_item_agent."/",
$_SERVER['HTTP_USER_AGENT'])){
    header( "HTTP/1.1 301 Moved Permanently" );
    header("Location:". $this->item->patchworks_item_url);
   }
}
?>
