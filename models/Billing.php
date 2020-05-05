<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "billing".
 *
 * @property int $id
 * @property int $user_id
 * @property string $invoice_name
 * @property float $price
 * @property int $created_at
 * @property int $updated_at
 */
class Billing extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_name', 'user_id', 'price'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['invoice_name'], 'string', 'max' => 255],
            [['invoice_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User Id',
            'invoice_name' => 'Invoice Name',            
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
