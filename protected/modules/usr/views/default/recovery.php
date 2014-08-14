<?php /*
@var $this DefaultController
@var $model RecoveryForm */

$title = Yii::t('UsrModule.usr', 'Username or password recovery');
if (isset($this->breadcrumbs))
    $this->breadcrumbs = array($this->module->id, $title);
$this->pageTitle = Yii::app()->name . ' - ' . $title;
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default <?php echo $this->module->loginFormCssClass; ?>">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title; ?></h3>
                </div>

                <?php $this->widget('usr.components.UsrAlerts', array('cssClassPrefix' => $this->module->alertCssClassPrefix)); ?>

                <div class="panel-body">
                    <?php $form = $this->beginWidget($this->module->formClass, array(
                        'id' => 'recovery-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                        'focus' => array($model, $model->scenario === 'reset' ? 'newPassword' : 'username'),
                    )); ?>

                    <p class="note"><?php echo Yii::t('UsrModule.usr', 'Fields marked with <span class="required">*</span> are required.'); ?></p>

                    <?php echo $form->errorSummary($model); ?>

                    <?php if ($model->scenario === 'reset'): ?>
                        <?php echo $form->hiddenField($model, 'username'); ?>
                        <?php echo $form->hiddenField($model, 'email'); ?>
                        <?php echo $form->hiddenField($model, 'activationKey'); ?>

                        <?php $this->renderPartial('_newpassword', array('form' => $form, 'model' => $model)); ?>
                    <?php
                    else:
                        echo $form->textFieldGroup($model, 'username');
                        echo $form->textFieldGroup($model, 'email');

                        if ($model->asa('captcha') !== null): ?>
                            <?php $this->renderPartial('_captcha', array('form' => $form, 'model' => $model)); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="buttons">
                        <?php echo CHtml::submitButton(Yii::t('UsrModule.usr', 'Submit'), array('class' => $this->module->submitButtonCssClass)); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- form -->
