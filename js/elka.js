/**
 * Created by aleks.kozhukhov on 19.09.2017.
 */

var pselect;
var scroll_el;
scroll_el='.full_w';
/*----------------------------------- Расписание -----------------*/
var rsp = [];

/*	rsp.r242016 = [1,1,0,0,1];
 rsp.r252016 = [0,0,0,0,0];
 rsp.r262016 = [0,0,0,0,1];
 rsp.r272016 = [1,0,0,0,0];
 rsp.r282016 = [1,1,0,0,0];
 rsp.r292016 = [0,1,1,0,0];
 rsp.r302016 = [0,0,1,1,0];
 rsp.r312016 = [0,0,1,1,0];

 rsp.r012017 = [1,1,0,0,1];
 rsp.r022017 = [1,1,1,1,1];
 rsp.r032017 = [1,1,0,0,1];
 rsp.r042017 = [1,1,0,0,1];
 rsp.r052017 = [1,1,0,0,1];
 rsp.r062017 = [1,1,0,0,1];
 rsp.r072017 = [1,1,1,0,1];
 rsp.r082017 = [1,1,1,0,1];
 */
/*---------------------------------------------------------рп2.*/
function f_chg_dt(e){
    /*	var pfield = $(e).parent().parent(); // область с которой работаем
     // проверка
     var m1 = pfield.find('#dayz :selected').val();
     var pt = pfield.find('#timez :selected').val();
     var tb = pfield.find('#typeb :selected').val();

     var f1 = rsp['r'+m1];
     var vas = pfield.find('#typeb').html();

     if (f1[0] == "1"){

     }
     if (f1[1] == "1"){

     }
     if (f1[2] == "1"){

     }
     if (f1[3] == "1"){

     }
     if (f1[4] == "1"){

     }*/

}
/*-------------------------------------------------------------*/
function window_resize(){
};

function f_sh_wrm(){
    $('.shd_frm').fadeIn();
    $('.mess1').fadeIn();
}

$(document).ready(function(){
    //$('.shd_frm').fadeIn();
    //$('.mess1').fadeIn();

    $('.gl_list li a').click(function(){
        var selimg = $(this).attr('href');
        $('.big_img').css('background-image','url('+selimg+')');
        return false; // выключаем стандартное действие
    });

    $('.main_menu a').click( function(){ // ловим клик по ссылке с классом go_to
        scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
            $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
            $('.pscroll').scrollTop(0);
        }
        return false; // выключаем стандартное действие
    });

    $('.main_menu_vert a').click( function(){ // ловим клик по ссылке с классом go_to
        scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
            $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
            $('.pscroll').scrollTop(0);
        }
        return false; // выключаем стандартное действие
    });

    $('.nopliz').click(function(){
        document.body.style.overflow = "hidden";
        $('.itsok, .mess1').fadeOut();
        $('.shd_frm').fadeIn();
        $('.get_tkt').fadeIn();
    });
    $('.np2').click(function(){
        document.body.style.overflow = "hidden";
        $('.itsok, .mess1').fadeOut();
        $('.shd_frm').fadeIn();
        $('.get_tkt').fadeIn();
    });
    $('.shd_frm').click(function(){
        document.body.style.overflow = "auto";
        $('.itsok, .mess1, .get_tkt').fadeOut();
        $('.shd_frm').fadeOut();

    });
    $('.get_tkt').click(function(evt){
        evt.stopPropagation();
    });
    $('.yespliz').click(function(){
        f_set_order();
    });
    //###################
    var newfrm = $('.frmPos').html();

    $('.addpz').click(function(){
        $('.addpz').before('<div class="dfrm frmPos" style="border-bottom:1px dotted #dadada; margin:10px 0;  overflow:hidden;">'+newfrm+'</div>');
    });

    $('.okbtn').click(function(){
        $('.itsok, .mess1').fadeOut();
        $('.shd_frm').fadeOut();

    });

    $('.noplz2').click(function(){
        yaCounter39603710.reachGoal('TIKETLAND1');
        location.href = 'https://www.ticketland.ru/koncertnye-zaly/gosudarstvennyy-kremlevskiy-dvorec/novogodnyaya-yolka-v-kremle/';

    });

});

function f_del(e){
    $(e).parent().parent().remove();
}


// функция для отправки формы
function f_set_order(){
    //сколько билетов?
    var count_pos = $('.frmPos').length;
    var iter = 0;
    var userdata = "";
    var ticket_opt = "";
    var topt_4all = "";
    var ticket_sum = 0;
    $('.frmPos').each(function(){
        ticket_opt = "&dayz"+iter+"="+$(this).find('#dayz :selected').val()+"&timez"+iter+"="+$(this).find('#timez :selected').val()+"&typeb"+iter+"="+$(this).find('#typeb :selected').val()+"&rx"+iter+"="+$(this).find('#rx').val();
        iter++;
        topt_4all = topt_4all + ticket_opt;
        ticket_sum = ticket_sum + parseInt($(this).find('#rx').val());
    });

    if (ticket_sum > 10) {

        userdata = "cpos="+count_pos+topt_4all+"&fam="+$('#fam').val() +"&nam="+$('#nam').val()+"&pronam="+$('#pronam').val()+"&email="+$('#email').val()+"&tel="+$('#tel').val()+"&org="+$('#org').val()+"&pagtype="+$('#pagtype :selected').val();

        var newXHR = new XMLHttpRequest();
        newXHR.open('POST', 'setorder.php');
        newXHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        newXHR.send(userdata);
        newXHR.onreadystatechange =  function() {
            if (newXHR.readyState == 4) {
                if(newXHR.status == 200) {
                    if (newXHR.responseText == "Ok!"){
                        yaCounter39603710.reachGoal('ORDER1');
                        f_ok();
                    } else { alert(newXHR.responseText) };
                }
            }
        };
    } else {
        alert("Количество билетов предзаказа не может быть меньше 10 штук!");
    }
}
//##################################################################################################################################################

function f_ok(){
    $('.get_tkt').fadeOut();
    $('.itsok').fadeIn();
    $('#fam').val("");
    $('#nam').val("");
    $('#pronam').val("");
    $('#email').val("");
    $('#tel').val("");
    $('#org').val("");
    document.body.style.overflow = "auto";
}