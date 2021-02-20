<?php

namespace mamadali\speedtest\controllers;

use mamadali\speedtest\models\SpeedTest;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SaveDataController extends Controller
{

	public $enableCsrfValidation = false;

    public function actionSave()
	{
		$model = new SpeedTest();

		if($model->load(Yii::$app->request->post(), '')){
			$model->ip = Yii::$app->request->getRemoteIP();
			$model->ua = Yii::$app->request->getUserAgent();
			$model->lang = Yii::$app->request->getPreferredLanguage();
			$model->timestamp = time();
			$model->creator_id = Yii::$app->user->id;
			$model->save(false);
		}

		return var_dump($model);
	}





}
