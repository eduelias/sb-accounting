<?php

	class CSvn extends CModel {
		
		public $id; 
		
		public $action;
		
		public $path = __DIR__;
		
		public $copyfrom = false;
		
		public $revision = 0;
		
		public $text_status;
		
		public $repos_text_status;
		
		public $prop_status;
		
		public $repos_prop_status;
		
		public $kind;
		
		public $name;
		
		public $msg;
		
		public $date;
		
		public $cmt_author;
		
		public $status_const = 2;
		
		public $status = array(
			1=>'Normal',
			3=>'Sem modificação',
			8=>'Modificado'
		);
		
		public function __construct($param = array()){
			foreach ($param as $k => $v) {
				$this->$k = $v;
			}
		}
		
		public function attributeNames(){
			return array('id','text_status','repos_text_status','prop_status','repos_prop_status','name','kind','action','path','revision','msg','date','cmt_author');
		}
		
		public function rules(){
			return array(
				array('id,action,path,revision,msg,date,text_status,repos_text_status,prop_status,repos_prop_status,cmt_author','safe'),
				array('rev,text_status,repos_text_status,prop_status,repos_prop_status', 'numerical', 'integerOnly'=>true),
				array('action,text_status,repos_text_status,prop_status,repos_prop_status', 'length', 'max'=>1),
			);
		}
		 
		public function getStatus(){
			return svn_status($this->path, SVN_SHOW_UPDATES);
		}//1010
		
		public function query(){
			
			$aStatus = $this->getStatus();
			
			$ret = array();
			
			foreach ($aStatus as $k => $v){
				if ($v['repos_text_status'] == 8)
					$ret[] = array_merge($v,$this->getInfo($v['path']));
			}
			
			return $ret;
		}
		
		public static function update($path){
			return svn_update($path);
		}
		
		public static function getLog($path = __DIR__){
			return svn_log($path);
		}
		
		public function getInfo($path = __DIR__){
			
			$a = svn_log($path);
			
			$n = array(); 
			
			$i = 0;
			
			//if (is_array($a))
			foreach ($a as $k) {
				foreach ($k['paths'] as $j) {
						$i++;
						//if ($j['path'] == $path)
						$j = array_merge($j,array('id'=>$i,'revision'=>$k['rev'], 'msg'=>$k['msg'],'date'=>$k['date'],'author'=>$k['author']));
						//$n[] = $j;
				}
			}
			return $a[0];
		}
		
		public function search(){
			
			//$this->path = Yii::app()->basePath;
			
			$config = array(
				'keyField'=>'path',
	            'pagination' => array(
	                'pageSize' => 10,
	            ),
	            'sort' => array(
	                'attributes' => array(
	                    'revision', 'path',
	                ),
	            ),
	        );
			
			return new CArrayDataProvider($this->query(),$config);
			
		}
		
	}

?>