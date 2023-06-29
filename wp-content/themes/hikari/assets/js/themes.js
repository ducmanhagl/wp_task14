$(document).ready(function(){
    //slider ============================
    $('.js-slider').slick({
        infinite: true,
        arrows : false,
        speed: 800,
        fade: true,
        cssEase: 'linear',
        autoplay : true
    });

    //Tabs - Tabs Content ===============
    $('.c-tabs li').click(function(){
        var item = $(this);
        var showContent = item.data('content');
        var activeColor = item.data('color');

        item.addClass('active');
        item.css({
           'background-color' : activeColor,
           'border-top-color' : activeColor
        });

        $(".c-tabs li").not(item).removeClass("active");
        $(".c-tabs li").not(item).css("background-color","");

        $('#'+showContent).fadeIn();
        $('.c-listpost').not('#'+showContent).hide();
    });

});

// Lấy phần tử dựa trên class
var elements = document.getElementsByClassName('error');
// Kiểm tra và thay đổi nội dung của từng phần tử
for (var i = 0; i < elements.length; i++) {
    var element = elements[i];

    if (element.innerHTML === 'This is not in agreement.') {
        element.innerHTML = 'メールは同じではありません';
    }
}


var inputs = document.querySelectorAll("input[type='text");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", function (e) {
        if (e.target.value != '') {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'none';
            }
        } else {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'block';
            }
        }


    });
}

var inputs = document.querySelectorAll("input[type='email']");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", function (e) {
        if (e.target.value != '') {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'none';
            }
        } else {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'block';
            }
        }

        if (inputs[0].value !== inputs[1].value) {
            if (inputs[1].nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'block';
            }
        } else {
            if (inputs[1].nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'none';
            }
        }


    });
}


var inputs = document.querySelectorAll("textarea[name='message']");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", function (e) {
        if (e.target.value != '') {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'none';
            }
        } else {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'block';
            }
        }


    });
}


var inputs = document.querySelectorAll("input[name='tel']");
for (var i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("change", function (e) { 

        var phoneNumber = e.target.value;
        if (validateTelephone(phoneNumber)) {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'none';
            }
        } else {
            if (e.target.nextElementSibling.className == 'error') {
                e.target.nextElementSibling.style.display = 'block';
            }
        }
    })
}
var inputclick = document.querySelector(".c-btn.c-btn__reset");
inputclick.onclick = function(){
    var element = document.querySelectorAll("#mw_wp_form_mw-wp-form-182 form td input");
    var elementarea = document.querySelector("#mw_wp_form_mw-wp-form-182 form td textarea");
    for (var i = 0; i < element.length; i++) {
        element[i].defaultValue = ''
    }
    elementarea.innerHTML = ''
};