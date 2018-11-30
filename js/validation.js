const validationMethods = {

  /**
   * Метод проверки поля имя на буквенные символы
   * @param {HTMLInputElement} field поле, для проверки
   * @returns {string/null} Строку с ошибкой или null, если ошибки не было
   */
  validName(field) {
    const reg = /(^[A-Z]{1}[a-z]+$)|(^[А-ЯЁ]{1}[a-яё]+$)/;
    let message = null;
    if (!reg.test($(field).val())) {
      message = 'Use only letters';
    }
    return message;
  },
  /**
   * Метод для проверки совпадения паролей
   * @param {HTMLInputElement} field поле, для проверки
   * @param {Array} args Массив с аргументами
   * @returns {string/null} Строку с ошибкой или null, если ошибки не было
   */
  fieldsCompare(field, args) {
    return $(field).val() !== $(args[0]).val()
      ? 'Fields do not match'
      : null;
  },
  /**
   * Метод для проверки длины поля
   * @param {HTMLInputElement} field поле, для проверки
   * @param {Array} args Массив с аргументами
   * @returns {string/null} Строку с ошибкой или null, если ошибки не было
   */
  validLength(field, args) {
    const valLength = $(field).val().length,
      sign = args[0],
      then = args[1];

    let message = null;
    switch (sign) {
      case '>':
        if (!(valLength > then)) {
          message = 'Minimum field length: ' + (then + 1);
        }
        break;
      case '<':
        if (!(valLength < then)) {
          message = 'Maximum field length: ' + (then - 1);
        }
        break;
      case '>=':
        if (!(valLength >= then)) {
          message = 'Minimum field length: ' + then;
        }
        break;
      case '<=':
        if (!(valLength <= then)) {
          message = 'Maximum field length: ' + then;
        }
        break;
      case '==':
        if (valLength !== then) {
          message = 'The field length must be equal: ' + then + 'characters';
        }
        break;

    }

    return message;

  },
  /**
   *Метод для проверки поля email
   * @param {HTMLInputElement} field поле, для проверки
   * @returns {string/null} Строку с ошибкой или null, если ошибки не было
   */
  validEmail(field) {
    const reg = /^((\w+)|(\w+([\.\-])\w+))@[a-zA-Z]+\.[a-z]{2,6}/;
    if (!reg.test($(field).val())) {
      return "Wrong email";
    }
    return null;
  },
  /**
   *Метод для проверки поля кредитной карты
   * @param {HTMLInputElement} field поле, для проверки
   * @returns {string/null} Строку с ошибкой или null, если ошибки не было
   */
  validCreditCard(field) {
    const reg = /^\d{4,7}-\d{4}-\d{4,6}-\d{3,4}$/;
    if (!reg.test($(field).val())) {
      return "Enter a valid card number";
    }
    return null;
  },

  /**
   *Метод для проверки поля отзыва
   * @param {HTMLInputElement} field поле, для проверки
   * @returns {string/null} Строку с ошибкой или null, если ошибки не было
   */
  validMessage(field) {
    const reg = /\w+/;
    if (!reg.test($(field).val())) {
      return "Fill in the message field";
    }
    return null;
  }

};


const form = {
  rules: null,
  /**
   * Инициализация формы
   */
  init() {
    $('.email-password').on('submit', e => form.formSubmit(e));
    this.rules = [
      {
        selector: 'input[name="name"]',
        methods: [
          {name: 'validName'},
          {name: 'validLength', args: ['>', 1]},
        ],
      },
      {
        selector: 'input[name="email"]',
        methods: [{name: 'validEmail'}]
      },
      {
        selector: 'input[name="credit_card"]',
        methods: [{name: 'validCreditCard'}]
      },
      {
        selector: 'input[name="password"]',
        methods: [{name: 'validLength', args: ['>=', 8]}]
      },
      {
        selector: 'input[name="password_repeat"]',
        methods: [{name: 'fieldsCompare', args: ['input[name="password"]']}]
      },
    ]
  },
  /**
   * Метод, запускается перед отправкой
   * @param e
   */
  formSubmit(e) {
    if (!this.validate()) {
      e.preventDefault();
    } else {
      user.registration();
    }
  },
  /**
   * Валидирует форму.
   * rules {Array} правила, по которым происходит валидация,по умолчанию правила валидации обьекта form
   */
  validate(rules = this.rules) {
    let isValid = true;
    for (let rule of rules) {
      for (let method of rule.methods) {
        const validFunction = validationMethods[method.name];
        const errMessage = validFunction($(rule.selector), method.args);
        if (errMessage) {
          this.setInvalidField($(rule.selector), errMessage);
          isValid = false;
          break;
        } else {
          this.setValidField($(rule.selector));
        }
      }
    }
    return isValid;
  },
  /**
   * Устанавливает класс ошибки валидации input и выводит сообщение ошибки
   * @param {HTMLInputElement} field поле, для установки класса
   * @param {string} message Сообщение об ошибки
   */
  setInvalidField(field, message) {
    $(field).removeClass('is-valid').addClass('is-invalid');

    if (!$(field).parent().find('.invalid-feedback').length) {
      $(field).after($('<div>', {
        text: message,
        class: 'invalid-feedback'
      }));
    }
  },
  /**
   * Устанавливает класс пройденной валидации
   * @param {HTMLInputElement} field поле, для установки класса
   */
  setValidField(field) {
    $(field).removeClass('is-invalid').addClass('is-valid');
    $(field).parent().find('.invalid-feedback').remove();
  },
};