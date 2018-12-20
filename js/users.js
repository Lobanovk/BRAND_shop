const user = {
    /**
     * Региструет нового пользователя
     */
    registration() {
        let user = {
            name: $('[name="name"]').val(),
            email: $('[name="email"]').val(),
            password: $('[name="password_repeat"]').val(),
            gender: $('[name=gender]:checked').val(),
            credit_card: $('[name="credit_card"]').val(),
        };

        $.ajax({
            url: 'php/registration.php',
            type: 'POST',
            data: {
                username: user.name,
                password: user.password,
                email: user.email,
                gender: user.gender,
                credit_card: user.credit_card,
            },
            success: function (success) {
                alert(success);
            }
        })
    },

    goToRegistred() {
        if ($('[name=a]:checked').val() === 'register') {
            $(location).attr('href', 'http://lesson6/shop/check_in.php');
        }
    },

    /**
     * Проверяет на совпадение почты и пароля из метаданных
     */
    init() {
        $('.email-password').on('submit', e => user.autorizUser(e));
        $('.check').on('click', '.button-text', function () {
            user.goToRegistred();
        });
    },
    /**
     * Событие для проверки полей ввода
     */
    autorizUser(e) {
        user.validate(function (isValid) {
            if (!isValid) {
                e.preventDefault();
            } else {
                $(location).attr('href', 'http://lesson6/shop/index.php');
            }
        });
    },
    /**
     * Проверяет на совпадение email и password
     */
    validate(flag) {
        let userLogIn = {
            email: $('[name = "email"]').val(),
            password: $('[name = "password"]').val()
        };
        $.ajax({
            url: 'php/sign_in.php',
            type: 'POST',
            data: {email: userLogIn.email, password: userLogIn.password},
            success: function (users) {
                if (users == 1) {
                    flag(true);
                } else
                    flag(false);
            }
        });
    },
};


