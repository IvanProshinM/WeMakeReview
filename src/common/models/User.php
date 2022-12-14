<?php

namespace common\models;

use common\query\UserQuery;
use yii\db\ActiveRecord;
use Yii;
use yii\web\IdentityInterface;

/**
 * @property int $id
 * @property string|null $login
 * @property string|null $email
 * @property string|null $password
 * @property string|null $access_token
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }

    public static function find()
    {
        return new UserQuery(static::class);
    }

    public function setPassword($password)
    {
        $this->password = \Yii::$app->security->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function validateAuthKey($authKey)
    {
        return $this->access_token === $authKey;
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getAuthKey()
    {
        return $this->access_token;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
