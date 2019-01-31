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
      url: 'methods.php?page=registration',
      type: 'POST',
      data: {
        username: user.name,
        password: user.password,
        email: user.email,
        id_gender: user.gender,
        credit_card: user.credit_card,
      },
      success: function (success) {
        alert(success);
        if (success === 'Registration completed successfully!')
          $(location).attr('href', 'http://shop-brand/index.php?page=checkout');

      }
    })
  },

  getInfo() {
    $.ajax({
      url: 'methods.php?page=account&m=settings',
      type: 'POST',
      success: function (success) {
        let user = JSON.parse(success);
        $('[name="name"]').val(user.username);
        $('[name="email"]').val(user.email);
        $('[name="credit_card"]').val(user.credit_card);
        if($('[name=gender]').val() !== user.id_gender){
          $('[name=gender]').prop('checked', true);
        }
      }
    });
  },


  changeUser() {
    $('.email-password').on('submit', function () {

      let user = {
        name: $('[name="name"]').val(),
        email: $('[name="email"]').val(),
        gender: $('[name=gender]:checked').val(),
        credit_card: $('[name="credit_card"]').val(),
      };

      $.ajax({
        url: 'methods.php?page=account&m=update_info',
        type: 'POST',
        data: {
          username: user.name,
          email: user.email,
          id_gender: user.gender,
          credit_card: user.credit_card,
        },
        success: function (success) {
          alert(success);
        }
      });
    });
    // $.ajax({
    //   url: 'methods.php?page=account&m=update_info',
    //   type: 'POST',
    //   data: {
    //     username: user.name,
    //     email: user.email,
    //     id_gender: user.gender,
    //     credit_card: user.credit_card,
    //   },
    //   success: function (success) {
    //     alert(success);
    //   }
    // })
  },

  goToRegistred() {
    if ($('[name=a]:checked').val() === 'register') {
      $(location).attr('href', 'http://shop-brand/index.php?page=registration');
    }
  },

  /**
   * Проверяет на совпадение почты и пароля из метаданных
   */
  init() {
    $('.email-password').on('click', '.log-in', e => user.autorizUser(e));
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
        $(location).attr('href', 'http://shop-brand/index.php?page=account');
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
      url: 'methods.php?page=checkout',
      type: 'POST',
      data: {email: userLogIn.email, password: userLogIn.password},
      success: function (users) {
        // console.log(users);
        // alert(users);
        if (users == 1) {
          flag(true);
        } else
          flag(false);
      }
    });
  },

  getOrders(){
    $.ajax({
      url: 'methods.php?page=account',
      type: 'GET',
      success: function (success) {
        //alert(success);
        console.log(success);
        let orders = JSON.parse(success);
        $('.content-account-personal__orders').empty();
        orders.forEach(function (good) {
            $('<div>',{
              append: $('<p>',{
                text: 'Orders number ',
                append: $('<span>',{
                  class: 'orders-number',
                  text: good.id_cart + ':'
                }).add($('<span>',{
                  class: 'order-status',
                  text: good.status
                }))
              }).add($('<a>',{
                class: 'order-name',
                href: 'index.php?page=single-page&id_catalog='+good.id_catalog,
                text: 'Посмотреть товар ' + good.name
              }))
            }).appendTo('.content-account-personal__orders');
        })
      }
    })
  },
};


