<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "ads_img".
 *
 * @property integer $id
 * @property integer $ads_id
 * @property string $img
 *
 * @property Ads $ads
 */
class AdsImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ads_id', 'img'], 'required'],
            [['ads_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['ads_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ads::className(), 'targetAttribute' => ['ads_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ads_id' => 'Ads ID',
            'img' => 'Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasOne(Ads::className(), ['id' => 'ads_id']);
    }
}
