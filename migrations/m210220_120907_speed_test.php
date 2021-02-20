<?php

use yii\db\Migration;

/**
 * Class m210220_120907_test
 */
class m210220_120907_speed_test extends Migration
{


	public function up(){
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%speed_test}}', [
			'id' => $this->primaryKey(),
			'timestamp' => $this->integer()->null()->defaultValue(null),
			'ip' => $this->string()->null(),
			'ua' => $this->string()->null(),
			'lang' => $this->string()->null(),
			'dl' => $this->string()->null(),
			'ul' => $this->string()->null(),
			'ping' => $this->string()->null(),
			'jitter' => $this->string()->null(),
			'log' => $this->string()->null(),
			'creator_id' => $this->integer()->null(),
		], $tableOptions);
	}
}
