<?php

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
