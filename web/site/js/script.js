const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll(".lock-padding");

let unlock = true;

const timeout = 800;

if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
        const popupLink = popupLinks[index];
        popupLink.addEventListener("click", function (e) {
            const popupName = popupLink.getAttribute('href').replace('#', '');
            const currentPopup = document.getElementById(popupName);
            popupOpen(currentPopup);
            e.preventDefault();
        });
    }
}


const popupCloseIcon = document.querySelectorAll('.close-popup');
if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++){
        const el = popupCloseIcon[index];
        el.addEventListener('click', function (e) {
            popupClose(el.closest('.popup'));
            e.preventDefault();
        })
    }
}


function popupOpen (currentPopup) {
    if (currentPopup && unlock) {
        const popupActive = document.querySelector('.popup.open');
        if (popupActive) {
            popupClose(popupActive, false);
        } else {
            bodyLock();
        }
        currentPopup.classList.add('open');
        currentPopup.addEventListener("click", function (e) {
            if (!e.target.closest('.popup__content')) {
                popupClose(e.target.closest('.popup'));
            }
        });
    }
}

function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
        popupActive.classList.remove('open');
        if (doUnlock) {
            bodyUnlock();
        }
    }
}

function bodyLock() {
    const LockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

    if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
            const el = lockPadding[index];
            // el.style.paddingRight = LockPaddingValue;
        }
    }
    // body.style.paddingRight = LockPaddingValue;
    body.classList.add('lock');

    unlock = false;
    setTimeout(function () {
        unlock = true;
    }, timeout);
}

function bodyUnlock() {
    setTimeout(function () {
        if (lockPadding.length > 0) {
            for (let index = 0; index < lockPadding.length; index++) {
                const el = lockPadding[index];
                el.style.paddingRight = '0px';
            }
        }
        body.style.paddingRight = '0px';
        body.classList.remove('lock');
    }, timeout);
}

document.addEventListener('keydown', function (e) {
    if (e.which === 27) {
        const popupActive = document.querySelector('.popup.open');
        popupClose(popupActive);
    }
});

(function () {
    if (!Element.prototype.closest) {
        var node = this;
        while (node) {
            if (node.matches(css)) return node;
            else node = node.parentElement;
        }
        return null;
    }
})();

(function () {
    if (!Element.prototype.matches) {

        Element.prototype.matches = Element.prototype.matchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector;
    }
})();
var galleryThumbs = new Swiper('.gallery-thumbs', {
    direction: 'vertical',
    spaceBetween: 80,
    slidesPerView: 3,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});

var galleryTop = new Swiper('.gallery-top', {
    direction: 'horizontal',
    autoplay: {
        delay: 2000,
    },
    loop: true,
    slidesPerView: 1,
    loopedSlides: 3, //looped slides should be the same
    thumbs: {
        swiper: galleryThumbs,
    },
    // breakpoints: {
    //     // when window width is >= 1024px
    //     1024: {
    //         slidesPerView: 1,
    //         spaceBetween: 10
    //     }
    // }
});

var swiper = new Swiper('.sliderMobile', {
    cssMode: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    mousewheel: true,
    keyboard: true,
});

(function () {

    $("#nav_toggle").on("click", function (event) {
        event.preventDefault();

        $(this).toggleClass("active");
        $("#nav").toggleClass("active");

    });

    $(".nav_link").on("click", function () {

        $('#nav').toggleClass("active");
        $('.nav-toggle').toggleClass("active");

    });

    $("#nav__close").on("click", function (event) {
        event.preventDefault();

        $('#nav_toggle').removeClass("active");
        $("#nav").removeClass("active");

    });

})();
// const login_form = document.getElementById('login');
// const register_form = document.getElementById('register');
// const recovery_form = document.getElementById('recovery');
//
// function showLogin(event){
//     event.preventDefault()
//     register_form.classList.add('shadow')
//     recovery_form.classList.add('shadow')
//     login_form.classList.remove('shadow')
// }
//
// function showRegister(event){
//     event.preventDefault()
//     register_form.classList.remove('shadow')
//     recovery_form.classList.add('shadow')
//     login_form.classList.add('shadow')
// }
//
// function showRecovery(event){
//     event.preventDefault()
//     register_form.classList.add('shadow')
//     recovery_form.classList.remove('shadow')
//     login_form.classList.add('shadow')
// }
//
// document.getElementById('recovery_login_href').addEventListener('click', showRecovery)
// document.getElementById('register_login_href').addEventListener('click', showRegister)
// document.getElementById('recovery_href').addEventListener('click', showRecovery)
// document.getElementById('register_href').addEventListener('click', showRegister)
// document.getElementById('login_href').addEventListener('click', showLogin)
// document.getElementById('register_recovery_href').addEventListener('click', showRegister)
var tabContainers = [
    '#page__tabs',
];

tabContainers.forEach(function (classContainer) {
    var jsTriggers = document.querySelectorAll(classContainer + ' .js-tab-trigger');
    jsTriggers.forEach(function(item, i) {
        item.addEventListener('click', function() {
            var tabName = this.dataset.tab,
                tabContent = document.querySelector(classContainer + ' .js-tab-content[data-tab="'+tabName+'"]');

            document.querySelectorAll(classContainer + ' .js-tab-content.active').forEach(function(item, i){
                item.classList.remove('active');
            });

            document.querySelectorAll(classContainer + ' .js-tab-trigger.active').forEach(function(item, i){
                item.classList.remove('active');
            });

            tabContent.classList.add('active');
            this.classList.add('active');
        });
    })
})

var hoverContainers = [
    '#menu__tabs'
];


hoverContainers.forEach(function (classContainer) {
    var jsTriggers = document.querySelectorAll(classContainer + ' .js-tab-trigger');
    jsTriggers.forEach(function(item, i) {
        item.addEventListener('mouseenter', function() {
            var tabName = this.dataset.tab,
                tabContent = document.querySelector(classContainer + ' .js-tab-content[data-tab="'+tabName+'"]');

            document.querySelectorAll(classContainer + ' .js-tab-content.active').forEach(function(item, i){
                item.classList.remove('active');
            });

            document.querySelectorAll(classContainer + ' .js-tab-trigger.active').forEach(function(item, i){
                item.classList.remove('active');
            });

            tabContent.classList.add('active');
            this.classList.add('active');
        });
    })
})
var acc = document.getElementsByClassName("game-container");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}

/* Called whenever bracket is modified
 *
 * data:     changed bracket object in format given to init
 * userData: optional data given when bracket is created.
 */
function saveFn(data, userData) {
    var json = jQuery.toJSON(data)
    $('#saveOutput').text('POST '+userData+' '+json)

    // jQuery.ajax("rest/"+userData, {contentType: 'application/json',
    //                               dataType: 'json',
    //                               type: 'post',
    //                               data: json})

}

$(function() {
    const url = new URLSearchParams(window.location.search)
    const id = url.get('id')
    fetch(`https://unstop.gg/tournament/api?tournamentId=${id}`)
        .then(res => res.json())
        .then(data => {
            var resizeParameters = {
                teamWidth: 200,
                scoreWidth: 50,
                matchMargin: 120,
                roundMargin: 100,
                // disableToolbar:true,
                // disableTeamEdit:true,
                init: data
            };

            function updateResizeDemo() {
                $('.tournament').bracket(resizeParameters);
            }

            $(updateResizeDemo)
        })
        .catch(console.error)
    // var container = $('.tournament')
    // container.bracket({
    //     init: saveData,
    //     save: saveFn,
    //     userData: `http://unstop.gg/tournament/start?tournamentId=${id}`})

    /* You can also inquiry the current data */
    // var data = container.bracket('data')
    // $('#dataOutput').text(JSON.stringify(data))
})

function initRegisterTournament() {
    const btn = $('#tournament-button');
    let isPending = false;
    const url = new URLSearchParams(window.location.search)
    const id = url.get('id')
    btn.on('click', function () {
        if (isPending) return;
        isPending = true;
        fetch(`https://unstop.gg/tournament/registration?tournamentId=${id}`)
    .then(()=>document.location.reload())
            .catch(console.error)
            .finally(() => isPending = false)
    });
}

initRegisterTournament()


$(document).ready(
    function () {
        $("#list").niceScroll();
    }
)

const gameRating = document.getElementById('game-rating');
const game = document.getElementById('game');
const selection = gameRating.querySelector('select');
const lists = gameRating.querySelectorAll('.dropdownlist');

selection.addEventListener('change', () => {
    const id = selection.options[selection.selectedIndex].value;
    Array.from(lists).forEach((list) => list.classList.add('shadow'))
    const target = gameRating.querySelector('#'+id);
    target.classList.remove('shadow');
});


/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    document.getElementById("myDropdown2").classList.toggle("show");
}
function myFunction2() {
    document.getElementById("myDropdown3").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}


const login_form = document.getElementById('login');
const register_form = document.getElementById('register');
const recovery_form = document.getElementById('recovery');

function showLogin(event){
    event.preventDefault()
    register_form.classList.add('shadow')
    recovery_form.classList.add('shadow')
    login_form.classList.remove('shadow')
}

function showRegister(event){
    event.preventDefault()
    register_form.classList.remove('shadow')
    recovery_form.classList.add('shadow')
    login_form.classList.add('shadow')
}

function showRecovery(event){
    event.preventDefault()
    register_form.classList.add('shadow')
    recovery_form.classList.remove('shadow')
    login_form.classList.add('shadow')
}

document.getElementById('recovery_login_href').addEventListener('click', showRecovery)
document.getElementById('register_login_href').addEventListener('click', showRegister)
document.getElementById('recovery_href').addEventListener('click', showRecovery)
document.getElementById('register_href').addEventListener('click', showRegister)
document.getElementById('login_href').addEventListener('click', showLogin)
document.getElementById('register_recovery_href').addEventListener('click', showRegister)

function testWebP(callback) {

    var webP = new Image();
    webP.onload = webP.onerror = function () {
        callback(webP.height == 2);
    };
    webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
}

testWebP(function (support) {

    if (support == true) {
        document.querySelector('body').classList.add('webp');
    }else{
        document.querySelector('body').classList.add('no-webp');
    }
})

// $.fn.isInViewport = function(offset = 0) {
//     var elementTop = $(this).offset().top;
//     var elementBottom = elementTop + $(this).outerHeight();
//     var viewportTop = $(window).scrollTop();
//     var viewportBottom = viewportTop + $(window).height();
//     return (elementBottom + offset) > viewportTop && (elementTop + offset) < viewportBottom;
// };
//
// let is_numb_start_triggered = false
//
// $(document).scroll(function() {
//     if (!is_numb_start_triggered && $('.percent ').isInViewport()) {
//         is_numb_start_triggered = true
//
//         var numb_start = $(".percent_table_figures").text(); // Получаем начальное число
//
//         $({numberValue: numb_start}).animate({numberValue: 100}, {
//
//             duration: 900, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд
//             easing: "linear",
//
//             step: function(val) {
//
//                 $(".percent_table_figures").html(Math.ceil(val)); // Блок, где необходимо сделать анимацию
//
//             }
//
//         });
//
//
//         var numb_start = $(".second").text(); // Получаем начальное число
//
//         $({numberValue: numb_start}).animate({numberValue: 40}, {
//
//             duration: 900, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд
//             easing: "linear",
//
//             step: function(val) {
//
//                 $(".second").html(Math.ceil(val)); // Блок, где необходимо сделать анимацию
//
//             }
//
//         });
//
//
//         $({numberValue: numb_start}).animate({numberValue: 30}, {
//
//             duration: 900, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд
//             easing: "linear",
//
//             step: function(val) {
//
//                 $(".three").html(Math.ceil(val)); // Блок, где необходимо сделать анимацию
//
//             }
//
//         });
//     }
//
// });












