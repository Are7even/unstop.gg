<?php


namespace app\widgets;


use app\models\Language;
use yii\base\Widget;

class CurrentLanguage extends Widget
{

    public $language;
    public $language_code;

    public function init()
    {
        parent::init();
    }

    public function run(){
        $languages = Language::findActive();
        if (empty($languages)){
            return false;
        }
        $language = Language::find()->where(['code'=>$this->language_code])->one();
        $this->language[]= $language->title;
        return implode('',$this->language);
    }

}