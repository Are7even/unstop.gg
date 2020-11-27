<?php


namespace app\models;


use Yii;
use yii\base\Model;

class CabinetUpdateForm extends Model
{
    public $first_name;
    public $last_name;
    public $photo;
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
            [['first_name','last_name','photo','about','vk','fb','twitch','steam','youtube','xbox','ps','battle_net'],'string','max'=>100],
        ];
    }

    public function edit(){
        $user = new User();
        $userLinks = new UserLinks();
        $userLinks->updateLinks($this->vk,$this->fb,$this->twitch,$this->steam,$this->battle_net,$this->youtube,$this->xbox,$this->ps);
        $user->editCabinet($this->first_name,$this->last_name,$this->photo,$this->about);
//        $user->first_name = $this->first_name;
//        $user->last_name = $this->last_name;
//        $user->photo = $this->photo;
//        $user->about = $this->about;
//        $user->userLinks->vk = $this->vk;
//        $user->userLinks->fb = $this->fb;
//        $user->userLinks->twitch = $this->twitch;
//        $user->userLinks->steam = $this->steam;
//        $user->userLinks->youtube = $this->youtube;
//        $user->userLinks->xbox = $this->xbox;
//        $user->userLinks->ps = $this->ps;
//        $user->userLinks->battle_net = $this->battle_net;
    }

}