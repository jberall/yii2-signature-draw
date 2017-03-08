<?php
namespace jberall\signaturedraw;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class SignatureDraw extends Widget{
	
    public $view;
	
    public function init(){
        //assigns the view to sdv in the view folder.
        //php 7 is required.
        $this->view = $this->view ?? 'sdv';
        parent::init();

    }

    public function run(){
       
        return $this->render($this->view);

    }
}
?>
