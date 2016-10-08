<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%feedback}}".
 *
 * @property string $id
 * @property string $uid
 * @property string $email
 * @property string $remark
 * @property string $ctime
 */
class Feedback extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email','remark'], 'required'],
            [['uid', 'ctime'], 'integer'],
            [['email'], 'email'],
            [['remark'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => '邮箱',
            'remark' => '留言建议',
        ];
    }

    public function add(){
        if($this->validate()) {
            $this->uid = Yii::$app->user->identity->getId();
            $this->ctime = time();
            return $this->save();
        }else{
            return '';
        }
    }
}
