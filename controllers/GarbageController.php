<?php

namespace mamadali\speedtest\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class GarbageController extends Controller
{

	public function behaviors()
	{
		return ArrayHelper::merge(parent::behaviors(), [
			// For cross-domain AJAX request
			'corsFilter'  => [
				'class' => \yii\filters\Cors::className(),
				'cors'  => [
					// restrict access to domains:
					'Origin'                           => ['*'],
					'Access-Control-Request-Method'    => ['POST', 'GET'],
				],
			],

		]);
	}

    public function actionIndex()
	{
		$headers = Yii::$app->response->headers;

		$headers->add('Content-Description', 'File Transfer');
		$headers->add('Content-Type', 'application/octet-stream');
		$headers->add('Content-Disposition', 'attachment; filename=random.dat');
		$headers->add('Content-Transfer-Encoding', 'binary');
		$headers->add('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0, s-maxage=0');
		$headers->add('Cache-Control', 'post-check=0, pre-check=0');
		$headers->add('Pragma', 'no-cache');

		// Generate data
		$data = openssl_random_pseudo_bytes(1048576);

		return $this->renderContent($data);
	}


	/**
	 * @return int
	 */
	protected function getChunkCount()
	{
		if (
			!array_key_exists('ckSize', $_GET)
			|| !ctype_digit($_GET['ckSize'])
			|| (int) $_GET['ckSize'] <= 0
		) {
			return 4;
		}

		if ((int) $_GET['ckSize'] > 1024) {
			return 1024;
		}

		return (int) $_GET['ckSize'];
	}

}
