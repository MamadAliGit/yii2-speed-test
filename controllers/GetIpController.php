<?php

namespace mamadali\speedtest\controllers;

use GuzzleHttp\Client;
use mamadali\speedtest\Module;
use mamadali\speedtest\SpeedTestWidget;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

/**
 * @property Module $module
 */

class GetIpController extends Controller
{

	public $api_key;

    public function actionIndex()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;

		$ip = Yii::$app->request->getUserIP();

		$localIpInfo = $this->getLocalOrPrivateIpInfo($ip);

		return [
			'processedString' => $ip.' '.($localIpInfo ?: ''),
			'rawIspInfo' => $localIpInfo == null ? $this->getRawIpInfo($ip) : '',
		];
	}

	/**
	 * @param string $ip
	 *
	 * @return string|null
	 */
	protected function getLocalOrPrivateIpInfo($ip)
	{
		// ::1/128 is the only localhost ipv6 address. there are no others, no need to strpos this
		if ('::1' === $ip) {
			return 'localhost IPv6 access';
		}

		// simplified IPv6 link-local address (should match fe80::/10)
		if (stripos($ip, 'fe80:') === 0) {
			return 'link-local IPv6 access';
		}

		// anything within the 127/8 range is localhost ipv4, the ip must start with 127.0
		if (strpos($ip, '127.') === 0) {
			return 'localhost IPv4 access';
		}

		// 10/8 private IPv4
		if (strpos($ip, '10.') === 0) {
			return 'private IPv4 access';
		}

		// 172.16/12 private IPv4
		if (preg_match('/^172\.(1[6-9]|2\d|3[01])\./', $ip) === 1) {
			return 'private IPv4 access';
		}

		// 192.168/16 private IPv4
		if (strpos($ip, '192.168.') === 0) {
			return 'private IPv4 access';
		}

		// IPv4 link-local
		if (strpos($ip, '169.254.') === 0) {
			return 'link-local IPv4 access';
		}

		return false;
	}

	protected function getRawIpInfo($ip)
	{
		if($this->module->ipinfo_api_key != null){
			$client = new Client();
			$response = $client->request('GET','https://ipinfo.io/'.$ip.'?token='.$this->module->ipinfo_api_key);
			$result = Json::decode($response->getBody());
			return $result['country'].' '.$result['city'].' '.$result['region'].' | '.$result['org'];
		} else {
			return '';
		}

	}

}
