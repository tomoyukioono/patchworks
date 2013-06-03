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
    var $session = null;
    var $request = null;

    function execute()
    {
        $this->patchworks_id=$this->patchworksView->getPatchworksID($this->block_id);



        $this->user_id = $this->session->getParameter('_user_id');
        $this->handle = $this->session->getParameter('_handle');
        $this->config = $this->patchworksView->getConfig($this->patchworks_id);
        $this->item=$this->patchworksView->getItem($this->block_id);
        $this->multidatabase_id =0; 
        if (isset( $this->item->multidatabase_id) ){
        $this->multidatabase_id =$this->item->multidatabase_id;
        } 
        $this->xxx=$this->multidatabase_id;
        //$this->xxx=print_r($this->patchworksView->getItem($this->block_id),true);

        if (  intval($this->patchworks_id) < 1 ){
          return 'success';
        }
// ここでコードを読み込む
       include(BASE_DIR .'/webapp/modules/patchworks/patchs/'.intval($this->patchworks_id).'.php');

         //return  'success' . $this->patchworks_id; 
          $this->template='patchworks_view_main_init_'.$this->patchworks_id. '.html';
          return 'success';
    }
}
?>
