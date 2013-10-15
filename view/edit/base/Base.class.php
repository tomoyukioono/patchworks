<<<<<<< HEAD
<?php

class Patchworks_View_Edit_Base extends Action
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
     // モジュール全体の設定情報を保存する。仕組みとしては、patchwroks の
     // 999999 番に保存する。
     $this->patchworks_id=999999;
     $this->config=$this->patchworksView->getConfig($this->patchworks_id);
     // pattchworks の一覧を出す。extra/addin/patchworksID に、patchworks は
     // 配置されている
     $x = scandir(BASE_DIR . "/extra/addin/patchworksID");
     $xarray = array();
     // patchwroks 一覧に 999999 はでてこない
     foreach ($x as $k=>$v) {
       if (intval($v) > 0 && intval($v) <> 999999) {
         $xarray[]=$v;
       }  
     }
     sort($xarray); 

     // patchworksID　のうち一覧に出すものを選択する 
     $this->config['patchworks_all'] = implode(',',$xarray); 
     if (isset($this->config['patchworks_id'])) 
         {$this->patchworks_data_flag = 1 ;}
            if ($this->patchworks_id === false) {
                return "error";
            }

        $sql = "select patchworks_id as id ,count(*) as count "
               . "from {patchworks} "
               . " group by patchworks_id order by patchworks_id; ";
        $params=array();
        $this->patchworks = $this->patchworksView->getDataBySql($params,$sql);
        return "base";
    }
}
?>
=======
<?php
class Patchworks_View_Edit_Base extends Action
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
        $this->patchworks_id = 999999;
        $this->config = $this->patchworksView->getConfig($this->patchworks_id);

        $x = scandir(BASE_DIR."/extra/addin/patchworksID");
        $xarray = array();

        // 一覧に 999999 はでてこない
        foreach ($x as $v) {
            if (intval($v) > 0 && intval($v) <> 999999) {
                $xarray[] = $v;
            }
        }
        sort($xarray);

        $this->config['patchworks_all'] = implode(',', $xarray);
        if (isset($this->config['patchworks_id'])) {
            $this->patchworks_data_flag = 1 ;
        }
        if ($this->patchworks_id === false) {
            return "error";
        }

        $sql = "select patchworks_id as id ,count(*) as count from nc_patchworks ".
               " group by patchworks_id order by patchworks_id; ";
        $params = array();
        $this->patchworks = $this->patchworksView->getDataBySql($params, $sql);

        return "base";
    }
}
>>>>>>> f6eb15def3530e90dd86aa3c76c9753c71ff8e82
