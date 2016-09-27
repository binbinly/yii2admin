<?php
namespace common\core;

use Yii;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField
{
    /* 配置field模板 */
    public $template = '{label}<div class="controls">{input}{hint}{error}</div>';

    /* field 选项 */
    public $options = ['class' => 'control-group'];

    /* input选项 */
    public $inputOptions = ['class' => 'm-wrap span12', 'placeholder'=>''];

    /* label标签选项 */
    public $labelOptions = ['class' => 'control-label'];

    /* tip 提示标签选项 */
    public $hintOptions = ['tag'=>'span', 'class' => 'help-inline'];

    /* error 错误选项 */
    public $errorOptions = ['tag'=>'span', 'class' => 'help-block'];

    public $enableClientValidation = true;

    /*
     * ---------------------------------------
     * 带前置/后置图标的input
     * ---------------------------------------
     */
    public function iconTextInput($options = []){


        /* 设置图标左右位置 */
        $icon_pos = isset($options['iconPos']) ? $options['iconPos'] : 'left';
        /* 设置图标样式 */
        $icon_class = isset($options['iconClass']) ? $options['iconClass'] : 'icon-user';
        $icon_tag = Html::tag('i', '', ['class'=>$icon_class]);

        $input = Html::activeTextInput($this->model, $this->attribute, $options);
        $input = $icon_pos == 'left'?$icon_tag.$input:$input.$icon_tag;

        $this->parts['{input}'] = Html::tag('div', $input, ['class'=>'input-icon '.$icon_pos]);

        return $this;
    }
    
    /*
     * ---------------------------------------
     * radio单选
     * ---------------------------------------
     */
    public function radioList($items, $options = [], $class='radio'){
        $class = $class ? $class : 'radio';
        $options = array_merge([
            'tag'=>false,
            'itemOptions'=>[
                'labelOptions'=>[
                    'class'=>$class,
                ]
            ]
        ], $options);
        return parent::radioList($items, $options);
    }

    /*
     * ---------------------------------------
     * checkbox多选
     * ---------------------------------------
     */
    public function checkboxList($items, $options = [], $class='checkbox'){
        $class = $class ? $class : 'checkbox';
        $options = array_merge([
            'tag'=>false,
            'itemOptions'=>[
                'labelOptions'=>[
                    'class'=>$class,
                ]
            ]
        ], $options);
        return parent::checkboxList($items, $options);
    }

    /*
     * ---------------------------------------
     * select下拉框
     * ---------------------------------------
     */
    public function selectList($items, $options = []){
        $this->template = '{label}<div class="controls">{input}<div style="clear:both"></div>{hint}{error}</div>';
        $options = array_merge([], $options);
        return parent::dropDownList($items, $options);
    }

    /*
     * ---------------------------------------
     * 错误处理
     * ---------------------------------------
     */
    public function error($options = []){

        return parent::error($options);
    }
    
}