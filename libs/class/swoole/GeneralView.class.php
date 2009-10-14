<?php
class GeneralView
{
	protected $swoole;
	var $action = 'list';
	var $app_name;
	
	function __construct($swoole)
	{
		$this->swoole = $swoole;
	}
	
	function run()
	{
		if(isset($_GET['action'])) $this->action = $_GET['action'];
		$method = 'admin_'.$this->action;
		if(method_exists($this,$method)) call_user_method($method,$this);
		else Error::info('GeneralView Error!',"View <b>{$this->app_name}->{$method}</b> Not Found!");
	}
	
	function dlist($list,$params=array())
	{
		$this->swoole->tpl->assign('list',$list);
		$this->swoole->tpl->display('admin_'.$this->app_name.'_list.html');
	}
	
	function add($params=array())
	{
		
	}
	
	function modify($id,$params=array())
	{
		
	}
	function detail($id,$params=array())
	{
		
	}
	function delete($id,$params=array())
	{
		
	}
	function proc_upfiles()
	{
		namespace('file');
		if(!empty($_FILES))
		{
			foreach($_FILES as $k=>$f)
			{
				$_POST[$k] = file_upload($k);
			}
		}
	}
}
?>