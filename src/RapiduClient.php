<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 13:47
 */

namespace LB\Rapidu;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use LB\Rapidu\Response\AccountDetails;
use LB\Rapidu\Response\FileDetails;
use LB\Rapidu\Response\FileDownload;
use LB\Rapidu\Response\UploadServer;

class RapiduClient
{
	/** @var string[] */
	private $userCredentials;

	/** @var string */
	private $client;

	/**
	 * @param string $login
	 * @param string $password
	 */
	public function __construct($login, $password)
	{
		$this->userCredentials = [
			'login' => $login,
			'password' => $password
		];
	}

	/**
	 * @return UploadServer
	 */
	public function getUploadServer()
	{
		$command = $this->getClient()->getCommand('UploadServer', $this->userCredentials);

		return $command->execute();
	}

	/**
	 * @return AccountDetails
	 */
	public function getAccountDetails()
	{
		$command = $this->getClient()->getCommand('AccountDetails', $this->userCredentials);

		return $command->execute();
	}

	/**
	 * @param string $fileId
	 *
	 * @return FileDetails
	 */
	public function getFileDetails($fileId)
	{
		$command = $this->getClient()->getCommand('FileDetails', ['id' => $fileId]);

		return reset($command->execute());
	}

	/**
	 * @param string $fileId
	 *
	 * @return FileDownload
	 */
	public function getFileDownload($fileId)
	{
		$command = $this->getClient()->getCommand('FileDownload', $this->userCredentials + ['id' => $fileId]);

		return $command->execute();
	}

	/**
	 * @throws \RuntimeException - not implemented
	 */
	public function upload()
	{
		// TODO: Implement upload() method.
		throw new \RuntimeException('Not implemented yet');
	}

	/**
	 * @return Client
	 */
	protected function getClient()
	{
		if (null === $this->client)
		{
			$this->client = new Client();
			$description = ServiceDescription::factory(__DIR__ . '/Resources/rapidu-sd.json');
			$this->client->setDescription($description);
		}

		return $this->client;
	}
} 