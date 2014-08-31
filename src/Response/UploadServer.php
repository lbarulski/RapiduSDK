<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 14:11
 */

namespace LB\Rapidu\Response;

class UploadServer extends BaseResponse
{
	/** @var string */
	protected $serverId;

	/** @var string */
	protected $sessionId;

	/**
	 * @return string
	 */
	public function getServerId()
	{
		return $this->serverId;
	}

	/**
	 * @return string
	 */
	public function getSessionId()
	{
		return $this->sessionId;
	}
}