<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 14:18
 */
require_once('../vendor/autoload.php');

$rapidu = new LB\Rapidu\RapiduClient('LOGIN', 'PASSWORD');

$response = $rapidu->getAccountDetails();
var_dump($response);