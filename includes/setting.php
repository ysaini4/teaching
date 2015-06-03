<?php
	define("server",'laptop');//server = laptop,server,poorvi

	if(server=="poorvi"){
		define('HOST','http://poorvi.cse.iitd.ac.in/~cs1120233/teaching/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/home/btech/cs1120233/private_html/teaching/', false);
		define('CDN', HOST.'photo/', false);
		$db_data = array();
		$db_data['host'] = 'poorvi.cse' ;
		$db_data['user'] = 'mohit' ;
		$db_data['pass'] = 'mohitsaini' ; 
		$db_data['db'] = 'mohit' ;
	}
	else if(server=="laptop"){
		define('HOST','http://localhost/teaching/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/var/www/teaching/', false);
		define('CDN', HOST.'photo/', false);
		if(false){
			$db_data = array() ;
			$db_data['host'] = 'poorvi.cse' ;
			$db_data['user'] = 'mohit' ;
			$db_data['pass'] = 'mohitsaini' ; 
			$db_data['db'] = 'mohit' ;
		}
		else{
			$db_data = array() ;
			$db_data['host'] = 'localhost' ;
			$db_data['user'] = 'root' ;
			$db_data['pass'] = 'mohitsaini' ; 
			$db_data['db'] = 'teaching' ;
			$info=array();
		}
	}
	else if(server=="server"){
		define('HOST','http://54.149.49.212/teaching/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/var/www/html/teaching/', false);
		define('CDN', HOST.'photo/', false);
		$db_data = array() ;
		$db_data['host'] = 'localhost' ;
		$db_data['user'] = 'root' ;
		$db_data['pass'] = 'mohit' ;
		$db_data['db'] = 'teaching' ;
	}
	else if(server=="freeserver"){
		define('HOST','http://knowmiles.hostingsiteforfree.com/knowmiles/',false); // false mean that HOST cannot be used as hOsT
		define('ROOT', '/home/u274166964/public_html/knowmiles/', false);
		define('CDN', HOST.'photo/', false);
		$db_data = array() ;
		$db_data['host'] = 'mysql.1freehosting.com' ;
		$db_data['user'] = 'u274166964_gsk' ;
		$db_data['pass'] = 'KnowMiles696' ;
		$db_data['db'] = 'u274166964_test1' ;
	}

	define('BASE',HOST."index.php/welcome/",false); // false mean that HOST cannot be used as hOsT

?>