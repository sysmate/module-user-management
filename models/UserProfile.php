<?php

namespace webvimark\modules\UserManagement\models;

use webvimark\modules\UserManagement\models\User;
use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $products_query
 * @property string $facedetection_query
 * @property string $facedetection_group
 * @property string $facedetection_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class UserProfile extends ActiveRecord
{
    
    public $status;
    public $superadmin;
   
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['products_query', 'facedetection_query', 'facedetection_group', 'facedetection_id'], 'string'],          
        ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User'),
            'products_query' => Yii::t('app', 'Custom Product FilterQuery'),
            'facedection_query' => Yii::t('app', 'Custom Facedetection FilterQuery'),
            'facedetection_group' => Yii::t('app', 'Custom Facedetection Group'),
            'facedetection_id' => Yii::t('app', 'Custom Facedetection UserID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created'),
            'updated_at' => Yii::t('app', 'Updated'),
        ];
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}