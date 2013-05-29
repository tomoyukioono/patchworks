<?php
// ジャンプ用のデータを汎用データベースからとってくる

 $x = $this->patchworksView->getMulti(3);
 foreach ($x as $k=>$v){
  if ( $v[16]==$this->block_id) {
   $this->xxx=$v[17];
   if(preg_match("/Chrome/",$_SERVER['HTTP_USER_AGENT'])){
    header( "HTTP/1.1 301 Moved Permanently" );
    header("Location:". $this->xxx);
   exit;}
   break;
   }
 }
?>
