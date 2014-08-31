<?php
/**
 * Author: Łukasz Barulski
 * Date: 31.08.14 15:19
 */

namespace LB\Rapidu\Response;

class AccountDetails extends BaseResponse
{
	/** @var string */
	protected $userLogin;

	/** @var string */
	protected $userEmail;

	/** @var int */
	protected $userPremium;

	/** @var string */
	protected $userPremiumDateEnd;

	/** @var string */
	protected $userHostingPlan;

	/** @var float */
	protected $userAmount;

	/** @var int */
	protected $userFileNum;

	/** @var int */
	protected $userFileSize;

	/** @var int */
	protected $userDirectDownload;

	/** @var int */
	protected $userTrafficDay;

	/** @var string */
	protected $userDateRegister;

	/**
	 * @return string
	 */
	public function getLogin()
	{
		return $this->userLogin;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->userEmail;
	}

	/**
	 * @return bool
	 */
	public function isPremium()
	{
		return (bool) $this->userPremium;
	}

	/**
	 * @return \DateTime|null - null if false === self::isPremium
	 */
	public function getPremiumEndDate()
	{
		return 0 != $this->userPremiumDateEnd ? new \DateTime($this->userPremiumDateEnd) : null;
	}

	/**
	 * @return string
	 */
	public function getHostingPlan()
	{
		return $this->userHostingPlan;
	}

	/**
	 * @return float
	 */
	public function getAmount()
	{
		return $this->userAmount;
	}

	/**
	 * @return int
	 */
	public function getFilesNumber()
	{
		return $this->userFileNum;
	}

	/**
	 * @return int
	 */
	public function getFilesSize()
	{
		return $this->userFileSize;
	}

	/**
	 * @return bool
	 */
	public function isDirectDownloadEnabled()
	{
		return (bool) $this->userDirectDownload;
	}

	/**
	 * @return int
	 */
	public function getTrafficLeftToday()
	{
		return $this->userTrafficDay;
	}

	/**
	 * @return \DateTime
	 */
	public function getRegistrationDate()
	{
		return new \DateTime($this->userDateRegister);
	}
}