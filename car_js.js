document.addEventListener('DOMContentLoaded', function() {
    const pickupDate = document.getElementById('pickup-date');
    const returnDate = document.getElementById('return-date');
    const rentalDuration = document.getElementById('rental-duration');
    const submitBtn = document.getElementById('submitBtn');
    const errorMessage = document.getElementById('error-message');

    // Calculate rental duration in days
    function calculateRentalDuration() {
        const pickup = new Date(pickupDate.value);
        const returnDateValue = new Date(returnDate.value);

        if (pickup && returnDateValue && returnDateValue >= pickup) {
            const duration = Math.ceil((returnDateValue - pickup) / (1000 * 3600 * 24)); // Duration in days
            rentalDuration.value = duration + ' days';
        } else {
            rentalDuration.value = '';
        }
    }

    // Event listeners for date inputs
    pickupDate.addEventListener('change', calculateRentalDuration);
    returnDate.addEventListener('change', calculateRentalDuration);

    // Form submission validation
    submitBtn.addEventListener('click', function(e) {
        errorMessage.textContent = '';

        const fullName = document.getElementById('full-name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const carSelection = document.getElementById('car-selection').value;
        const terms = document.getElementById('terms').checked;

        if (!fullName || !email || !phone || !carSelection || !pickupDate.value || !returnDate.value || !terms) {
            errorMessage.textContent = 'Please fill in all required fields and accept the terms.';
            e.preventDefault(); // Prevent form submission
        }
    });
});
