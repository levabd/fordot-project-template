<!DOCTYPE html>
<html lang="ru">
<head>

    <title><?=Yii::app()->name.' - '.CHtml::encode($this->selfPageTitle);?></title>
    <base href="http://<?=Yii::app()->params['siteURL']?>/"/>

    <meta name="url" content="http://<?=Yii::app()->params['siteURL']?>/">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0" />
    <meta name="language" content="ru" />
    <meta http-equiv="Content-Language" content="ru" />
    <meta name="author" lang="ru, uk, en" content="Fordot http://fordot.com.ua/" />
    <meta name="copyright" lang="ru, uk, en" content="Fordot http://fordot.com.ua/" />
    <meta name="distribution" content="global">
    <meta name="robots" content="<?=Yii::app()->params['indexationRights']?>" />
    <meta name="resource-type" content="document" />
    <meta name="revisit" content="15" />
    <meta name="document-state" content ="Dynamic" />
    <meta name="classification" content="Telecommunications" />
    <meta name="categories" content="<?=(isset($this->metaTags['keywords'])) ? $this->metaTags['keywords'] : ""?>">
    <meta name="keywords" content="<?=(isset($this->metaTags['keywords'])) ? $this->metaTags['keywords'] : ""?>" />
    <meta http-equiv="keywords" content="<?=(isset($this->metaTags['keywords'])) ? $this->metaTags['keywords'] : ""?>" />
    <meta name="description" content="<?=(isset($this->metaTags['description'])) ? $this->metaTags['description'] : ""?>" />
    <meta http-equiv="description" content="<?=(isset($this->metaTags['description'])) ? $this->metaTags['description'] : ""?>" />
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <? $this->cs->registerCssFile('/css/main.css'); ?>

</head>
<body>
    <?php echo $content; ?>
</body>
</html>