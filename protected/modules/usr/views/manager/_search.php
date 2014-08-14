<?php
/* @var $this ManagerController */
/* @var $model SearchForm */
/* @var $form CActiveForm */

$booleanData = array(Yii::t('UsrModule.manager', 'No'), Yii::t('UsrModule.manager', 'Yes'));
$booleanOptions = array('empty' => Yii::t('UsrModule.manager', 'Any'), 'separator' => '', 'labelOptions' => array('style' => 'display: inline; float: none;'));
?>

<?php $form = $this->beginWidget($this->module->formClass,
    array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
        'id' => 'verticalForm',
        'htmlOptions' => array('class' => 'well'), // for inset effect
    ));

echo $form->textFieldGroup($model, 'username');
echo $form->textFieldGroup($model, 'email');
echo $form->textFieldGroup($model, 'firstName');
echo $form->textFieldGroup($model, 'lastName');

$this->widget(
    'booster.widgets.TbButton',
    array('buttonType' => 'submit', 'label' => Yii::t('UsrModule.manager', 'Search'))
);

$this->endWidget();
