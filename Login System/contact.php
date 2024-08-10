<?php 
    include_once 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/2788e3bd7f.js" crossorigin="anonymous"></script>
</head>
<body>
<form action="contact.msg.php" method="post">

        <div class="input-group">
          <label>Name</label>
          <input type="text" placeholder="Enter your name" id="name" name="usersName">
          <span id="name-error"></span>
        </div>

        <div class="input-group">
          <label>Email</label>
          <input type="email" placeholder="Enter your Email" id="email" name="Email">
          <span id="email-error"></span>
        </div>

        <div class="input-group">
          <label>Your Message</label>
          <textarea rows="3" placeholder="Enter your message" id="message" name="UserMessage"></textarea>
          <span id="message-error"></span>
        </div>

        <button onclick="return validateForm()">SEND NOW</button>
        <span id="submit-error"></span>

      </form>

      <script>

            var nameError = document.getElementById("name-error") ;
            var emailError = document.getElementById("email-error") ;
            var messageError = document.getElementById("message-error") ;
            var submitError = document.getElementById("submit-error") ;

            function validateName() {
                var name = document.getElementById("name").value ;

                if (name.length == 0) {
                    nameError.innerHTML = 'Name is Required';
                    return false;
                }

                return true ;
            }

            function validateEmail() {
                var email = document.getElementById("email").value ;

                if (email.length == 0) {
                    emailError.innerHTML = 'Email is Required';
                    return false;    
                }

                if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
                    emailError.innerHTML = 'Email is Invalid';
                    return false ;
                }

                return true ;
            }

            function validateMessage() {
                var message = document.getElementById("message").value ;

                if (message.length == 0){
                    messageError.innerHTML = "Message is Required"
                    return false ;
                }

                return true ;

            }

            function validateForm() {
                if (!validateName() || !validateEmail() || !validateMessage()) {
                    event.preventDefault();   
                    submitError.style.display = 'block' ;
                    submitError.innerHTML = 'Fix Error Before Submit' ;

                    setTimeout(function () {
                        submitError.style.display = 'none' ;
                    }, 5000) ;

                    return false ;
                }
            }

      </script>
</body>
</html>