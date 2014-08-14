<?php /*
@var $this DefaultController
@var $model LoginForm */

$this->selfPageTitle = Yii::t('UsrModule.usr', 'Log in');
if (isset($this->breadcrumbs))
    $this->breadcrumbs = array($this->module->id, $title);
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default <?php echo $this->module->loginFormCssClass; ?>">
                <div class="panel-heading">
                    <h3 class="panel-title">Авторизируйтесь, пожалуйста</h3>
                </div>
                <div class="panel-body">
                    <?php $this->widget('usr.components.UsrAlerts', array('cssClassPrefix' => $this->module->alertCssClassPrefix)); ?>

                    <?php

                    $form = $this->beginWidget(
                        $this->module->formClass,
                        array(
                            'id' => 'login-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'focus' => array($model, 'username'),
                        )
                    );?>

                    <p class="note"><?php echo Yii::t('UsrModule.usr', 'Fields marked with <span class="required">*</span> are required.'); ?></p>

                    <?php echo $form->errorSummary($model);

                    echo $form->textFieldGroup($model, 'username');
                    echo $form->passwordFieldGroup($model, 'password', array('autocomplete' => 'off'));
                    echo ($this->module->rememberMeDuration > 0) ? $form->checkboxGroup($model, 'rememberMe') : '';?>

                    <div class="buttons">
                        <?php echo CHtml::submitButton(Yii::t('UsrModule.usr', 'Log in'), array('class' => 'btn btn-lg btn-success btn-block')); ?>
                    </div>

                    <?php if ($this->module->recoveryEnabled): ?>
                        <p>
                            <?php echo Yii::t('UsrModule.usr', 'Don\'t remember username or password?'); ?>
                            <?php echo Yii::t('UsrModule.usr', 'Go to {link}.', array(
                                '{link}' => CHtml::link(Yii::t('UsrModule.usr', 'password recovery'), array('recovery')),
                            )); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($this->module->registrationEnabled): ?>
                        <p>
                            <?php echo Yii::t('UsrModule.usr', 'Don\'t have an account yet?'); ?>
                            <?php echo Yii::t('UsrModule.usr', 'Go to {link}.', array(
                                '{link}' => CHtml::link(Yii::t('UsrModule.usr', 'registration'), array('register')),
                            )); ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($this->module->hybridauthEnabled()): ?>
                        <p>
                            <?php //echo CHtml::link(Yii::t('UsrModule.usr', 'Sign in using one of your social sites account.'), array('hybridauth/login')); ?>
                            <?php $this->renderPartial('_login_remote'); ?>
                        </p>
                    <?php endif; ?>

                    <?php
                    $this->endWidget();
                    unset($form);?>

                </div>
            </div>
        </div>
    </div>
</div>