<?php
function loadLibraries($class)
{
$path=__DIR__."/lib/";
require_once $path.$class.".php";
}
spl_autoload_register("loadLibraries")

?>