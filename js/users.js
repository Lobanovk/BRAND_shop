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
      success: function (success) {
        console.log('Good');
      }
    })
  },

  goToRegistred(){
    if ( $('[name=a]:checked').val() === 'register'){
      $(location).attr('href', 'http://localhost:63342/Shop%20Brand%20coursework/check_in.html?_ijt=vnpohfapueo5f6pre8r8cj7cqu');
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
      if (!isValid){
        e.preventDefault();
        console.log('Fail');
      } else {
        console.log('Good');
      }
    });
  },
  /**
   * Проверяет на совпадение email и password
   * @returns {boolean} isValid Флаг, который показывает прошла проверка или нет
   */
  validate(flag) {
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
              flag(true);
            }
          }
          flag(false);
        });
      }
    });
  },
};

//   init() {
//     $('.email-password').on('submit', e => user.autorizUser(e));
//   },
//   /**
//    * Событие для проверки полей ввода
//    */
//   autorizUser(e) {
//     user.validate();
//     console.log(localStorage.getItem('userId'));
//     if (!localStorage.getItem('userId')) {
//       e.preventDefault();
//       console.log('Fail');
//     } else {
//       console.log('Good');
//     }
//   },
//
//   /**
//    * Проверяет на совпадение email и password
//    */
//   validate() {
//     localStorage.clear();
//     let userLogIn = {
//       email: $('[name = "email"]').val(),
//       password: $('[name = "password"]').val()
//     };
//     $.ajax({
//       url: 'http://localhost:3000/users',
//       type: 'GET',
//       success: function (users) {
//         console.log(users);
//         users.forEach(function (user) {
//           if (user.email === userLogIn.email) {
//             if (user.password === userLogIn.password) {
//               localStorage.setItem('userId', user.id);
//             }
//           }
//         });
//       }
//     });
//   },
// };


