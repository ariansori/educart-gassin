// js/checkout.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('submit-form');

    form.addEventListener('submit', function(event) {
        const emailInput = document.getElementById('email');
        const email = emailInput.value;
        
        if (!validateEmail(email)) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please provide a valid email address!'
            });
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});
