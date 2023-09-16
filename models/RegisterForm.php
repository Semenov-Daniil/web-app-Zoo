<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $name;
    public $surname;
    public $patronymic;
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
            [['name', 'surname', 'email', 'phone', 'login', 'password'], 'required'],
            ['patronymic', 'default', 'value' => null],
            ['email', 'email'],
            [['login'], 'unique', 'targetClass' => Users::class],
            ['phone', 'match', 'pattern' => '/^[\+]{0,1}[0-9]{11}$/u'],
            [['name', 'surname', 'patronymic', 'email', 'login', 'password'], 'string', 'max' => 255],
            [['password'], 'string', 'min' => 4],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилий',
            'patronymic' => 'Отчество',
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
