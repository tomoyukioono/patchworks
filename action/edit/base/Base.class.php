<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * patchworks 登録処理
 *
 * @package     NetCommons
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Patchworks_Action_Edit_Base extends Action
{
	// リクエストパラメータを受け取るため
	var $block_id = null;
	var $patchworks_id = null;
    var $request =  null;


	// 使用コンポーネントを受け取るため
	var $db = null;
    var $patchworksAction = null;

	function execute()
	{ 
        $config = $this->request->getParameters();
        if ($this->patchworksAction->setConfig($this->patchworks_id,json_encode($config)) ) {
		return "success";
        }
        return "error";
    }
}
?>
