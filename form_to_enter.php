<style>
    :root{
  --form-height:550px;
  --form-width: 900px;
  /*  Sea Green */
  --left-color: #9fdeaf;
  /*  Light Blue  */
  --right-color: #96dbe2;
}

body, html{
  width: 100%;
  height: 100%;
  margin: 0;
  font-family: 'Helvetica Neue', sans-serif;
  letter-spacing: 0.5px;
}

.container{
  width: var(--form-width);
  height: var(--form-height);
  position: relative;
  margin: auto;
  box-shadow: 2px 10px 40px rgba(22,20,19,0.4);
  border-radius: 10px;
  margin-top: 50px;
}
/* 
----------------------
      Overlay
----------------------
*/
.overlay{
  width: 100%; 
  height: 100%;
  position: absolute;
  z-index: 100;
  background-image: linear-gradient(to right, var(--left-color), var(--right-color));
  border-radius: 10px;
  color: white;
  clip: rect(0, 385px, var(--form-height), 0);
}

.open-sign-up{
    animation: slideleft 1s linear forwards;
}

.open-sign-in{
    animation: slideright 1s linear forwards;
}

.overlay .sign-in, .overlay .sign-up{
  /*  Width is 385px - padding  */
  --padding: 50px;
  width: calc(385px - var(--padding) * 2);
  height: 100%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  padding: 0px var(--padding);
  text-align: center;
}

.overlay .sign-in{
  float: left;
}

.overlay-text-left-animation{
    animation: text-slide-in-left 1s linear;
}
.overlay-text-left-animation-out{
    animation: text-slide-out-left 1s linear;
}

.overlay .sign-up{
  float:right;
}

.overlay-text-right-animation{
    animation: text-slide-in-right 1s linear;
}

.overlay-text-right-animation-out{
    animation: text-slide-out-right 1s linear;
}


.overlay h1{
  margin: 0px 5px;
  font-size: 2.1rem;
}

.overlay p{
  margin: 20px 0px 30px;
  font-weight: 200;
}
/* 
------------------------
      Buttons
------------------------
*/
.switch-button, .control-button{
  cursor: pointer;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 140px;
  height: 40px;
  font-size: 14px;
  text-transform: uppercase;
  background: none;
  border-radius: 20px;
  color: white;
}

.switch-button{
  border: 2px solid;
}

.control-button{
  border: none;
  margin-top: 15px;
}

.switch-button:focus, .control-button:focus{
  outline:none;
}

.control-button.up{
  background-color: var(--left-color);
}

.control-button.in{
  background-color: var(--right-color);
}

/* 
--------------------------
      Forms
--------------------------
*/
.form{
  width: 100%; 
  height: 100%;
  position: absolute;
  border-radius: 10px;
}

.form .sign-in, .form .sign-up{
  --padding: 50px;
  position:absolute;
    /*  Width is 100% - 385px - padding  */
  width: calc(var(--form-width) - 385px - var(--padding) * 2);
  height: 100%;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center;
  padding: 0px var(--padding);
  text-align: center;
}

/* Sign in is initially not displayed */
.form .sign-in{
  display: none;
}

.form .sign-in{
  left:0;
}

.form .sign-up{
  right: 0;
}

.form-right-slide-in{
  animation: form-slide-in-right 0.5s;
}

.form-right-slide-out{
  animation: form-slide-out-right 0.5s;
}

.form-left-slide-in{
  animation: form-slide-in-left 0.5s;
}

.form-left-slide-out{
  animation: form-slide-out-left 0.5s;
}

.form .sign-in h1{
  color: var(--right-color);
  margin: 0;
}

.form .sign-up h1{
  color: var(--left-color);
  margin: 0;
}

.social-media-buttons{
  display: flex;
  justify-content: center;
  width: 100%;
  margin: 15px;
}

.social-media-buttons .icon{
  width: 40px;
  height: 40px;
  border: 1px solid #dadada;
  border-radius: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 10px 7px;
}

.small{
  font-size: 13px;
  color: grey;
  font-weight: 200;
  margin: 5px;
}

.social-media-buttons .icon svg{
  width: 25px;
  height: 25px;
}

#sign-in-form input, #sign-up-form input{
  margin: 12px;
  font-size: 14px;
  padding: 15px;
  width: 260px;
  font-weight: 300;
  border: none;
  background-color: #e4e4e494;
  font-family: 'Helvetica Neue', sans-serif;
  letter-spacing: 1.5px;
  padding-left: 20px;
}

#sign-in-form input::placeholder{
  letter-spacing: 1px;
}

.forgot-password{
  font-size: 12px;
  display: inline-block;
  border-bottom: 2px solid #efebeb;
  padding-bottom: 3px;
}

.forgot-password:hover{
  cursor: pointer;
}

/* 
---------------------------
    Animation
---------------------------
*/
@keyframes slideright{
  0%{
    clip: rect(0, 385px, var(--form-height), 0);
  }
  30%{
        clip: rect(0, 480px, var(--form-height), 0);
  }
  /*  we want the width to be slightly larger here  */
  50%{
     clip: rect(0px, calc(var(--form-width) / 2 + 480px / 2), var(--form-height), calc(var(--form-width) / 2 - 480px / 2));
  }
  80%{
         clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 480px));
  }
  100%{
     clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 385px));
  }
}

@keyframes slideleft{
  100%{
    clip: rect(0, 385px, var(--form-height), 0);
  }
  70%{
        clip: rect(0, 480px, var(--form-height), 0);
  }
  /*  we want the width to be slightly larger here  */
  50%{
     clip: rect(0px, calc(var(--form-width) / 2 + 480px / 2), var(--form-height), calc(var(--form-width) / 2 - 480px / 2));
  }
  30%{
         clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 480px));
  }
  0%{
     clip: rect(0px, var(--form-width), var(--form-height), calc(var(--form-width) - 385px));
  }
}

@keyframes text-slide-in-left{
  0% {
    padding-left: 20px;
  }
  100% {
    padding-left: 50px;
  }
}

@keyframes text-slide-in-right{
  0% {
    padding-right: 20px;
  }
  100% {
    padding-right: 50px;
  }
}

@keyframes text-slide-out-left{
  0% {
    padding-left: 50px;
  }
  100% {
    padding-left: 20px;
  }
}

@keyframes text-slide-out-right{
  0% {
    padding-right: 50px;
  }
  100% {
    padding-right: 20px;
  }
}

@keyframes form-slide-in-right{
  0%{
    padding-right: 100px;
  }
  100%{
    padding-right: 50px;
  }
}

@keyframes form-slide-in-left{
  0%{
    padding-left: 100px;
  }
  100%{
    padding-left: 50px;
  }
}

@keyframes form-slide-out-right{
  0%{
    padding-right: 50px;
  }
  100%{
    padding-right: 80px;
  }
}

@keyframes form-slide-out-left{
  0%{
    padding-left: 50px;
  }
  100%{
    padding-left: 80px;
  }
}

</style>
<div class="container">
  <div class="overlay" id="overlay">
    <div class="sign-in" id="sign-in">
      <h1>Добро пожаловать!</h1>
      <p>Чтобы оставаться на связи с нами, пожалуйста, войдите, используя свои личные данные.</p>
      <button class="switch-button" id="slide-right-button">ВОЙТИ</button>
    </div>
    <div class="sign-up" id="sign-up">
      <h1>ПРИВЕТ, Коллега!</h1>
      <p>Введите свои личные данные</p>
      <button class="switch-button" id="slide-left-button">Авторизоваться</button>
    </div>
  </div>
  <div class="form">
    <div class="sign-in" id="sign-in-info">
      <h1>ВОЙТИ</h1>
      <!--<div class="social-media-buttons">
        <div class="icon">
          <svg viewBox="0 0 24 24">
            <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
        </svg>
        </div>
        <div class="icon">
        <svg viewBox="0 0 24 24">
            <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
        </svg>
        </div>
        <div class="icon">
        <svg viewBox="0 0 24 24">
          <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
        </svg>
        </div>
      </div>-->
      <p class="small">или используйте свою учетную запись электронной почты:</p>
      <form id="sign-in-form">      
        <input type="email" placeholder="почта"/>
        <input type="password" placeholder="пароль"/>
        
        <button class="control-button in">ВОЙТИ</button>
      </form>
    </div>
    <div class="sign-up" id="sign-up-info">
      <h1>Создать аккаунт</h1>
      <!--<div class="social-media-buttons">
        <div class="icon">
          <svg viewBox="0 0 24 24">
            <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
        </svg>
        </div>
        <div class="icon">
        <svg viewBox="0 0 24 24">
            <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
        </svg>
        </div>
        <div class="icon">
        <svg viewBox="0 0 24 24">
          <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
        </svg>
        </div>
      </div>-->
      <p class="small">или используйте свой адрес электронной почты для регистрации:</p>
      <form id="sign-up-form">
        <input type="text" placeholder="Имя"/>
        <input type="email" placeholder="Почта"/>
        <input type="password" placeholder="Пароль"/>
        <button class="control-button up">Авторизоваться</button>
      </form>
    </div>
  </div>
</div>
<script>
    var overlay = document.getElementById("overlay");

// Buttons to 'switch' the page
var openSignUpButton = document.getElementById("slide-left-button");
var openSignInButton = document.getElementById("slide-right-button");

// The sidebars
var leftText = document.getElementById("sign-in");
var rightText = document.getElementById("sign-up");

// The forms
var accountForm = document.getElementById("sign-in-info")
var signinForm = document.getElementById("sign-up-info");

// Open the Sign Up page
openSignUp = () =>{
  // Remove classes so that animations can restart on the next 'switch'
  leftText.classList.remove("overlay-text-left-animation-out");
  overlay.classList.remove("open-sign-in");
  rightText.classList.remove("overlay-text-right-animation");
  // Add classes for animations
  accountForm.className += " form-left-slide-out"
  rightText.className += " overlay-text-right-animation-out";
  overlay.className += " open-sign-up";
  leftText.className += " overlay-text-left-animation";
  // hide the sign up form once it is out of view
  setTimeout(function(){
    accountForm.classList.remove("form-left-slide-in");
    accountForm.style.display = "none";
    accountForm.classList.remove("form-left-slide-out");
  }, 700);
  // display the sign in form once the overlay begins moving right
  setTimeout(function(){
    signinForm.style.display = "flex";
    signinForm.classList += " form-right-slide-in";
  }, 200);
}

// Open the Sign In page
openSignIn = () =>{
  // Remove classes so that animations can restart on the next 'switch'
  leftText.classList.remove("overlay-text-left-animation");
  overlay.classList.remove("open-sign-up");
  rightText.classList.remove("overlay-text-right-animation-out");
  // Add classes for animations
  signinForm.classList += " form-right-slide-out";
  leftText.className += " overlay-text-left-animation-out";
  overlay.className += " open-sign-in";
  rightText.className += " overlay-text-right-animation";
  // hide the sign in form once it is out of view
  setTimeout(function(){
    signinForm.classList.remove("form-right-slide-in")
    signinForm.style.display = "none";
    signinForm.classList.remove("form-right-slide-out")
  },700);
  // display the sign up form once the overlay begins moving left
  setTimeout(function(){
    accountForm.style.display = "flex";
    accountForm.classList += " form-left-slide-in";
  },200);
}

// When a 'switch' button is pressed, switch page
openSignUpButton.addEventListener("click", openSignUp, false);
openSignInButton.addEventListener("click", openSignIn, false);
</script>