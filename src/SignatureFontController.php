<?php

namespace jberall\signaturedraw;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SignatureFontController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($message='Signature Font Message',$font = 'learning_curve_regular_ot_tt.ttf',$image_width=500,$image_height=30) {
        $font_folder = __DIR__. '/fonts/';
       
        if (!is_file($font = $font_folder . $font)) {
            $font = $font_folder . 'learning_curve_regular_ot_tt.ttf';
        }
        if (!is_integer($image_height)) $image_height = 30;
        if (!is_integer($image_width)) $image_width = 500;

        // Create the image size
        $im = imagecreatetruecolor($image_width, $image_height);

        // Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 0, 0, 0);
//        imagecolortransparent($im, $black);
        imagefilledrectangle($im, 0, 0, 500, 300, $white);

        // Add some shadow to the text
        imagettftext($im, 20, 0, 11, 21, $grey, $font, $message);

        // Add the text
        imagettftext($im, 20, 0, 10, 20, $black, $font, $message);

        // Using imagepng() results in clearer text compared with imagejpeg()
        imagepng($im);
        imagedestroy($im);
//exit;
//        ob_start();

//        if( $format == 'jpg' || $format == 'jpeg' ) {
//
//            imagejpeg( $gdImg );
//
//        } elseif( $format == 'png' ) {
//
//            imagepng( $gdImg );
//
//        } elseif( $format == 'gif' ) {
//
//            imagegif( $gdImg );
//        }
//
//        $data = ob_get_contents();
//        ob_end_clean();
//
//        // Check for gd errors / buffer errors
//        if( !empty($data) ) {
//
//            $data = base64_encode( $data );
//
//            // Check for base64 errors
//            if ( $data !== false ) {
//
//                // Success
//                return "<img src='data:image/$format;base64,$data'>";
//            }
//        }

    }

}
