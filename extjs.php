<?php
require_once(dirname(__FILE__)."/protected/config/debug.php");

defined('YII_DEBUG') or define('YII_DEBUG',false);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once(dirname(__FILE__)."/eyii/eyii.php");

EYii::createWebExtApplication(dirname(__FILE__).'/protected/config/main.php')->run();