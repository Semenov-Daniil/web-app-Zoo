<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $fio;
    public $email;
    public $phone;
    public $login;
    public $password;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'phone', 'login', 'password'], 'required'],
            ['email', 'email'],
            [['login'], 'unique', 'targetClass' => Users::class],
            ['phone', 'match', 'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/u'],
            [['fio', 'patronymic', 'email', 'login', 'password'], 'string', 'max' => 255],
            [['password'], 'string', 'min' => 4],
            [['fio'], 'match', 'pattern' => '/^[а-яА-ЯёЁ\s\-]+$/u'],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'email' => 'E-mail',
            'phone' => 'Номер телефона',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }
    
    public function userRegister()
    {
        if ($this->validate()) {
            $user = new Users();
            if ($user->load($this->attributes, '')) {
                $user->token = Yii::$app->security->generateRandomString();
                $user->password = Yii::$app->security->generatePasswordHash($this->password);

                if ($user->save(false)) {
                    return $user;
                }
            }
        }
        return false;
    }
}
