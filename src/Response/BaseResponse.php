<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 14:30
 */

namespace LB\Rapidu\Response;

use Guzzle\Http\Message\Response;
use Guzzle\Service\Command\OperationCommand;
use Guzzle\Service\Command\ResponseClassInterface;
use LB\Rapidu\RapiduException;

abstract class BaseResponse implements ResponseClassInterface
{
	/**
	 * @param array $response
	 */
	public function __construct(array $response)
	{
		foreach($response as $name => $value)
		{
			$this->$name = $value;
		}
	}

	/**
	 * Create a response model object from a completed command
	 *
	 * @param OperationCommand $command That serialized the request
	 *
	 * @return self
	 */
	public static function fromCommand(OperationCommand $command)
	{
		$response = $command->getResponse();

		self::checkResponse($response);

		return new static($response->json());
	}

	/**
	 * @param Response $response
	 */
	protected static function checkResponse(Response $response)
	{
		$r = $response->json();

		if (isset($r['message']['error']))
		{
			throw new RapiduException($r['message']['error']);
		}
	}
}