document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.querySelector('[type="password"]');
    const form = document.querySelector('form');
    const criteria = {
        lowercase: /[a-z]/,
        uppercase: /[A-Z]/,
        number: /[0-9]/,
        special: /[\W_]/,
        minLength: value => value.length >= 6
    };

    function updateCriteriaDisplay() {
        const value = passwordInput.value;
        let allValid = true;
        Object.keys(criteria).forEach(key => {
            let isValid = typeof criteria[key] === 'function' ? criteria[key](value) : criteria[key].test(value);
            let elements = document.querySelectorAll(`[data-criteria="${key}"]`);
            elements.forEach(el => {
                el.classList.remove('marker:text-red-500', 'marker:text-green-500');
                el.classList.add(`marker:text-${isValid ? 'green-500' : 'red-500'}`);
            });
            allValid = allValid && isValid;
        });
        return allValid;
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (updateCriteriaDisplay()) {
            form.submit(); // Form is valid, submit it
        } else {
            iziToast.error({
                title: 'Error',
                message: 'Please correct the errors in your password before submitting.',
                position: 'topCenter',
                timeout: 3000
            });
        }
    });

    passwordInput.addEventListener('input', updateCriteriaDisplay);
});
