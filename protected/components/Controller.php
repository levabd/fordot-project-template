<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/frontend';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

    public $metaTags=array();

    public $selfPageTitle;

    public $cs;

    private function compact($output, $return = false, $options = null)
    {
        $compactor = Yii::app()->contentCompactor;
        if($compactor == null)
            throw new CHttpException(500, Yii::t('messages', 'Missing component ContentCompactor in configuration.'));

        $output = $compactor->compact($output, $options);

        if($return)
            return $output;
        else
            echo $output;
    }

    public function init()
    {
        $this->cs = Yii::app()->clientScript;
    }

    public function render($view, $data = null, $return = false, $options = null)
    {
        $output = parent::render($view, $data, true);

        return $this->compact($output, $return, $options);
    }


    public function renderPartial($view, $data = null, $return = false, $options = null)
    {
        $output = parent::renderPartial($view, $data, true);

        return $this->compact($output, $return, $options);
    }

	public function IsNullOrEmptyString($question){
		return (!isset($question) || trim($question)==='');
	}
}
