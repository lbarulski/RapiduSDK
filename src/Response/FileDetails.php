<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 15:19
 */

namespace LB\Rapidu\Response;

class FileDetails extends BaseArrayResponse
{
	/** @var int */
	protected $fileStatus;

	/** @var string */
	protected $fileId;

	/** @var string */
	protected $fileName;

	/** @var string */
	protected $fileDesc;

	/** @var int */
	protected $fileSize;

	/** @var string */
	protected $fileUrl;

	/**
	 * @return bool - false if not exists
	 */
	public function isAvailable()
	{
		return (bool) $this->fileStatus;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->fileUrl;
	}

	/**
	 * @return int
	 */
	public function getSize()
	{
		return $this->fileSize;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->fileDesc;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->fileName;
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->fileId;
	}
}