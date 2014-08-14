<?php
$cs = Yii::app()->clientScript;

/**
 * JavaScripts
 * $cs->registerCoreScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', CClientScript::POS_END);
 * $cs->registerCoreScript('////ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js', CClientScript::POS_END);
 * $cs->registerScriptFile('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', CClientScript::POS_END);
 */
$cs->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();$('[data-toggle=\"popover\"]').tooltip()", CClientScript::POS_READY);
$cs->registerScriptFile('/js/adminJS/plugins/metisMenu/metisMenu.min.js', CClientScript::POS_END);
$cs->registerScriptFile('/js/adminJS/sb-admin-2.js', CClientScript::POS_END);
?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= Yii::app()->name . ' - ' . CHtml::encode($this->selfPageTitle); ?></title>

<?php
//    <!--link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"-->
//    <!--link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css"/-->
  ?>
    <!-- MetisMenu CSS -->
    <link href="/css/adminCss/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="/css/adminCss/plugins/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/adminCss/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="/css/adminCss/plugins/morris.css" rel="stylesheet">
    <!--Yii Forms-->
    <link href="/css/form.css" rel="stylesheet">

<?php
//    <!-- Custom Fonts -->
//    <!--link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"-->
   ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<? if (!Yii::app()->user->isGuest): ?>

<div id="wrapper" class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Переключить навигацию</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            <span class="navbar-brand"><a href="/admin/summary"><?= 'Администрирование - ' . Yii::app()->name; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;<a
                    href="/">На сайт</a></span>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <?= Yii::app()->user->initials; ?> &nbsp;&nbsp;<img width="20" height="20"
                                                                                src="<?= Yii::app()->user->picture['url'] ?>">
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="/usr/profile"><i class="fa fa-user fa-fw"></i>Просмотр профиля</a>
                            </li>
                            <li><a href="/usr/default/profile/update/<?= Yii::app()->user->id; ?>/"><i
                                        class="fa fa-gear fa-fw"></i>Изменнение профиля</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Выход</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <?php $this->widget('AdminMenu'); ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <? endif; ?>
                <?php echo $content; ?>
                <? if (!Yii::app()->user->isGuest): ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
</div>
    <!-- /#wrapper -->
<? endif; ?>
</body>
</html>
