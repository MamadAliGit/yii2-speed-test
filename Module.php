<?php

namespace mamadali\speedtest;

class Module extends \yii\base\Module
{
	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'mamadali\speedtest\controllers';

	public $ipinfo_api_key = null;

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
	}
}