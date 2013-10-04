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
        // 使用可能なパッチ一覧を保存
        // パッチワーク別の設定を全体設定999999に流用しているの999999 は省く
        $config = $this->request->getParameters();
        $x = preg_replace('/,999999/',"",$config['patchworks_active']);
        $config['patchworks_active'] = $x; 
        if ($this->patchworksAction->setConfig($this->patchworks_id,json_encode($config)) ) {
		return "success";
        }
        return "error";
    }
}
?>
