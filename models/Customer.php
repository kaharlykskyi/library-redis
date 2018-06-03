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
class Customer extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'full_name', 'email', 'address', 'registration_date', 'phone'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name', 'email', 'address', 'registration_date'], 'required'],
            [['full_name', 'address', 'phone'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'registration_date' => 'Registration Date',
        ];
    }
}
