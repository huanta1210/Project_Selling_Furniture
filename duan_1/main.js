function Validate(formSelector) {

    function getParent(element, selector) {
        while (element.parentElement.matches(selector)) {
            return element.parentElement;
        }
        element = element.parentElement;
    }

    var formRules = {};
    var validatorRules = {
        required: function (value) {
            return value ? undefined : 'Vui lòng nhập trường này';
        },
        email: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'Vui lòng nhập đúng định dạng email';
        },
        min: function (min) {
            return function (value) {
                return value.length >= min ? undefined : `Mật khẩu ít nhất ${min} kí tự`;

            }
        }
    };
    //Lấy element trong dom
    var formElement = document.querySelector(formSelector);
    // xử lí khi element chạy
    if (formElement) {
        var inputs = formElement.querySelectorAll('[name][rules]');

        for (var input of inputs) {

            var rules = input.getAttribute('rules').split('|');

            for (var rule of rules) {

                var isRuleHasValue = rule.includes(':');

                var ruleInfo;
                if (isRuleHasValue) {
                    ruleInfo = rule.split(':');

                    rule = ruleInfo[0];

                }
                var ruleFunction = validatorRules[rule];
                if (isRuleHasValue) {
                    ruleFunction = ruleFunction(ruleInfo[1])
                }

                if (Array.isArray(formRules[input.name])) {
                    formRules[input.name].push(ruleFunction)

                } else {
                    formRules[input.name] = [ruleFunction];
                }
            }

            // lắng nghe sự kiện
            input.onblur = handerValidate;
            input.oninput = handerClearInput;

        }
        function handerValidate(e) {
            var rules = formRules[e.target.name];
            var errorMessage;
            rules.some(function (rule) {
                errorMessage = rule(e.target.value);
                return errorMessage;
            });
            //Nếu có lỗi báo đỏ 
            if (errorMessage) {
                var formGroup = getParent(e.target, '.form-group');

                if (!formGroup) return;

                if (formGroup) {
                    var formMessage = formGroup.querySelector('.form-message');
                    if (formMessage) {
                        formMessage.innerText = errorMessage;
                        formGroup.classList.add('invalid');
                    }
                }
            }
            return !errorMessage;

        }

        function handerClearInput(e) {
            var formGroup = getParent(e.target, '.form-group');
            if (formGroup.classList.contains('invalid')) {
                var formMessage = formGroup.querySelector('.form-message');
                if (formMessage) {
                    formMessage.innerText = '';
                    formGroup.classList.remove('invalid');
                }
            }
        }

    }

    // xử lí hành vi sunbmit
    formElement.onsubmit = function (e) {
        e.preventDefault();
        var inputs = formElement.querySelectorAll('[name][rules]');
        var isValid = true;
        for (var input of inputs) {
            if (!handerValidate({ target: input })) {
                isValid = false;
            }
        }
        // kh ikhoong có lỗi submitform
        if (isValid) {
            alert('Đăng ký thành công');
        }
    }
}

// đếm số lượng
// thêm sự kiên click cho nút cộng
const addButton = document.querySelector('.add-btn');
const subtractButton = document.querySelector('.apart-btn');
const quantityInput = document.getElementById('quantity');

addButton.addEventListener('click', () => {
    let currentValue = parseInt(quantityInput.value, 10);
    currentValue++;
    quantityInput.value = currentValue;
});

// Thêm sự kiện click cho nút trừ
subtractButton.addEventListener('click', () => {
    currentValue = parseInt(quantityInput.value, 10);
    if (currentValue > 1) {
        currentValue--;
        quantityInput.value = currentValue;
    }
});
// đổi chữ khi chọn màu

function changeColor(color) {
    const colorText = document.querySelector('.color-text');
    colorText.style.color = color;
    colorText.innerHTML = color;
}
// tính tiền

