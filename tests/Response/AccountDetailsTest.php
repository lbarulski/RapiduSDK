<?php
/**
 * Author: Łukasz Barulski
 * Date: 09.09.14 23:26
 */

use LB\Rapidu\Response\AccountDetails;

class AccountDetailsTest extends \PHPUnit_Framework_TestCase
{
	public function testForAnyAccount()
	{
		$accountDetails = new AccountDetails([
			'userLogin'          => 'me',
			'userEmail'          => 'me@home',
			'userHostingPlan'    => 'mix',
			'userAmount'         => '0.01',
			'userFileNum'        => '666',
			'userFileSize'       => 0,
			'userDirectDownload' => '1',
			'userTrafficDay'     => 5368709120,
			'userDateRegister'   => '2006-06-06 06:06:06',
		]);

		$this->assertSame('me', $accountDetails->getLogin());
		$this->assertSame('me@home', $accountDetails->getEmail());
		$this->assertSame('mix', $accountDetails->getHostingPlan());
		$this->assertSame(0.01, $accountDetails->getAmount());
		$this->assertSame(666, $accountDetails->getFilesNumber());
		$this->assertSame(0, $accountDetails->getFilesSize());
		$this->assertSame(true, $accountDetails->isDirectDownloadEnabled());
		$this->assertSame(5368709120, $accountDetails->getTrafficLeftToday());
		$this->assertEquals(new \DateTime('2006-06-06 06:06:06'), $accountDetails->getRegistrationDate());
	}

	public function testForFreeAccount()
	{
		$accountDetails = new AccountDetails([
			'userPremium'        => '0',
			'userPremiumDateEnd' => 0,
		]);

		$this->assertSame(false, $accountDetails->isPremium());
		$this->assertNull($accountDetails->getPremiumEndDate());
	}

	public function testForPremiumAccount()
	{
		$accountDetails = new AccountDetails([
			'userPremium'        => '1',
			'userPremiumDateEnd' => '2014-09-30 12:00:00',
		]);

		$this->assertSame(true, $accountDetails->isPremium());
		$this->assertEquals(new \DateTime('2014-09-30 12:00:00'), $accountDetails->getPremiumEndDate());
	}
}
 