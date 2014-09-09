<?php
/**
 * Author: Łukasz Barulski
 * Date: 09.09.14 23:48
 */

use LB\Rapidu\Response\UploadServer;

class UploadServerTest extends PHPUnit_Framework_TestCase
{
	public function testModel()
	{
		$uploadServer = new UploadServer([
			'serverId'        => 'http://google.pl',
			'sessionId' 	  => 'ahdahFJKHDKShkfjksDFJKSDF87h=',
		]);

		$this->assertSame('http://google.pl', $uploadServer->getServerId());
		$this->assertSame('ahdahFJKHDKShkfjksDFJKSDF87h=', $uploadServer->getSessionId());
	}
}
 