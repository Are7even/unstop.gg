<?php

namespace app\models;

use app\helpers\StatusHelper;
use app\helpers\TournamentStatusHelper;
use creocoder\translateable\TranslateableBehavior;
use Yii;

/**
 * This is the model class for table "tournament".
 *
 * @property int $id
 * @property int $status
 * @property string|null $icon
 * @property string|null $game
 * @property int|null $created_at
 * @property int|null $hidden
 * @property int|null $handheld
 * @property string|null $type
 * @property int|null $rating_on
 * @property int|null $players_count
 * @property int|null $start
 * @property int|null $end
 * @property int|null $checkin
 * @property int|null $checkin_start
 * @property int|null $checkin_end
 * @property int|null $first_place
 * @property int|null $second_place
 * @property int|null $third_place
 * @property int|null $fourth_place
 * @property int|null $fifth_place
 */
class Tournament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tournament';
    }

    public function behaviors()
    {
        return [
            'translateable' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['header','short_text','text'],
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hidden','status', 'handheld', 'rating_on', 'players_count', 'checkin', 'first_place', 'second_place', 'third_place', 'fourth_place', 'fifth_place', 'game'], 'integer'],
            [['icon', 'author', 'type'], 'string', 'max' => 255],
            [['created_at', 'start', 'end','checkin_start', 'checkin_end'], 'safe'],
            [['created_at'], 'default', 'value' => date('Y-m-j')],
            [['author'], 'default', 'value' => Yii::$app->user->id],
            [['status'], 'default', 'value' => TournamentStatusHelper::$created],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'status' => Yii::t('admin', 'Status'),
            'icon' => Yii::t('admin', 'Icon'),
            'author' => Yii::t('admin', 'Author'),
            'game' => Yii::t('admin', 'Game'),
            'created_at' => Yii::t('admin', 'Created At'),
            'hidden' => Yii::t('admin', 'Hidden'),
            'handheld' => Yii::t('admin', 'Handheld'),
            'type' => Yii::t('admin', 'Type'),
            'rating_on' => Yii::t('admin', 'Rating On'),
            'players_count' => Yii::t('admin', 'Players Count'),
            'start' => Yii::t('admin', 'Start'),
            'end' => Yii::t('admin', 'End'),
            'checkin' => Yii::t('admin', 'Checkin'),
            'checkin_start' => Yii::t('admin', 'Checkin Start'),
            'checkin_end' => Yii::t('admin', 'Checkin End'),
            'first_place' => Yii::t('admin', 'First Place'),
            'second_place' => Yii::t('admin', 'Second Place'),
            'third_place' => Yii::t('admin', 'Third Place'),
            'fourth_place' => Yii::t('admin', 'Fourth Place'),
            'fifth_place' => Yii::t('admin', 'Fifth Place'),
        ];
    }

    public function getTournaments() {
        return $this->find()->all();
    }

    public function getTournament($id) {
        return $this->findOne($id);
    }

    public function getTranslations () {
        return $this -> hasMany(TournamentTranslate::className(), ['tournament_id'=>'id']);
    }

    public function getStage () {
        return $this -> hasMany(Stage::className(), ['tournament_id'=>'id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'author']);
    }

    public function getIcon()
    {
        return ($this->icon) ? '/upload/' . $this->icon : '/web/upload/user/no-image.png';
    }

    public function allow(){
        $this->status = TournamentStatusHelper::$waiting;
        return $this->save();
    }

    public function disallow(){
        $this->status = TournamentStatusHelper::$created;
        return $this->save(false);
    }

    public function start() {
        $this->status = TournamentStatusHelper::$fighting;
        return $this->save();
    }

    public function checkRegistration($userId,$tournamentId){
        $links = TournamentToUser::find()->where(['user_id'=>$userId])->andWhere(['tournament_id'=>$tournamentId])->all();
        return $links;
    }

    static function getCurrentStartTime($id){
        return true;
    }

    static function getCurrentEndTime($id){
        return true;
    }

    static function getCurrentCheckinStartTime($id){
        return true;
    }

    static function getCurrentCheckinEndTime($id){
        return true;
    }

    public function getCutDate($modelDate){
        $date = date('d.m.Y', strtotime($modelDate));
        return $date;
    }

}
