<?php
$root = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$script_name = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
define ('__SALT__', 'Fho8G**g&0ds43syK0PKPph&^D64fi7g1k-90`j*G&7IVGD');
define ('__ROOT__', $root.$script_name);
define ('__SITE_NAME__', 'Simple MVC');
define ('__ROOT_PATH__', realpath($_SERVER['DOCUMENT_ROOT'].'/'.$script_name));
define ('__HOSTNAME__', 'mysql:3306');
define ('__USERNAME__', 'app');
define ('__PASSWORD__', 'app');
define ('__DATABASE__', 'app');
define ('__HOSTHOSTNAME__', 'mysql2:3307');
define ('__HOSTUSERNAME__', 'hostApp');
define ('__HOSTPASSWORD__', 'hostApp');
define ('__HOSTDATABASE__', 'hostApp');
spl_autoload_register(function ($className) {
    if (file_exists('system/' . $className . '.php')) { 
        require_once 'system/' . $className . '.php'; 
    }
	else if (file_exists('controllers/' . $className . '.php')) { 
        require_once 'controllers/' . $className . '.php'; 
    }
	else if (file_exists('models/' . $className . '.php')) { 
        require_once 'models/' . $className . '.php'; 
    }
    else if (file_exists('libraries/' . $className . '.php')) { 
        require_once 'libraries/' . $className . '.php'; 
    }
    else if (file_exists($className . '.php')) { 
        require_once $className . '.php'; 
    }
});

new Bootstrap();