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
            'kinds_id' => 'Kinds ID',
            'premises_id' => 'Premises ID',
            'count_animals' => 'Count Animals',
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
}