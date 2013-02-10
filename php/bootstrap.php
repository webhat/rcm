<?php

require("phar://rcm-model/libs/neo4jphp.phar");


function loader($class) {
	$file = "". $class . '.class.php';
	$packages = array("rcm-model", "rcm-controller", "rcm-view");
	$packages[] = "";

	foreach( $packages as $package) {
		if (file_exists($file)) {
			require $file;
		}	else if (file_exists("./$package/php/". $file)) {
			require "./$package/php/". $file;
		} else if(file_exists("./$package/php/test/" . $file)) {
			require "./$package/php/test/". $file;
		} else if(file_exists("../" . $file)) {
			require "../". $file;
		}
	}
}

spl_autoload_register('loader');

