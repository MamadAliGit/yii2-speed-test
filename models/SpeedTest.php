<?php

namespace mamadali\speedtest\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $timestamp
 * @property string $ip
 * @property string $ua
 * @property string $lang
 * @property string $dl
 * @property string $ul
 * @property string $ping
 * @property string $jitter
 * @property string $log
 * @property int $creator_id
 *
 */
class SpeedTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%speed_test}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['id', 'timestamp', 'creator_id'], 'safe'],
			[['ip', 'ua', 'lang', 'dl', 'ul', 'ping', 'jitter', 'log'], 'safe']
        ];
    }


    /**
     * @inheritdoc
     * @return SpeedTestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpeedTestQuery(get_called_class());
    }

}
