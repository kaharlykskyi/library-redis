<?php

namespace app\models;

use Yii;
use yii\redis\ActiveRecord;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id_customer
 * @property string $email
 * @property string $city
 * @property string $country
 */
class Book extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'title', 'author', 'year', 'rating'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'author', 'year'], 'required'],
            [['rating'], 'safe'],
            [['title','author', 'year', 'rating'], 'string', 'max' => 45],
            [['title'], 'string', 'max' => 100],
            [['title'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'year' => 'Published year',
            'rating' => 'Rating',
        ];
    }
}
