<?php
/** @var $this \yii\web\View */

use mamadali\speedtest\assets\SpeedTestAssets;

SpeedTestAssets::register($this);
?>


<h1><?= $title ?></h1>
<div id="testWrapper" dir="ltr">
	<div id="startStopBtn" onclick="startStop()"></div>
	<div id="test">
		<div class="testGroup">
			<div class="testArea2">
				<div class="testName">Ping</div>
				<div id="pingText" class="meterText" style="color:#AA6060"></div>
				<div class="unit">ms</div>
			</div>
			<div class="testArea2">
				<div class="testName">Jitter</div>
				<div id="jitText" class="meterText" style="color:#AA6060"></div>
				<div class="unit">ms</div>
			</div>
		</div>
		<div class="testGroup">
			<div class="testArea">
				<div class="testName">Download</div>
				<canvas id="dlMeter" class="meter"></canvas>
				<div id="dlText" class="meterText"></div>
				<div class="unit">Mbps</div>
			</div>
			<div class="testArea">
				<div class="testName">Upload</div>
				<canvas id="ulMeter" class="meter"></canvas>
				<div id="ulText" class="meterText"></div>
				<div class="unit">Mbps</div>
			</div>
		</div>
		<div id="ipArea" class="ipArea">
			<span id="ip"></span>
		</div>
	</div>
</div>
<script type="text/javascript">setTimeout(function () {
        initUI()
    }, 100);</script>
