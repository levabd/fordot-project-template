<?php /*
@var $this CController
@var $model ProfileForm
@var $passwordForm PasswordForm
 */

echo $form->textFieldGroup($model, 'username');
echo $form->textFieldGroup($model, 'email');

if ($model->scenario !== 'register') {
    echo $form->passwordFieldGroup($model, 'password', array('autocomplete' => 'off'));
} else {
    if (Yii::app()->user->checkAccess('admin')) {
        echo $form->dropDownListGroup($model, 'role',
            array( 'widgetOptions' => array( 'data' => array(
                'user' => Yii::t('UsrModule.usr', 'Role.User'),
                'admin' => Yii::t('UsrModule.usr', 'Role.Admin'),
                'editor' => Yii::t('UsrModule.usr', 'Role.Editor'),
                'accountManager' => Yii::t('UsrModule.usr', 'Role.AccountManager'),)))
        );
    }
}
if (isset($passwordForm) && $passwordForm !== null) {
    $this->renderPartial('/default/_newpassword', array('form' => $form, 'model' => $passwordForm));
}
echo $form->textFieldGroup($model, 'firstName');
echo $form->textFieldGroup($model, 'lastName');

if ($model->getIdentity() instanceof IPictureIdentity && !empty($model->pictureUploadRules)) {
    $picture = $model->getIdentity()->getPictureUrl(80, 80);
    if ($picture !== null) {
        $url = $picture['url'];
        unset($picture['url']);
    }
    echo $picture === null ? '' : CHtml::image($url, Yii::t('UsrModule.usr', 'Profile picture'), $picture);
    echo $form->fileFieldGroup($model, 'picture');
    echo $form->checkboxGroup($model, 'removePicture');
}
