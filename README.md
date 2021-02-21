Yii2 Internet Speed Test
========================
Test Internet conection Widget
-----
[php source code](https://github.com/librespeed/speedtest)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require mamadali/yii2-speed-test "*"
```

or add

```
"mamadali/yii2-speed-test": "*"
```

to the require section of your `composer.json` file.
and run this command

```
composer update
```


Usage
-----
First add this code to config file
```
    'modules' => [
        ...
    	'speed-test' => [
    		'class' => 'mamadali\speedtest\Module',
		],
        ...
    ]
```

And run this command
```
php yii migrate/up --migrationPath=@vendor/mamadali/yii2-speed-test/migrations
```

Once the extension is installed, simply use it in your code by  :

```php
<?= \mamadali\speedtest\SpeedTestWidget::widget([
    	'title' => 'Internet speed test',
    ]) ?>
```
