function signup() {
    document.getElementById('signup').classList.remove('hidden');
    document.getElementById('login').classList.add('hidden');
}

function login() {
    document.getElementById('signup').classList.add('hidden');
    document.getElementById('login').classList.remove('hidden');
}

function openMenu() {
    document.getElementById('burgerMenu').classList.remove('hidden');
    document.getElementById('iconMenu').classList.add('hidden');
}

function toggleMenu() {
    document.getElementById('burgerMenu').classList.add('hidden');
    document.getElementById('iconMenu').classList.remove('hidden');
}

function openPopup() {
    document.getElementById('popup').classList.remove('hidden');
}

function closePopup() {
    document.getElementById('popup').classList.add('hidden');
}

window.onclick = function (event) {
    var popup = document.getElementById("popup");         
     
    if (event.target == popup) {
        popup.classList.add('hidden');
    }
   
};

