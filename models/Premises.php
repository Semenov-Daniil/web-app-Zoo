<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "premises".
 *
 * @property int $id
 * @property string $title
 * @property int $number
 * @property int $is_pond
 * @property int $is_heating
 *
 * @property Accommodation[] $accommodations
 */
class Premises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'premises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'number'], 'required'],
            [['number', 'is_pond', 'is_heating'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название помещения',
            'number' => 'Номер помещения',
            'is_pond' => 'Наличие водоема',
            'is_heating' => 'Наличие отопления',
        ];
    }

    /**
     * Gets query for [[Accommodations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccommodations()
    {
        return $this->hasMany(Accommodation::class, ['premises_id' => 'id']);
    }
}
