<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        /* CSS for the red glow animation */
        .error-glow {
            animation: glow 0.2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px 0 red;
            }
            to {
                box-shadow: none;
            }
        }
      
     
    </style>
</head>
<body>
<div class="responsive-two-columns">
    <div>
        <!-- <img src="./image/wifi.png" alt="" class="rotate1" id="wifi3"> -->
        <img src="./image/DESIGN.png" class="img-fluid imghead">
    </div>
    <div>
        <div class="space-head"></div>
      
        <form action="submit.php" method="POST">
        <input class="form-control" type="text" name="store_name" placeholder="STORE NAME" aria-label="default input example">
        <div class="space"></div>
        <input class="form-control" type="text" name="promo_code" placeholder="PROMO CODE" aria-label="default input example">
        <div class="space"></div>
        <input class="form-control" type="text" name="full_name" placeholder="FULL NAME" aria-label="default input example">
        <div class="space"></div>
        <input class="form-control" type="text" name="last_4_digit" placeholder="LAST 4 DIGIT NUMBER" aria-label="default input example">
        <div class="space"></div>
        <button type="submit" class="btn-submit">
            <h2 style="background: none;">SUBMIT</h2>
        </button>
        </form>
        <div class="error-messages">
            
        </div>
    </div>
</div>



<script>
    const storeNameInput = document.querySelector('input[placeholder="STORE NAME"]');
    const promoCodeInput = document.querySelector('input[placeholder="PROMO CODE"]');
    const fullNameInput = document.querySelector('input[placeholder="FULL NAME"]');
    const last4DigitInput = document.querySelector('input[placeholder="LAST 4 DIGIT NUMBER"]');
    const submitButton = document.querySelector('.btn-submit');
    const errorMessagesDiv = document.querySelector('.error-messages');

    // Function to display error messages and add red glow
    function displayError(inputElement, errorMessage) {
        const errorSpan = document.createElement('span');
        errorSpan.className = 'error-message';
        errorSpan.innerHTML = errorMessage; // Use innerHTML to allow HTML tags
        errorMessagesDiv.appendChild(errorSpan);

        // Add the error-glow class to make the field glow red
        inputElement.classList.add('error-glow');
    }

    // Function to remove error messages and red glow
    function removeErrorMessages(inputElement) {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach((errorMessage) => {
            errorMessage.remove();
        });

        // Remove the error-glow class to stop the red glow
        inputElement.classList.remove('error-glow');
    }

    // Function to validate form data
    function validateForm() {
        // Remove any existing error messages and red glow
        removeErrorMessages(storeNameInput);
        removeErrorMessages(promoCodeInput);
        removeErrorMessages(fullNameInput);
        removeErrorMessages(last4DigitInput);

        let isValid = true;

        // Validate each field
        if (storeNameInput.value.trim() === '') {
            displayError(storeNameInput, 'Please enter a Store Name.<br>');
            isValid = false;
        }

        if (promoCodeInput.value.trim() === '') {
            displayError(promoCodeInput, 'Please enter a Promo Code.<br>');
            isValid = false;
        }

        if (fullNameInput.value.trim() === '') {
            displayError(fullNameInput, 'Please enter your Full Name.<br>');
            isValid = false;
        }

        const last4Digit = last4DigitInput.value.trim();
        if (last4Digit === '' || isNaN(last4Digit) || last4Digit.length !== 4) {
            displayError(last4DigitInput, 'Please enter a valid 4-digit number.<br>');
            isValid = false;
        }

        // If all validations pass, allow the form to submit
        return isValid;
    }

    // Add an event listener to the submit button
    submitButton.addEventListener('click', function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    // Add event listeners to remove error messages and red glow when typing or backspacing
    storeNameInput.addEventListener('input', () => removeErrorMessages(storeNameInput));
    promoCodeInput.addEventListener('input', () => removeErrorMessages(promoCodeInput));
    fullNameInput.addEventListener('input', () => removeErrorMessages(fullNameInput));
    last4DigitInput.addEventListener('input', () => removeErrorMessages(last4DigitInput));
</script>
</body>
</html>
