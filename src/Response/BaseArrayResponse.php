<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 14:30
 */

namespace LB\Rapidu\Response;

use Guzzle\Service\Command\OperationCommand;

abstract class BaseArrayResponse extends BaseResponse
{
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

		$result = [];
		foreach ($response->json() as $object)
		{
			$result[] = new static($object);
		}

		return $result;
	}
}