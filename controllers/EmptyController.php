<?php

namespace mamadali\speedtest\controllers;

use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Site controller
 */
class EmptyController extends Controller
{

	public $enableCsrfValidation = false;

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
					'Access-Control-Allow-Headers' => ['Content-Encoding', 'Content-Type'],
				],
			],

		]);
	}

    public function actionIndex()
	{
		return '';
	}
}
