<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * patchworks 
 *
 * @package     NetCommons
 * @author      Tadashi Nagao etc
 * @copyright   2013-2013 Patchworks for N7etCommons
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     Patchworks for NetCommons  
 * @access      public
 */
class Patchworks_View_Edit_Base extends Action
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
     $this->patchworks_id=999999;
     $this->config=$this->patchworksView->getConfig($this->patchworks_id);

     if (isset($this->config->patchworks_id)) 
         {$this->patchworks_data_flag = 1 ;}
            if ($this->patchworks_id === false) {
                return "error";
            }
        return "base";
    }
}
?>
