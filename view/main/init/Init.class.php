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


        $this->handle = $this->session->getParameter('_handle');

        if (  $this->patchworks_id < 1 ){
          return 'success';
        }
// ここでコードを読み込む
       include(BASE_DIR .'/webapp/modules/patchworks/patchs/1.php');

         return  'success' . $this->patchworks_id; 
    }
}
?>
