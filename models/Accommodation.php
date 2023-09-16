<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accommodation".
 *
 * @property int $id
 * @property int $kinds_id
 * @property int $premises_id
 * @property int $count_animals
 *
 * @property Kinds $kinds
 * @property Premises $premises
 */
class Accommodation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kinds_id', 'premises_id', 'count_animals'], 'required'],
            [['kinds_id', 'premises_id', 'count_animals'], 'integer'],
            [['kinds_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kinds::class, 'targetAttribute' => ['kinds_id' => 'id']],
            [['premises_id'], 'exist', 'skipOnError' => true, 'targetClass' => Premises::class, 'targetAttribute' => ['premises_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kinds_id' => 'ID вид',
            'premises_id' => 'ID помещение',
            'count_animals' => 'Количество животных',
        ];
    }

    /**
     * Gets query for [[Kinds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKinds()
    {
        return $this->hasOne(Kinds::class, ['id' => 'kinds_id']);
    }

    /**
     * Gets query for [[Premises]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPremises()
    {
        return $this->hasOne(Premises::class, ['id' => 'premises_id']);
    }

    public static function countFeet($title)
    {
        return static::find()
            ->innerJoin('premises', 'premises.id = premises_id')
            ->innerJoin('kinds', 'kinds.id = kinds_id')
            ->where(['premises.title' => $title])
            ->sum("count_feed");
    }

    public static function kindsPremises($kinds_title, $is_pond)
    {
        return static::find()
            ->select(['kinds.id as kinds_id', 'kinds.title as kinds_title', 'premises.title as premises_title', 'premises.is_pond'])
            ->innerJoin('premises', 'premises.id = accommodation.premises_id')
            ->innerJoin('kinds', 'kinds.id = accommodation.kinds_id')
            ->where(['kinds.title' => $kinds_title])
            ->andWhere(['premises.is_pond' => $is_pond])
            ->asArray()
            ->all();
    }

    public static function premisesKinds($premises)
    {
        return static::find()
            ->select(['kinds.id as kinds_id', 'kinds.title as kinds_title', 'premises.title as premises_title'])
            ->innerJoin('premises', 'premises.id = accommodation.premises_id')
            ->innerJoin('kinds', 'kinds.id = accommodation.kinds_id')
            ->andWhere(['premises.title' => $premises])
            ->asArray()
            ->all();
    }
}
