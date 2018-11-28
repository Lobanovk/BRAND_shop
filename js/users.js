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
      url: 'http://localhost:3000/users',
      type: 'POST',
      data: {
        username: user.name,
        password: user.password,
        email: user.email,
        gender: user.gender,
        credit_card: user.credit_card,
      },
      success: function () {
      }
    })
  },

  /**
   * Проверяет на совпадение почты и пароля из метаданных
   */
  init() {
    $('.email-password').on('submit', e => user.autorizUser(e));
  },

  autorizUser(e) {
    if (!user.validate()) {
      e.preventDefault();
      console.log("Fail");
    } else {
      console.log("Good");
    }
  },

  validate() {
    let isValid = false;
    let userLogIn = {
      email: $('[name = "email"]').val(),
      password: $('[name = "password"]').val()
    };
    $.ajax({
      url: 'http://localhost:3000/users',
      type: 'GET',
      success: function (users) {
        console.log(users);
        users.forEach(function (user) {
          if (user.email === userLogIn.email) {
            if (user.password === userLogIn.password) {
              isValid = true;
            }
          }
        });
      }
    });
    return isValid;
  },
};


