// ------------------------------------Sign Up Form-----------------------------------------------
var form = document.getElementById('form');
var fullName = document.getElementById('username');
var email = document.getElementById('email');
var password = document.getElementById('password');
var repeatPassword = document.getElementById('confirmPassword');


// error messages variables

var FullNameInputHelp = document.getElementById('userNameRegex');
var EmailInputHelp = document.getElementById('emailRegex');
var PasswordInputHelp = document.getElementById('passwordRegex');
var ReapeatPasswordInputHelp = document.getElementById('confirmPasswordRegex');

// Regex values

const NameRegex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;

// Submit only after all values are correct function

form.addEventListener('submit', e => {
  e.preventDefault();
  var passwordValue = password.value;
  if(NameRegex.test(fullName.value) && EmailRegex.test(email.value) && PasswordRegex.test(passwordValue) && (passwordValue === repeatPassword.value)){
    form.submit();
  }
})

// Full Name Error Check

fullName.addEventListener('input', function(e) { 
  var currentValue = e.target.value;
  var valid = NameRegex.test(currentValue);

  if(!valid){
    FullNameInputHelp.style.display = 'block';
    fullName.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    FullNameInputHelp.style.display = 'none';
    fullName.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})

// Email Error Check

email.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailInputHelp.style.display = 'block';
    email.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    EmailInputHelp.style.display = 'none';
    email.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})

// Password Error Check

password.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordInputHelp.style.display = 'block';
    password.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    PasswordInputHelp.style.display = 'none';
    password.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})

// Password Repeat Match Check

repeatPassword.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var passwordValue = password.value;

  if(!(passwordValue === currentValue)){
    ReapeatPasswordInputHelp.style.display = 'block';
    repeatPassword.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    ReapeatPasswordInputHelp.style.display = 'none';
    repeatPassword.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})


// ------------------------------------Login Form-----------------------------------------------
// ------------------------------------Login Form-----------------------------------------------
var loginForm = document.getElementById('loginForm');
var loginEmail = document.getElementById('loginEmail');
var loginPassword = document.getElementById('loginPassword');

// error messages variables
var EmailLoginHelp = document.getElementById('emailLoginRegex');
var PasswordLoginHelp = document.getElementById('passwordLoginRegex');

// Login Form Submit function
loginForm.addEventListener('submit', e => {
  e.preventDefault();
  var passwordLoginValue = loginPassword.value;
  if(EmailRegex.test(loginEmail.value) && PasswordRegex.test(passwordLoginValue)){

  }
})

// Email Error Check for Login
loginEmail.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailLoginHelp.style.display = 'block';
    loginEmail.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    EmailLoginHelp.style.display = 'none';
    loginEmail.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})

// Password Error Check for Login
loginPassword.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordLoginHelp.style.display = 'block';
    loginPassword.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    PasswordLoginHelp.style.display = 'none';
    loginPassword.className = "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5";
  }
})
