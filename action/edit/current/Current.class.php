<?php

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
