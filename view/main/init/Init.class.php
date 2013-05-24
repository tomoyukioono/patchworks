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

    function execute()
    {
        $this->patchworks_id=$this->patchworksView->getPatchworksID($this->block_id);
        $this->session=$this->session;
        if (  $this->patchworks_id < 1 ){
          return 'success';
        }
         return  'success' . $this->patchworks_id; 
    }
}
?>
