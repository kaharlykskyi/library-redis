<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\redis\ActiveRecord;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id_customer
 * @property string $email
 * @property string $city
 * @property string $country
 */
class Loan extends ActiveRecord
{
    public function attributes()
    {
        return ['id', 'client_id', 'book_id', 'date', 'status'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'book_id', 'date', 'status'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'book_id' => 'Book ID',
            'date' => 'Loan date',
            'status' => 'Status',
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Customer::className(), ['client_id' => 'id']);
    }

    public function getClientsList()
    {
        return ArrayHelper::map(Customer::find()->all(), 'id', 'full_name');
    }

    public function getBooksList()
    {
        return ArrayHelper::map(Book::find()->all(), 'id', 'title');
    }

    public function getBook()
    {
        return $this->hasOne(Book::className(), ['book_id' => 'id']);
    }

    public function getClientName()
    {
        return Customer::findOne($this->client_id)->full_name;
    }

    public function getBookName()
    {
        return Book::findOne($this->book_id)->title;
    }

    public function getStatusName()
    {
        switch ($this->status) {
            case 0:
                return "In rent";
            case 0:
                return "Available";
        }
    }
}
