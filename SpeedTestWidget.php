<?php

namespace mamadali\speedtest;

use Yii;
use yii\helpers\Url;
use yii\web\View;

/**
 * Class SpeedTestWidget
 * @package mamadali\speedtest
 */

class SpeedTestWidget extends \yii\base\Widget
{

	public $title = 'Speed Test';

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		$view = $this->getView();
		$speedtest_worker_url =  Yii::$app->getUrlManager()->getHostInfo().Yii::$app->assetManager->getPublishedUrl('@mamadali/speedtest/assets/dist')."/js/speedtest_worker.js?r=";
		$get_ip_action = Url::base(true).Url::to('/speed-test/get-ip');
		$get_garbage_action = Url::base(true).Url::to('/speed-test/garbage');
		$get_empty_action = Url::base(true).Url::to('/speed-test/empty');
		$get_save_action = Url::base(true).Url::to('/speed-test/save-data/save');
		$js = '
			var speedtest_worker_url = "'.$speedtest_worker_url.'";
			var get_ip_url = "'.$get_ip_action.'";
			var dl_action_url = "'.$get_garbage_action.'";
			var get_ping_url = "'.$get_empty_action.'";
			var get_save_data_url = "'.$get_save_action.'";
		';

		$view->registerJs(
			$js,
			View::POS_HEAD
		);
		return $this->render('speed',[
			'title' => $this->title,
		]);
	}
}