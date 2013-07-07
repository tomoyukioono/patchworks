<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * 登録フォームデータ登録コンポーネントクラス
 *
 * @package     NetCommons Components
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Patchworks_Components_Action
{
	/**
	 * @var DBオブジェクトを保持
	 *
	 * @access	private
	 */
	var $_db = null;

	/**
	 * @var Requestオブジェクトを保持
	 *
	 * @access	private
	 */
	var $_request = null;

	/**
	 * コンストラクター だけ
	 *
	 * @access	public
	 */
	function Patchworks_Components_Action()
	{
		$container =& DIContainerFactory::getContainer();
		$this->_db =& $container->getComponent("DbObject");
		$this->_request =& $container->getComponent("Request");
	}
    
    function setConfig(){
        // 不要だと思うけど、念の為に型判定
        $patchworks_id = intval($this->_request->getParameter("patchworks_id"));
        if (  $patchworks_id < 1 ) {
            return false;
        }

        $params = array($patchworks_id);


        $sql = "SELECT patchworks_id ".
                "FROM {patchworks_config} ".
                "WHERE patchworks_id = ?";
        $xxx = $this->_db->execute($sql, $params);
        if ($xxx === false) {
            $this->_db->addError();
            return false;
        }

        $config = json_encode($this->_request->getParameters());
        $params = array(
            "patchworks_id" => $patchworks_id,
            "config" => $config
        );

        // IDが存在したときはエラー
        if ( isset($xxx[0]['patchworks_id'])) {
            $xxx = $this->_db->updateExecute("patchworks_config", $params, "patchworks_id", true);
        } else {
            $xxx = $this->_db->insertExecute("patchworks_config", $params, true);
        }
        if ($xxx === false) {
            $this->_db->addError();
            return false;
        }
        return true;

    }
   /**
     * patchworks オプション情報をつけこむ
     *
     * @return boolean  true or false
     * @access  public
     */
    function setItem($block_id,$item) {
        //$item = json_encode($this->_request->getParameters());
        $params = array(
            "block_id" => $block_id,
            "item" => $item
        );
       $xxx = $this->_db->updateExecute("patchworks",
        $params, "block_id", true);
        if ($xxx === false) {
            $this->_db->addError();
            return false;
        }
        return true;
    }

   /**
     * patchworks をブロックに割り当てる
     *
     * @return boolean  true or false
     * @access  public
     */
    function setPatchworks()
    {
        $blockID = $this->_request->getParameter("block_id");
        $params = array($blockID);
        $sql = "SELECT block_id ".
                "FROM {patchworks} ".
                "WHERE block_id = ?";
        $blockIDs = $this->_db->execute($sql, $params);
        if ($blockIDs === false) {
            $this->_db->addError();
            return false;
        }
        $params = array(
            "block_id" => $blockID,
            "patchworks_id" => intval($this->_request->getParameter("patchworks_id"))
        );
       if (!empty($blockIDs)) {
            $result = $this->_db->updateExecute("patchworks", $params, "block_id", true);
        } else {
            $result = $this->_db->insertExecute("patchworks", $params, true);
        }
        if (!$result) {
            return false;
        }
        if (!$result) {
            return false;
        }
       return true;

    }


}
?>
