<?php use yii\web\View;
use yii\widgets\ActiveForm;

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', ['position' => View::POS_HEAD]);

?>
<div class="container">
    <div class="content">
        <div class="content-body tr">
            <div class="tournament-container">
                <div class="tournament-image">
                    <img src="/web/site/img/cs.jpg" alt="">
                    <div class="tournament-text">
                        Cs Go
                    </div>
                </div>
                <div class="tournament-table">
                    <div class="">
                        <p>Индивидуальный турнир</p>
                        <p>Начало регистрации: <br> 10.11.2020</p>
                        <p>Рейтинг: <br> Есть</p>
                        <p class="last">8 участников</p>
                    </div>
                    <div class="">
                        <p>Чекин за 30 мин</p>
                        <p>Начало турнира: <br> 12.11.2020</p>
                        <p>Окончания турнира: <br> 15.11.2020</p>
                        <p class="last">Конец регистрации: <br> 12.11.2020</p>
                    </div>
                </div>
                <div class="tournament-buttons">
                    <div class="button">Участники <i class="fal fa-plus"></i></div>
                    <div class="button">О турнире <i class="fal fa-plus"></i></div>
                </div>
                <div class="reg-container">
                    <div class="button-registration">
                        Регистация
                    </div>
                </div>

                <div class="tournament-grid">
                    <div class="dropdownlist">
                        <div class="rating-list win">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">JasonStathem</div>
                            <div class="rang">1</div>
                        </div>
                        <div class="rating-list loose">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Открыт</div>
                            <div class="rang">0</div>
                        </div>
                        <div class="rating-list">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Gambit</div>
                            <div class="rang ">1</div>
                        </div>
                        <div class="rating-list">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Petrovich</div>
                            <div class="rang">0</div>
                        </div>
                        <div class="rating-list">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">JasonStathem</div>
                            <div class="rang">1</div>
                        </div>
                        <div class="rating-list">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Открыт</div>
                            <div class="rang">0</div>
                        </div>
                        <div class="rating-list">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Gambit</div>
                            <div class="rang">1</div>
                        </div>
                        <div class="rating-list">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Gambit</div>
                            <div class="rang">0</div>
                        </div>
                    </div>
                    <div class="dropdownlist">
                        <div class="list-first">
                            <div class="rating-list win">
                                <div class="icon-background">
                                    <i class="fal fa-user-friends"></i>
                                </div>
                                <div class="name">JasonStathem</div>
                                <div class="rang">1</div>
                            </div>
                            <div class="rating-list loose">
                                <div class="icon-background">
                                    <i class="fal fa-user-friends"></i>
                                </div>
                                <div class="name">Открыт</div>
                                <div class="rang">0</div>
                            </div>
                        </div>
                        <div class="list-second">
                            <div class="rating-list">
                                <div class="icon-background">
                                    <i class="fal fa-user-friends"></i>
                                </div>
                                <div class="name">Gambit</div>
                                <div class="rang ">1</div>
                            </div>
                            <div class="rating-list">
                                <div class="icon-background">
                                    <i class="fal fa-user-friends"></i>
                                </div>
                                <div class="name">Petrovich</div>
                                <div class="rang">0</div>
                            </div>
                        </div>

                    </div>
                    <div class="dropdownlist">
                        <div class="rating-list win">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">JasonStathem</div>
                            <div class="rang">1</div>
                        </div>
                        <div class="rating-list loose">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">Открыт</div>
                            <div class="rang">0</div>
                        </div>
                    </div>
                    <div class="dropdownlist">
                        <div class="rating-list win">
                            <div class="icon-background">
                                <i class="fal fa-user-friends"></i>
                            </div>
                            <div class="name">JasonStathem</div>
                            <div class="rang">1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>