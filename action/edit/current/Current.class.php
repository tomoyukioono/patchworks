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
class Patchworks_Action_Edit_Current extends Action
{
	// リクエストパラメータを受け取るため
	var $block_id = null;

	// 使用コンポーネントを受け取るため
	var $db = null;
    // 使用コンポーネントを受け取るため
    var $patchworksAction = null;


	function execute()
	{
       if (!$this->patchworksAction->setPatchworks()) {
		return 'error';
        }
		return 'success';
	}
}
?>
