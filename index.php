<?php

use Illuminate\Database\Capsule\Manager as Capsule;

define('BaseUrl', str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");
define('CORE', sprintf('%score', BaseUrl));
define('APP', sprintf('%sapp', BaseUrl));
define('DEBUG',TRUE);

include BaseUrl.'vendor/autoload.php';
include CORE.'/common/commonFunction.php';
include CORE.'/Bootstrap.php';

if(DEBUG){
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}

$capsule = new Capsule;
$capsule->addConnection(require 'config/database.php');
$capsule->bootEloquent();

\core\Bootstrap::run();