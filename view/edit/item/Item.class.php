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
class Patchworks_View_Edit_Item extends Action
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
  $this->patchworks_id=$this->patchworksView->getPatchworksID($this->block_id);
  $this->item=$this->patchworksView->getItem($this->block_id);
  $this->multis=$this->patchworksView->getMultis();

  $this->view_edit_item_template='patchworks_view_edit_item_'.$this->patchworks_id . '.html';

  if (isset($this->item->multidatabase_id)  ) {
  $multi_by_block = $this->patchworksView->getMultiByBlockID($this->item->multidatabase_id,$this->block_id);
  } else {
  $multi_by_block = array();
      $this->item->multidatabase_id=0;
  } 

  if ( isset($this->item->patchworks_id) ){$this->patchworks_data_flag=1;}
            if ($this->patchworks_id === false) {
                return "error";
            }

        return "item";
    }
}
?>
