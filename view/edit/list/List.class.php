<?php

class Patchworks_View_Edit_List extends Action
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
      $this->patchworks_id=$this->patchworksView->getPatchworksID($this->block_id);
            if ($this->patchworks_id === false) {
                return "error";
            }
      $x = $this->patchworksView->getConfig(999999);
      $x = $x->patchworks_active;
      $xarray=explode(",",$x);  
      $xx=array();
      foreach ( $xarray as $k=>$v ) {
        $x=$this->patchworksView->getConfig($v);
        if ( $x ) {
            $xx[$v]['name'] = $x->patchworks_name;
        } else {$xx[$v]['name'] = "";}
        $xx[$v]['id'] = $v;
      }
      //$this->xxx= print_r($xx,true);
      $this->patchworks_list= $xx;
      $x = BASE_DIR ."/webapp/modules/patchworks/templates/default/patchworks_view_edit_list_one.html";
      $this->view_edit_list_one_template=$x;

      return "success";
}
}
?>
