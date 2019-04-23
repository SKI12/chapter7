<?php
	//flag is in flag.php
	error_reporting(0);

	class oops {
		protected $oop;

		function __construct() {
			$this->oop = new a();
		}

		function __destruct() {
			$this->oop->action();
		}
	}

	class a {
		function action() {
			echo "Hello World!";
		}
	}

	class b {
		private $file;
		private $token;
		function action() {
			if ((ord($this->token)>47)&(ord($this->token)<58)) {
				echo "token can't be a number!";
				return ;
			}
			if ($this->token==0){
				if (!empty($this->file) && stripos($this->file,'..')===FALSE  
				&& stripos($this->file,'/')===FALSE && stripos($this->file,'\\')==FALSE) {
					include($this->file);
					echo $flag;
				}
			}else{
				echo "Oops...";
			}
		}
	}

	class c {
		private $cmd;
		private $token;
		function execcmd(){
			if ((ord($this->token)>47)&(ord($this->token)<58)) {
				echo "token can't be a number!";
				return ;
			}
			if ($this->token==1){
				if (!empty($this->cmd)){
					system($this->cmd);
				}
			}else{
				echo "Oops...";
			}
		}
	}

	if (isset($_GET['a']) and isset($_GET['b']) and isset($_GET['c'])) {
		$a=$_GET['a'];
		$b=$_GET['b'];
		if (stripos($a,'.')) {
			echo "You can't input '.' !";
			return ;
		}
		$data = @file_get_contents($a,'r');
		if ($data=="HelloWorld!" and strlen($b)>5 and eregi("666".substr($b,0,1),"6668") and substr($b,0,1)!=8){
			unserialize($_GET['c']);
		}
	} else {
		show_source(__FILE__);
	}

?>