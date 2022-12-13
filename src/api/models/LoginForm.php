<?php

namespace api\models;

use yii\base\Model;

class LoginForm extends Model
{

    public $login;
    public $password;


    public function rules()
    {
        return [
            [['login', 'password'], 'string'],
            [['login', 'password'], 'required']
        ];
    }
}
