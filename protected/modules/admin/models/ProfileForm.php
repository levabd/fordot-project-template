<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ProfileForm extends CFormModel
{
    public $login;
    public $password;
    public $verifyPassword;
    public $email;
    public $roles;
    public $initials;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('password, verifyPassword', 'required'),
            array('login', 'length', 'max'=>50),
            array('email', 'email'),
            array('login', 'validateLogin'), //array('email, login', 'unique') + don1t exist '@'
            array('email', 'uniqueEmail'), //array('email, login', 'unique'),
            array('email, initials', 'length', 'max'=>250),
            array('password, verifyPassword', 'length', 'max'=>25),
            array('password', 'compare', 'compareAttribute'=>'verifyPassword', true),
            array('roles', 'length', 'max'=>255),
            array('roles','in','range'=>array('admin', 'user', 'editor', 'accountManager'),'allowEmpty'=>false),
            array('login, email, password, verifyPassword, roles, initials', 'safe', 'on'=>'search'),
        );
    }


    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'login' => 'Логин',
            'password' => 'Пароль',
            'verifyPassword' => 'Повторите пароль',
            'email' => 'Електронная почта',
            'roles' => 'Права',
            'initials' => 'ФИО',
        );
    }

    public function validateLogin() {

    }
}
