<?php


namespace app\models;


use Yii;
use yii\base\Model;

class CabinetUpdateForm extends Model
{
    public $first_name;
    public $last_name;
    public $about;
    public $vk;
    public $fb;
    public $twitch;
    public $steam;
    public $youtube;
    public $xbox;
    public $ps;
    public $battle_net;

    public function rules()
    {
        return [
            [['first_name','last_name','about','vk','fb','twitch','steam','youtube','xbox','ps','battle_net'],'string','max'=>100],
        ];
    }

    public function edit(){
        $user = new User();
        $userLinks = new UserLinks();
        $user->editCabinet($this->first_name,$this->last_name,$this->about);
        $userLinks->updateLinks($this->vk,$this->fb,$this->twitch,$this->steam,$this->battle_net,$this->youtube,$this->xbox,$this->ps);

    }

}