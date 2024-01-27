//-------------------------------------------------AUTHOR------------------------------------------------

// Add wiki
function openPopup() {
    document.getElementById('popup').classList.remove('hidden');
}

function closePopup() {
    document.getElementById('popup').classList.add('hidden');
}
//  update image popup 
function updateImage(id) {
    document.getElementById('popupUpdateImage' + id).classList.remove('hidden');
}
function closeUpdateImage(){
    document.getElementById('popupUpdateImage').classList.add('hidden');
}


//  update wiki popup 
function updateWiki(id) {
    document.getElementById('popupUpdateWiki' + id).classList.remove('hidden');
}

function closeUpdateWiki(id){
    document.getElementById('popupUpdateWiki' + id).classList.add('hidden');
}

//  delete wiki 
function DeleteWiki(id) {
    document.getElementById('popupDeleteWiki' + id).classList.remove('hidden');
} 
function closeDeleteWiki(id){
    document.getElementById('popupDeleteWiki' + id).classList.add('hidden');
}