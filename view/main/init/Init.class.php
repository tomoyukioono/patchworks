<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
* [[機能説明]]
 *
 * @package     NetCommons
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Patchworks_View_Main_Init extends Action
{
    /**
     * [[機能説明]]
     *
     * @access  public
     */
    // リクエストパラメータを受け取るため
    var $block_id = null;
   // 使用コンポーネントを受け取るため
    var $patchworksView = null;
    var $onlineView = null;
    var $session = null;
    var $request = null;

    function execute()
    {
    $this->patchworks_id=intval($this->patchworksView->getPatchworksID($this->block_id));
     
     if (  $this->patchworks_id == 0 ) {
     return "error";
     } 
        // patchworks_id を簡便のために id とする
        $id = $this->patchworks_id;
         
        $this->user_id = $this->session->getParameter('_user_id');
        $this->handle = $this->session->getParameter('_handle');
        $this->config = $this->patchworksView->getConfig($id);
        $this->item=$this->patchworksView->getItem($this->block_id);

        $this->room_list=$this->patchworksView->getRoomList();

        $this->rooms_by_user=$this->patchworksView->getRoomsByUser($this->user_id);
        
        $this->first_choice_startpage = 
        $this->patchworksView->getGlobalConfigByName("first_choice_startpage");
        
        $this->multidatabase_id =0; 

        if (isset( $this->config->multidatabase_id) ){
        $this->multidatabase_id =$this->config->multidatabase_id;
        }
        // テンプレートが読み込む、スクリプトファイル 
        $x=BASE_DIR ."/webapp/modules/patchworks/templates/patchworks_script.html";
        $this->patchworks_script = $x;

// ここでコードを読み込む
       $x=BASE_DIR .'/extra/addin/patchworksID/'.$id.'/view_main_init.php';
       if (is_file($x)) {include($x);};
       
       $x=BASE_DIR ."/extra/addin/patchworksID/".$id."/patchworks_view_main_init_".$id. ".html";
       if (is_file($x)) {
       $this->view_main_init_template=$x;
       };
         //return  'success' . $this->patchworks_id; 

       return 'success';
    }
}
?>
