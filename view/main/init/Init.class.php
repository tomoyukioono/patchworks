<?php
class Patchworks_View_Main_Init extends Action
{
    /**
     * [[機能説明]]
     *
     * @access  public
     */
    // リクエストパラメータを受け取るため
    var $block_id = null;
   // 使用コンポーネントを受け取るため
    var $patchworksView = null;
    var $db = null;
    var $session = null;
    var $request = null;

    function execute()
    {

    $this->patchworks_id = 
    intval($this->patchworksView->getPatchworksID($this->block_id));
     
     if (  $this->patchworks_id == 0 ) {
     return "error";
     } 
        // patchworks_id を簡便のために id とする
        $id = $this->patchworks_id;
        // patchworks id 依存の情報
        $this->config = $this->patchworksView->getConfig($id);
        // block_id 依存の情報
        $this->item = $this->patchworksView->getItem($this->block_id);
        $this->role_auth_id = $this->session->getParameter('_role_auth_id');
        $this->user_id = $this->session->getParameter('_user_id');

        // テンプレートが読み込む、スクリプトファイル 
        $this->patchworks_script = 
        BASE_DIR .
        "/webapp/modules/patchworks/templates/patchworks_script.html";

       // パッチーク別のテンプレートが存在したら読み込む
       $x=BASE_DIR . "/extra/addin/patchworksID/" 
       .$id."/patchworks_view_main_init_".$id. ".html";
       if (is_file($x)) {
       $this->view_main_init_template=$x;
       };
       
       // パッチーク別のエラーテンプレートを読み込む       
       // 上記のテンプレート内で呼び出して使うのであまり活躍する時は
       // ないかもしれない。
       $x=BASE_DIR ."/extra/addin/patchworksID/" 
       . $id."/patchworks_view_error_".$id. ".html";
       if (is_file($x)) {
         $this->view_error_template=$x;
       };


       // 表示用のスクリプトが用意されていたら読み込む
       $x=BASE_DIR .'/extra/addin/patchworksID/'.$id.'/view_main_init.php';
       if (is_file($x)) {include($x);};

       // errror がある場合には上記のスクリプトの中で、return 'error' を行う

       return 'success';
    }
}
?>
