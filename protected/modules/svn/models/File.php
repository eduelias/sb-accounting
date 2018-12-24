<?php

	class File extends CModel {
			
		public $status;
		
		public $path;
		
		public $filepath;
		
//private = shell, public = objeto. Save() torna private=public atravez de shellexec()
		public $name;
		
		private $_name;
		
		public $owner;
		
		private $_owner;
		
		public $group;
		
		private $_group;
		
		public $revision;
		
		public $svn_msg = '*** CRIADO NO SERVIDOR ***'; //ultima msg do arquivo;
		
		public $svn_author = 'FTP / WWW-DATA'; //autor do ultimo commit;
		
		public $svn_action = 'N.VERS.'; //action SVN (M/A/D/NS)
		
		public function cown(){
			return chown($this->file_path,$this->owner);
		}
		
		     
	}

?>