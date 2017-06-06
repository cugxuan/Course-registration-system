<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('smarty/Smarty.class.php');

class CI_Smarty extends Smarty{ 
/*		function smarty()  //function smarty()
        {
                $this->template_dir = "./templates/"; //模板存放目录 
                $this->compile_dir = "./templates_c/"; //编译目录 
                //$this->cache_dir = "./cache";// 老版 缓存目录
				$this->cache_dir = "./cache/";//缓存目录				
                $this->caching = 1;
                $this->cache_lifetime = 120; //缓存更新时间
                $this->debugging = true;
                $this->compile_check = true; //检查当前的模板是否自上次编译后被更改；如果被更改了，它将重新编译该模板。
                //$this->force_compile = true; //强制重新编译模板
                $this->allow_php_templates= true; //开启PHP模板
                $this->left_delimiter = "{"; //左定界符 
                $this->right_delimiter = "}"; //右定界符   
        }
		*/
		
		
		
		
	function __construct()
   {

        // 类构造方法.
        // 对于每个新的实例, 这些将自动被设置

        parent::__construct();

       			$this->template_dir = "./templates/"; //模板存放目录 
                $this->compile_dir = "./templates_c/"; //编译目录 
                //$this->cache_dir = "./cache";// 老版 缓存目录
				$this->cache_dir = "./cache/";//缓存目录				
                $this->caching = 1;
                $this->cache_lifetime = 120; //缓存更新时间
                $this->debugging = false;
                $this->compile_check = true; //检查当前的模板是否自上次编译后被更改；如果被更改了，它将重新编译该模板。
                //$this->force_compile = true; //强制重新编译模板
                $this->allow_php_templates= true; //开启PHP模板
                $this->left_delimiter = "{"; //左定界符 
                $this->right_delimiter = "}"; //右定界符   

        //$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
   }


}
?>