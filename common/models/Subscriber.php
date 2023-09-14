<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subscriber}}".
 *
 * @property int $id
 * @property int|null $channel_id
 * @property int|null $user_id
 * @property int|null $created_at
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subscriber}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channel_id', 'user_id', 'created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SubscriberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SubscriberQuery(get_called_class());
    }
}
