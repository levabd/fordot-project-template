<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Авторизируйтесь, пожалуйста</h3>
                </div>
                <div class="panel-body">

                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'login-form',
                        'enableAjaxValidation'=>true,

                    )); ?>

                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail или Логин" name="LoginForm[username]" id="LoginForm_username" autofocus>
                        </div>
                        <?php echo $form->error($model,'username'); ?>
                        <div class="form-group">
                            <input class="form-control" placeholder="Пароль" name="LoginForm[password]" id="LoginForm_password" type="password" value="">
                        </div>
                        <?php echo $form->error($model,'password'); ?>
                        <div class="checkbox">
                            <label>
                                <input name="LoginForm[rememberMe]" type="checkbox" value="1">Запомнить
                            </label>
                        </div>
                        <?php echo CHtml::submitButton('Войти', array('class' => 'btn btn-lg btn-success btn-block')); ?>
                    </fieldset>

                    <?php $this->endWidget(); ?>

                </div>
            </div>
        </div>
    </div>
</div>