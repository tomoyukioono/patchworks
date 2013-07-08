<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * patchworks 
 *
 * @package     NetCommons
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Patchworks_View_Edit_Config extends Action
{
    // パラメータを受け取るため
    var $module_id = null;
	var $block_id = null;

    // 使用コンポーネントを受け取るため
    var $patchworksView = null;
    var $request = null;
    var $session = null;



    /**
     * 工事中
     *
     * @access  public
     */
    function execute()
    {
  $this->patchworks_id = intval($this->patchworksView->getPatchworksID($this->block_id));
  if ( $this->patchworks_id == 0 ){return "error";};
  $this->config=$this->patchworksView->getConfig($this->patchworks_id);
  $this->multis=$this->patchworksView->getMultis();

// テンプレートが読み込む、スクリプトファイル
        $x=BASE_DIR ."/webapp/modules/patchworks/templates/patchworks_script.html";
        $this->patchworks_script = $x;

 
  $x=BASE_DIR ."/extra/addin/patchworksID/".$this->patchworks_id . 
  "/patchworks_view_edit_config_".$this->patchworks_id. ".html";
  if (! is_file($x)) {
   $x=""; 
  }
  $this->view_edit_config_template=$x;

  if ( isset($this->config->patchworks_id)  ){$this->patchworks_data_flag=1;}
     $x = BASE_DIR .'/extra/addin/patchworksID/'.$this->patchworks_id.'/view_edit_config.php';
     if ( is_file( $x ) ) {
       include($x);
     } // end of execution

        return "config";
    }
}
?>
