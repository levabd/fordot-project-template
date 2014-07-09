<?php
/* @var $this SiteController */
/* @var $result searchResult */

$this->pageTitle=Yii::app()->name;
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>

<script>
var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  country: 'long_name',
};
</script>

<?php echo CHtml::beginForm (array ('index','post')); ?>
<?php echo CHtml::label('Область','region') ?>
<?php echo CHtml::textField('region', 'Винницкая', array('width'=>100, 'maxlength'=>100)); ?>
<?php echo CHtml::label('Город','city') ?>
<?php echo CHtml::textField('city', 'Агрономичное', array('width'=>100, 'maxlength'=>100)); ?>
<?php echo CHtml::label('Улица','street') ?>
<?php echo CHtml::textField('street', 'Ленина', array('width'=>100, 'maxlength'=>100)); ?>
<?php echo CHtml::label('Дом','building') ?>
<?php echo CHtml::textField('building', '', array('width'=>10, 'maxlength'=>10)); ?>
<?php echo CHtml::submitButton('Поиск'); ?>
<?php echo CHtml::endForm(); ?>

<?php
	if (isset($result)) 
	{
		foreach ($result as $row){
			echo $row->region->name;
			echo $row->city->name;
			echo $row->street->name;
			echo $row->building;
		}
	}
?>