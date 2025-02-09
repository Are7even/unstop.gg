<?php


namespace app\widgets;


use app\models\Language;
use yii\base\Widget;
use Yii;

class LanguageIconWidget extends Widget
{

    public $currentLanguage;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        if (!empty($this->currentLanguage)) {
            $language = Language::find()->where(['code' => $this->currentLanguage])->one();
            if (empty($language)) {
                return false;
            }
            return $language->icon;
        }
        return false;
    }

}