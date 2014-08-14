<?php echo $form->passwordFieldGroup($model, 'newPassword', array('autocomplete' => 'off'));
if ($this->module->dicewareEnabled): ?>
    <span><a id="Users_generatePassword"
             href="#"><?php echo Yii::t('UsrModule.usr', 'Generate a password'); ?></a></span>
    <?php
    $diceUrl = $this->createUrl('password');
    $diceLabel = Yii::t('UsrModule.usr', 'Use this password?\nTo copy it to the clipboard press Ctrl+C.');
    $passwordId = CHtml::activeId($model, 'newPassword');
    $verifyId = CHtml::activeId($model, 'newVerify');
    $script = <<<JavaScript
$('#Users_generatePassword').on('click',function(){
	$.getJSON('{$diceUrl}', function(data){
		var text = window.prompt("{$diceLabel}", data);
		if (text != null) {
			$('#{$passwordId}').val(text);
			$('#{$verifyId}').val(text);
        }
	});
	return false;
});
JavaScript;
    Yii::app()->getClientScript()->registerScript(__CLASS__ . '#diceware', $script);
    ?>
<?php endif;
echo $form->passwordFieldGroup($model, 'newVerify', array('autocomplete' => 'off'));
?>
