<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * patchwork 表示関連コンポーネント
 *
 * @package     NetCommons Components
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Patchworks_Components_View
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
	 * コンストラクター
	 *
	 * @access	public
	 */
	function Patchworks_Components_View()
	{
		$container =& DIContainerFactory::getContainer();
		$this->_db =& $container->getComponent("DbObject");
		$this->_request =& $container->getComponent("Request");
	}


	/**
	 * 現在配置されている patchworks_id を取得する
	 *
	 * @return string
	 * @access	public
	 */
	function &getPatchworksID($block_id)
	{
		$params = array($block_id);
		$sql = "SELECT patchworks_id ".
				"FROM {patchworks} ".
				"WHERE block_id = ?";

		$results = $this->_db->execute($sql, $params);
		if ($results === false) {
			$this->_db->addError();
			return $results;
		}
		if(isset($results[0]["patchworks_id"])) {
		return $results[0]["patchworks_id"];} else
        {return $result;}
	}



}
?>
