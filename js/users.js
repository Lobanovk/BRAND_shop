
function registration() {
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
        console.log("It's Ok");
      }
    })
}