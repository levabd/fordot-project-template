<?php
/**
 * Created by IntelliJ IDEA.
 * User: levabd
 * Date: 09.08.14
 * Time: 9:03
 */
if (!Yii::app()->user->isGuest): ?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <?php
        $this->widget('zii.widgets.CMenu',array(
            'htmlOptions'=>array('class'=>'nav'),
            'id' => 'side-menu',
            'encodeLabel' => false,
            'activateParents'=>true,
            'items'=>array(
                array(
                    'label'=>'<i class="fa fa-dashboard fa-fw"></i> Сводная информация',
                    'url'=>array('/admin/summary/index'),
                    'visible'=>!Yii::app()->user->isGuest,
                ),
                array(
                    'label'=>'<i class="fa fa-map-marker fa-fw"></i> Территориальные единицы<span class="fa arrow"></span>',
                    'url'=>array('#'),
                    'visible'=>Yii::app()->user->checkAccess('admin'),
                    'submenuOptions' => array(
                        'class' => 'nav nav-second-level',
                    ),
                    'items' => array(
                        array(
                            'label'=>'Области',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                        array(
                            'label'=>'Города',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                        array(
                            'label'=>'Улицы',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                        array(
                            'label'=>'Дома',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                    ),
                ),
                array(
                    'label'=>'<i class="fa fa-soundcloud fa-fw"></i> Провайдеры(Информация)<span class="fa arrow"></span>',
                    'url'=>array('#'),
                    'visible'=> Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                    'submenuOptions' => array(
                        'class' => 'nav nav-second-level',
                    ),
                    'items' => array(
                        array(
                            'label'=>'Информация о тарифе',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                        ),
                        array(
                            'label'=>'Информация о провайдере',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                        ),
                    ),
                ),
                array(
                    'label'=>'<i class="fa fa-database fa-fw"></i> Покрытие<span class="fa arrow"></span>',
                    'url'=>array('#'),
                    'visible'=> Yii::app()->user->checkAccess('admin'),
                    'submenuOptions' => array(
                        'class' => 'nav nav-second-level',
                    ),
                    'items' => array(
                        array(
                            'label'=>'Покрытие тарифов',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                        array(
                            'label'=>'Импорт покрытия',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                    ),
                ),
                array(
                    'label'=>'<i class="fa fa-align-left fa-fw"></i> Публикации<span class="fa arrow"></span>',
                    'url'=>array('#'),
                    'visible'=> Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                    'submenuOptions' => array(
                        'class' => 'nav nav-second-level',
                    ),
                    'items' => array(
                        array(
                            'label'=>'Разделы',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                        ),
                        array(
                            'label'=>'Публикации',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                        ),
                        array(
                            'label'=>'Вопросы и ответы',
                            'url'=>array('flot.html'),
                            'visible'=>Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('editor'),
                        ),
                    ),
                ),
                array(
                    'label'=>'<i class="fa fa-file-text-o fa-fw"></i> Заявки',
                    'url'=>array('forms.html'),
                    'visible'=> Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('accountManager'),
                ),
                array(
                    'label'=>'<i class="fa fa-file-picture-o fa-fw"></i> Банера',
                    'url'=>array('forms.html'),
                    'visible'=> Yii::app()->user->checkAccess('admin'),
                ),
                array(
                    'label'=>'<i class="fa fa-users fa-fw"></i> Управление пользовател. <span class="fa arrow"></span>',
                    'url'=>array('#'),
                    'visible'=> Yii::app()->user->checkAccess('admin'),
                    'submenuOptions' => array(
                        'class' => 'nav nav-second-level',
                    ),
                    'items' => array(
                        array(
                            'label'=>'Перечень',
                            'url'=>array('/usr/manager/index'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                            'active' => Yii::app()->controller->id === 'manager',
                        ),
                        array(
                            'label'=>'Создать',
                            'url'=>array('/usr/default/register'),
                            'visible'=>Yii::app()->user->checkAccess('admin'),
                        ),
                    ),
                ),
                array(
                    'label'=>'<i class="fa fa-gear fa-fw"></i> Настройки',
                    'url'=>array('forms.html'),
                    'visible'=> Yii::app()->user->checkAccess('admin'),
                ),
            ),
        ));
        ?>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<? endif; ?>