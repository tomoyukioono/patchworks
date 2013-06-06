<?php
//所属グループ
//$this->xxx=print_r($this->groups,true);
//$this->xxx=print_r($this->rooms,true);
$x=array();
foreach ($this->groups as $k=>$v) {
if ($this->first_choice_startpage <> $k 
&& isset($this->rooms[$k])) 
{ $x[]=$v; }
}
//$this->xxx=print_r($x,true);
//$this->xxx=$this->first_choice_startpage;
//$this->xxx=print_r($x,true);


if(isset($x[0]) && count($x)==1 ) {
    header( "HTTP/1.1 301 Moved Permanently" );
    header("Location:/group/" . $x[0]. "/");
    exit;

}

if ( isset( $this->item ) && 
isset( $this->item->patchworks_item_url ) && 
$this->item->patchworks_item_agent ) {
if(preg_match("/".$this->item->patchworks_item_agent."/",
$_SERVER['HTTP_USER_AGENT'])){
    header( "HTTP/1.1 301 Moved Permanently" );
    header("Location:". $this->item->patchworks_item_url);
    exit;
   }
}
?>
