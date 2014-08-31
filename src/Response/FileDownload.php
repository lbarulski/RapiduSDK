<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 15:19
 */

namespace LB\Rapidu\Response;

class FileDownload extends BaseResponse
{
	/** @var string */
	protected $fileLocation;

	/**
	 * @return string
	 */
	public function getDirectDownloadUrl()
	{
		return $this->fileLocation;
	}
}