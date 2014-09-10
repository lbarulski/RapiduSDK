<?php
use LB\Rapidu\Response\FileDetails;

/**
 * Author: Łukasz Barulski
 * Date: 10.09.14 20:32
 */

class FileDetailsTest extends PHPUnit_Framework_TestCase
{
	public function testModel()
	{
		$fileDetails = new FileDetails([
			'fileStatus'	=> 1,
			'fileId' 		=> '666',
			'fileName' 		=> 'Some.File.rar',
			'fileDesc' 		=> 'some description',
			'fileSize' 		=> '73456834',
			'fileUrl' 		=> 'http://rapidu.net/666/Some.File.rar',
		]);

		$this->assertSame(true, $fileDetails->isAvailable());
		$this->assertSame('666', $fileDetails->getId());
		$this->assertSame('Some.File.rar', $fileDetails->getName());
		$this->assertSame('some description', $fileDetails->getDescription());
		$this->assertSame(73456834, $fileDetails->getSize());
		$this->assertSame('http://rapidu.net/666/Some.File.rar', $fileDetails->getUrl());
	}
}
 