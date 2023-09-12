<?php

namespace jberall\signaturedraw\assets;

use yii\web\AssetBundle;
use yii\helpers\Url;

/**
 * 
 */
class SignatureDrawAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
   
    public $sourcePath = __DIR__ .'/../js/';
    public $css = [
//        'css/site.css',
    ];
    public $js = [
        'src/plugins/jSignature.CompressorBase30.js',
        'src/plugins/jSignature.CompressorSVG.js',
        'src/plugins/jSignature.UndoButton.js',
        'src/plugins/signhere/jSignature.SignHere.js',       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $head_js = [
        'libs/flashcanvas.js',
    ];
    public $begin_js = [
          'libs/modernizr.js',
          'libs/jquery.js'   
    ];
    
    public function registerAssetFiles($view) {
        foreach($this->head_js as $js) {
          $options = [];
          $options['position'] = \yii\web\View::POS_HEAD;
          $url = Url::to($this->baseUrl . "/" . $js);
          $view->registerJsFile($url, $options);
        }  
        foreach($this->begin_js as $js) {
          $options = [];
          $options['position'] = \yii\web\View::POS_BEGIN;
          $url = Url::to($this->baseUrl . "/" . $js);
          $view->registerJsFile($url, $options);            
        }
        parent::registerAssetFiles($view);
    }


}
