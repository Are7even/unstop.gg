<?php


namespace app\widgets;


use app\helpers\StatusHelper;
use app\models\Language;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class LanguageSwitch extends Widget
{
    public $items;
    public $admin;

    public function run()
    {
        $languages = Language::find()->where(['status' => true])->orderBy('pos ASC')->all();
        if (count($languages) <= 1) {
            return false;
        }
        if ($this->admin === StatusHelper::$active) {
            foreach ($languages as $language) {
                $this->items[] = Html::a($language->title, Url::current(['language' => $language->code]), ['class' => 'dropdown-item']);
            }
            return implode('', $this->items);
        } else {
            foreach ($languages as $language) {
                $this->items[] = '<div class="dropdown-item">' . Html::a($language->title . Html::img($language->getIcon(), [
                            'class' => 'flag',
                            'alt' => 'flag'
                        ]), Url::current(['language' => $language->code])) . '</div>';
            }
            return implode('', $this->items);
        }
    }
}