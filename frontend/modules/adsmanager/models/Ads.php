<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 16.06.2016
 * Time: 13:49
 */

namespace frontend\modules\adsmanager\models;


use common\classes\Debug;
use common\models\db\AdsFields;
use common\models\db\AdsFieldsDefaultValue;
use common\models\db\AdsFieldsValue;
use common\models\db\AdsImg;
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\data\Pagination;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class Ads extends \common\models\db\Ads
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'title',
                'out_attribute' => 'slug',
                'translit' => true
            ],
            'region_id' => [
                'class' => 'common\behaviors\SaveRegionId',
                'in_attribute' => 'city_id',
            ],
        ];
    }


    public function rules()
    {
        $rules = parent::rules();
        $rules['title'] = ['title', 'string', 'max' => 70];
        $rules['content'] = ['title', 'string', 'max' => 4096];
        $rules['phone'] = ['phone', 'string', 'max' => 70];
        $rules['phone'] = [['phone'], 'required'];
        $rules['private_business'] = [['private_business'], 'required'];
        return $rules;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_img()
    {
        return $this->hasMany(AdsImg::className(), ['ads_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getgeobase_region()
    {
        return $this->hasMany(GeobaseRegion::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getgeobase_city()
    {
        return $this->hasOne(GeobaseCity::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getads_fields_value()
    {
        return $this->hasMany(AdsFieldsValue::className(), ['ads_id' => 'id']);
    }


    public static function getAllAds($id = []){
        $query = Ads::find()
            ->leftJoin('ads_img', '`ads_img`.`ads_id` = `ads`.`id`')
            ->leftJoin('geobase_region', '`geobase_region`.`id` = `ads`.`region_id`')
            ->leftJoin('geobase_city', '`geobase_city`.`id` = `ads`.`city_id`')
            ->where(['status' => [2,4]])
            ->andFilterWhere(['category_id' => $id])
            ->groupBy('`ads`.`id`');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);


        if(isset($_GET['sort'])){
            switch($_GET['sort']){
                case 'cheap':
                    $query->orderBy('price');
                    break;
                case 'dear':
                    $query->orderBy('price DESC');
                    break;
            }
        }
        else{

            $query
                ->orderBy('dt_update DESC');
        }

        $ads = $query

            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->with('ads_img', 'geobase_region', 'geobase_city')


            ->all();
        return ['ads' => $ads, 'pagination' => $pagination];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Категория',
            'title' => 'Заголовок',
            'content' => 'Описание',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'price' => 'Цена',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'mail' => 'Mail',
            'state' => 'Состояние',
            'private_business' => 'Тип'
        ];
    }

}