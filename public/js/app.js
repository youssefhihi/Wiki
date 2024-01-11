

//-------------------------------------------ADMIN-----------------------------------------
// Open the archive wiki 
function openArchiveWiki(id) {
    document.getElementById(`popupArchiveWiki${id}`).classList.remove('hidden');
}


function closeArchiveWiki(){
    document.getElementById('popupArchiveWiki').classList.add('hidden');
}

//  add category popup
function AddCategory() {
    document.getElementById('popupCategory').classList.remove('hidden');
}

function closeCategory(){
    document.getElementById('popupCategory').classList.add('hidden');
}

// delete category 
function DeleteCategory(id) {
    document.getElementById(`popupDeleteCategory${id}`).classList.remove('hidden');
}

function closeDeleteCategory(){
    document.getElementById('popupDeleteCategory').classList.add('hidden');
}

//   update category 
function UpdateCategory(id) {
    document.getElementById(`popupUpdateCategory${id}`).classList.remove('hidden');
}

function closeUpdateCategory(){
    document.getElementById('popupUpdateCategory').classList.add('hidden');
}


//-------------------------------------------------REGISTER-----------------------------------
// Show the signup form and hide the login form
function signup() {
    document.getElementById('signup').classList.remove('hidden');
    document.getElementById('login').classList.add('hidden');
}

// Show the login form and hide the signup form
function login() {
    document.getElementById('signup').classList.add('hidden');
    document.getElementById('login').classList.remove('hidden');
}

// Open the burger menu and hide the menu icon
function openMenu() {
    document.getElementById('burgerMenu').classList.remove('hidden');
    document.getElementById('iconMenu').classList.add('hidden');
}
//-------------------------------------------------BURGER MENU-------------------------------------------------
// Toggle the burger menu and 
function toggleMenu() {
    document.getElementById('burgerMenu').classList.add('hidden');
    document.getElementById('iconMenu').classList.remove('hidden');
}



// Close the generic popup if clicked outside of it
window.onclick = function (event) {
    var popup = document.getElementById("popup");         
    if (event.target == popup) {
        popup.classList.add('hidden');
    }
};
