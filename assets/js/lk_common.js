$(function () {


     function simpleTabs(nav, content) {
        var nav = $(nav);
        var content = $(content);
        //nav.children(":first-child").addClass("active");
        //content.children(":first-child").addClass("active");
        nav.on("click", ">", function () {
            var _this = $(this);
            _this.addClass("active").siblings().removeClass("active");
            content.children().eq(_this.index()).addClass("active").siblings().removeClass("active");
        });
    }

    simpleTabs(".auth_page__login_user__tabs__header", ".auth_page__login_user__tabs__content");

     $(document).on('click', '.fn_trigger_pass', function () {
         $('.fn_pass_toggle').toggleClass('hidden');
     });

    $(document).on('keyup', '.fn_check_pass', function () {
        var pass = $('input[name=password]').val();
        var pass_check = $('input[name=password_check]').val();

        if (pass == pass_check) {
            $('.fn_save_wrap').fadeIn(500);
            $('.fn_error_wrap').fadeOut(500);
        } else {
            $('.fn_save_wrap').fadeOut(500);
            $('.fn_error_wrap').fadeIn(500);
        }
    });

    $(document).on('click', '.fn_change_pass', function () {

        var user_data = {
            'action': 'changePass',
            'pass': $('input[name=password]').val()
        }

        $.ajax({
            url: theme_ajax.url,
            type: 'POST',
            dataType: "json",
            data: user_data,
            success: function (data) {
                if(data.success) {
                    toastr.success('Пароль изменен');
                } else {
                    toastr.error('Что то пошло не так');
                }
            },
            error: function (data) {
                toastr.error('Что то пошло не так');
            }
        });
    });


});