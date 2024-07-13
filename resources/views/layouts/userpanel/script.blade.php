
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
   function recaptchaCallback() {
       document.getElementById('submit-btn').disabled = false;
   }

   document.getElementById('login-form').addEventListener('submit', function(event) {
       if (grecaptcha.getResponse() === "") {
           event.preventDefault();
           alert("Please complete the reCAPTCHA.");
       }
   });
</script>
