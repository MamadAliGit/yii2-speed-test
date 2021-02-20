<?php

namespace mamadali\speedtest\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class SpeedTestAssets extends AssetBundle
{
    public $sourcePath = '@mamadali/speedtest/assets/dist';
    public $css = [
		'css/speedtest.css',
    ];
    public $js = [
		'js/speedtest_worker.js',
		'js/speedtest.js',
		'js/main.js',
    ];



}
