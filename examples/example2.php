<?php
/**
 * Author: Łukasz Barulski
 * Date: 01.09.14 22:53
 */
require_once('../vendor/autoload.php');

$rapidu = new LB\Rapidu\RapiduClient('LOGIN', 'PASSWORD');

$fileDetails = $rapidu->getFileDetails('FILE_ID');
var_dump($fileDetails);
$response = $rapidu->getFileDownload($fileDetails->getId());
var_dump($response);