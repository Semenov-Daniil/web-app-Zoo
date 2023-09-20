<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kinds".
 *
 * @property int $id
 * @property string $title
 * @property string $family
 * @property string $continent
 * @property int $count_feed
 *
 * @property Accommodation[] $accommodations
 */
class Kinds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kinds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'family', 'continent', 'count_feed'], 'required'],
            [['count_feed'], 'integer'],
            [['title', 'family', 'continent'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название вида',
            'family' => 'Семейство',
            'continent' => 'Континент обитания',
            'count_feed' => 'Суточное потребление корма',
        ];
    }

    /**
     * Gets query for [[Accommodations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccommodations()
    {
        return $this->hasMany(Accommodation::class, ['kinds_id' => 'id']);
    }

    public static function countKinds($family)
    {
        return static::find()
        ->select([
            'family', 'COUNT(*) as count_kinds'
        ])
        ->where(['family' => $family])
        ->asArray()
        ->all();
    }

    public static function countFood($premises)
    {
        return static::find()
            ->select([
                'kinds.id as kinds_id', 'kinds.title as kinds_title', 'count_feed', 'premises.title as premises_title' 
            ])
            ->innerJoin('accommodation', 'accommodation.kinds_id = kinds.id')
            ->innerJoin('premises', 'premises.id = accommodation.premises_id')
            ->where(['premises.title' => $premises]);
    }
}
