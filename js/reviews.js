const reviews = {
  rules: null,
  /**
   * Отправка отзыва по клику
   */
  sendReview() {
    $('.email-password').on('submit', e => reviews.formReview(e));
    this.rules = [
      {
        selector: 'input[name="name"]',
        methods: [
          {name: 'validName'},
          {name: 'validLength', args: ['>', 1]},
        ],
      },
      {
        selector: '[name="message"]',
        methods: [
          {name: 'validMessage'},
        ],
      },

    ]
  },
  /**
   * Метод, запускающийся перед отправкой
   * @param e
   */
  formReview(e) {
    if (!form.validate(this.rules)) {
      e.preventDefault();
    } else {
      this.addReview();
    }
  },
  /**
   * Добавление отзыва в db.json
   */
  addReview() {
    var review = {
      name: $('[name = "name"]').val(),
      message: $('[name="message"]').val(),
      approved: 0
    };
    $.ajax({
      url: 'http://localhost:3000/reviews',
      type: 'POST',
      data: {
        name: review.name,
        message: review.message,
        approved: review.approved
      },
      success: function () {
      }
    });
  }

};