function validate(options) {

    function getParent(element, selector) {
        while(element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        } 
    }

    var selectorRules = {};

    function validateForm(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroup).querySelector(options.errorSelector);
        var errorMessage;
        // lấy ra các rule của selector
        var rules = selectorRules[rule.selector];
        // lặp qua các rule & kiểm tra 
        // nếu có loiix dừng ktra
        for(var i = 0; i < rules.length; ++i) {
            switch(inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if(errorMessage) break;
        }

        if(errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroup).classList.add('invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, options.formGroup).classList.remove('invalid');
        }
       return !errorMessage;


    }

    var formElement = document.querySelector(options.form);
    if(formElement) {
        // ngăn hành vi mặc định
        formElement.onsubmit = function(e) {
            e.preventDefault(); 

            var isFormValid = true;
            // lặp qua rule validate
            options.rules.forEach(rule => {
               var inputElement = formElement.querySelector(rule.selector);
               var isValid = validateForm(inputElement, rule);
               if(!isValid) {
                isFormValid = false;
               }
            });

            if(isFormValid) {
                if(typeof options.onSubmit === 'function') {
                    options.onSubmit(formValues);
                }
            } 

        }
        // xửu lí lặp ưua mỗi rule lắng nghe sự kiện
        options.rules.forEach(rule => {

            // lưu lại các rule 
            if(Array.isArray( selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test); 
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(inputElement => {
                if(inputElement) {
                    inputElement.onblur = function() {
                        validateForm(inputElement, rule);
                    }
                    inputElement.oninput = function() {
                        validateForm(inputElement, rule);
                    }
                }
            });

           
        });
        
    }

}

validate.isRequired = function(selector,errorText) {
    return {
        selector: selector,
        test: function(value) {
            return value ? undefined : errorText || 'Không được bỏ trống'
        }
    }
}




