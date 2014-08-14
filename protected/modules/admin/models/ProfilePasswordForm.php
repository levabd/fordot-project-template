<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ProfileForm extends CFormModel
{
    public $login;
    public $oldPassword;
    public $newPassword;
    public $verifyPassword;
    public $email;
    public $email;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            return array(
                array('login, email, oldPassword, initials', 'required'),
                array('login', 'length', 'max'=>50),
                array('email, initials', 'length', 'max'=>250),
                array('passwordHashEmail', 'length', 'max'=>255),
                array('roles', 'length', 'max'=>255),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, login, email, passwordHashEmail, roles, initials', 'safe', 'on'=>'search'),
            );
            // username and password are required
            array('username, password, ', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }


    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'rememberMe' => 'Запомнить',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $identity = new UserIdentity($this->username, $this->password);
            $identity->authenticate();
            if ($identity->errorCode === UserIdentity::ERROR_PASSWORD_INVALID)
                $this->addError('password', 'Пароль или имя пользователя неверны.');
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = $this->rememberMe ? 3600 * 24 * 1 : 0; // 1 days
            //$duration=$this->rememberMe ? 60 : 0; // 1 minute
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }
}
