const validationMethods = {

    /**
     * Метод проверки поля имя на буквенные символы
     * @param {HTMLInputElement} field поле, для проверки
     * @returns {string/null} Строку с ошибкой или null, если ошибки не было
     */
    validName(field) {
        const reg = /(^[A-Z]{1}[a-z]+$)|(^[А-ЯЁ]{1}[a-яё]+$)/;
        let message = null;
        if (!reg.test(field.value)) {
            message = 'Используйте только буквы';
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
            ? 'Поля не совпадают'
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
                    message = 'Минимальная длинна поля: ' + (then + 1);
                }
                break;
            case '<':
                if (!(valLength < then)) {
                    message = 'Максимальная длинна поля: ' + (then - 1);
                }
                break;
            case '>=':
                if (!(valLength >= then)) {
                    message = 'Минимальная длинна поля: ' + then;
                }
                break;
            case '<=':
                if (!(valLength <= then)) {
                    message = 'Максимальная длинна поля: ' + then;
                }
                break;
            case '==':
                if (valLength !== then) {
                    message = 'Длинна поля должна равняться: ' + then + 'символам';
                }
                break;

        }


    },
    /**
     *Метод для проверки поля email
     * @param {HTMLInputElement} field поле, для проверки
     * @returns {string/null} Строку с ошибкой или null, если ошибки не было
     */
    validEmail(field) {
        const reg = /^((\w+)|(\w+([\.\-])\w+))@[a-zA-Z]+\.[a-z]{2,6}/;
        if (!reg.test(field.value)) {
            return "Неправильный email";
        }
        return null;
    },
    /**
     *Метод для проверки поля кредитной карты
     * @param {HTMLInputElement} field поле, для проверки
     * @returns {string/null} Строку с ошибкой или null, если ошибки не было
     */
    validCreditCard() {

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
                methods: [],
            }
        ]
    },
    /**
     * Метод, запускается перед отправкой
     * @param e
     */
    formSubmit(e) {
        if (!this.validate()) {
            e.preventDefault();
        }
    },
    /**
     * Валидирует форму.
     */
    validate() {

    },
};