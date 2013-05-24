<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Patchworks 削除
 *
 * @package     NetCommons
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Patchworks_Action_Edit_Delblock extends Action
{
	// リクエストパラメータを受け取るため
	var $block_id = null;
	
	// 使用コンポーネントを受け取るため
	var $db = null;
	

	function execute()
	{
	// block_id を読みだして削除する
		$result = $this->db->selectExecute("patchworks", array("block_id"=>$this->block_id));
    	if ($result === false) {
    		return 'error';
    	}
    	if(!isset($result[0])) {
    		return 'success';
    	}
		$patchworks = $result[0];

		$result = $this->db->deleteExecute("patchworks", array("block_id"=>$this->block_id));
    	if ($result === false) {
    		return 'error';
    	}
		
		return 'success';
	}
}
?>
