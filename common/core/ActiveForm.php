<?php
namespace common\core;

use Yii;

class ActiveForm extends \yii\widgets\ActiveForm
{
    /* form表情的默认属性 */
    public $options = [
        'class' => 'form-horizontal form-bordered form-row-stripped',
    ];

    /* 字段默认使用的类 */
    public $fieldClass = 'common\core\ActiveField';

    public $errorCssClass = 'error';

    public $successCssClass = 'success';


}
