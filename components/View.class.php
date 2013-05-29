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

		$x = $this->_db->execute($sql,$params);
		if ($x === false) {
			$this->_db->addError();
			return $x;
		}
		if(isset($x[0]["patchworks_id"])) {
		return $x[0]["patchworks_id"];} else
        {return $x;}
	}

	/**
	 * multidatabase の一覧を取得
	 *
	 * @return string
	 * @access	public
	 */
	function getMultis() {
		$sql = "SELECT multidatabase_id,multidatabase_name ".
				"FROM {multidatabase} ";
		$x = $this->_db->execute($sql);
        return $x;
    }
	/**
	 * multidatabase からデータを読み込む
	 *
	 * @return string
	 * @access	public
	 */

	function getMulti($multidatabase_id) {
    // content_id の一覧を取得
		$params = array(intval($multidatabase_id));
		$sql = "SELECT content_id ".
				"FROM {multidatabase_content} ".
				"WHERE multidatabase_id = ?";
		$content_ids = $this->_db->execute($sql, $params);
		if ($content_ids === false) {
			$this->_db->addError();
			return $content_ids;
		}

        $xxx=array();

        foreach ($content_ids as $k=>$v) {
           $xxx[$v['content_id']]=array();
		   $params = array($v['content_id']);
		   $sql = "SELECT metadata_id,content ".
				"FROM {multidatabase_metadata_content} ".
				"WHERE content_id = ?";
		   $x = $this->_db->execute($sql, $params);
		   if ($x === false) {
			   $this->_db->addError();
			   return $x;
		   }
           $xx=array();
           foreach ($x as $k1=>$v1) {
               $xx[$v1['metadata_id']] = $v1['content']; 
           }
           $xxx[$v['content_id']]=$xx;

        }
        return $xxx; 

    }

	/**
	 * pages から group room の情報を読取る
	 * group room は、pages の中に埋め込まれている
     * root_id が、2 のものがそうなっている。
     * pages_users_link では、room とヒモ付になっているか？
     * ページなのか不明
	 * @return string
	 * @access	public
	 */


	function getGroups() {
    // group room一覧情報を取得
		$params = array(2);
		$sql = "SELECT room_id,page_name ".
				"FROM {pages} ".
				"WHERE root_id = ?";
		$x = $this->_db->execute($sql, $params);
		if ($x === false) {
			  $this->_db->addError();
			  return $x;
              }
        $xx=array();
        foreach ($x as $k=>$v) {
            $xx[$v['room_id']] = $v['page_name']; 
        }
		return $xx;
    }
	
	/**
     * ユーザがどのroomとヒモ付されているかの一覧を返す
     * room は、pages の一種類。root_id = 2 のものに直接ぶら下がっているのがroom
     * pages_users_link  
     * ページなのか不明
	 * @return string
	 * @access	public
	 */
    function getRoomsByUser($user_id) {
		$params = array($user_id);
		$sql = "SELECT room_id,role_authority_id ".
				"FROM {pages_users_link} ".
				"WHERE user_id = ?";

		$x = $this->_db->execute($sql, $params);

		if ($x === false) {
			  $this->_db->addError();
			  return $x;
              }
        $xx=array();
        foreach ($x as $k=>$v) {
            $xx[$v['room_id']] = $v['role_authority_id']; 
        }
		return $xx;
    }
}
?>
