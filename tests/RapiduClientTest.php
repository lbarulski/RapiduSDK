<?php
/**
 * Author: Łukasz Barulski
 * Date: 09.09.14 21:49
 */
use Guzzle\Http\Message\Response;
use Guzzle\Service\Client;
use Guzzle\Http\Message\MessageInterface;
use Guzzle\Service\Description\ServiceDescription;
use LB\Rapidu\RapiduClient;
use LB\Rapidu\Response\AccountDetails;
use LB\Rapidu\Response\FileDetails;
use LB\Rapidu\Response\FileDownload;
use LB\Rapidu\Response\UploadServer;

class RapiduClientTest extends PHPUnit_Framework_TestCase
{
	public function testUploadServer()
	{
		$response = new Response(200, null, '{"serverId":"some url","sessionId":"i like fries but i don\'t like potatoes"}');
		$rapiduClient = $this->getRapiduClientWithEnqueuedResponses([$response]);

		$expectedResponse = new UploadServer(['serverId' => 'some url', 'sessionId' => 'i like fries but i don\'t like potatoes']);
		$response = $rapiduClient->getUploadServer();

		$this->assertEquals($expectedResponse, $response);
	}

	public function testAccountDetails()
	{
		$expectedResponse = new AccountDetails([
			'userLogin'          => 'me',
			'userEmail'          => 'me@home',
			'userPremium'        => '0',
			'userPremiumDateEnd' => 0,
			'userHostingPlan'    => 'mix',
			'userAmount'         => '0.01',
			'userFileNum'        => '666',
			'userFileSize'       => 0,
			'userDirectDownload' => '1',
			'userTrafficDay'     => 5368709120,
			'userDateRegister'   => '2006-06-06 06:06:06',
		]);

		$response = new Response(200, null, '{"userLogin":"me","userEmail":"me@home","userPremium":"0","userPremiumDateEnd":0,"userHostingPlan":"mix","userAmount":"0.01","userFileNum":"666","userFileSize":0,"userDirectDownload":"1","userTrafficDay":5368709120,"userDateRegister":"2006-06-06 06:06:06"}');
		$rapiduClient = $this->getRapiduClientWithEnqueuedResponses([$response]);
		$response = $rapiduClient->getAccountDetails();

		$this->assertEquals($expectedResponse, $response);
	}

	public function testFileDetails()
	{
		$expectedResponse = new FileDetails([
			'fileStatus'	=> 1,
			'fileId' 		=> '666',
			'fileName' 		=> 'Some.File.rar',
			'fileDesc' 		=> 'some description',
			'fileSize' 		=> '73456834',
			'fileUrl' 		=> 'http://rapidu.net/666/Some.File.rar',
		]);

		$response = new Response(200, null, '{"0":{"fileStatus":1,"fileId":"666","fileName":"Some.File.rar","fileDesc":"some description","fileSize":"73456834","fileUrl":"http:\/\/rapidu.net\/666\/Some.File.rar"}}');
		$rapiduClient = $this->getRapiduClientWithEnqueuedResponses([$response]);
		$response = $rapiduClient->getFileDetails('');

		$this->assertEquals($expectedResponse, $response);
	}

	public function testFileDownload()
	{
		$expectedResponse = new FileDownload([
			'fileLocation' => 'http://a666.rapiduservers.net/download/666xxx666xxx666/Some.File.rar',
		]);

		$response = new Response(200, null, '{"fileLocation":"http:\/\/a666.rapiduservers.net\/download\/666xxx666xxx666\/Some.File.rar"}');
		$rapiduClient = $this->getRapiduClientWithEnqueuedResponses([$response]);
		$response = $rapiduClient->getFileDownload('');

		$this->assertEquals($expectedResponse, $response);
	}

	public function testUpload()
	{
		$response = new Response(200, null, 'http://rapidu.net/666/Some.File.rar');
		$rapiduClient = $this->getRapiduClientWithEnqueuedResponses([$response]);
		$response = $rapiduClient->upload(new UploadServer([
			'sessionId' => 'a',
			'serverId' => 'a',
		]), '/dev/null');

		$this->assertEquals('http://rapidu.net/666/Some.File.rar', $response);
	}

	/**
	 * @param MessageInterface[] $responses
	 *
	 * @return RapiduClient
	 */
	private function getRapiduClientWithEnqueuedResponses(array $responses)
	{
		$mockPlugin = new Guzzle\Plugin\Mock\MockPlugin();
		array_map(function ($v) use($mockPlugin)
		{
			$mockPlugin->addResponse($v);
		}, $responses);

		$client = (new Client)->setDescription(ServiceDescription::factory(__DIR__ . '/../src/Resources/rapidu-sd.json'));
		$client->addSubscriber($mockPlugin);

		$rapiduClient = $this->getMock(RapiduClient::class, ['getClient'], ['','']);
		$rapiduClient->expects($this->any())->method('getClient')->willReturn($client);

		return $rapiduClient;
	}
}