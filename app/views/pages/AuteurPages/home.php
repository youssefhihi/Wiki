<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>

<div class="max-w-2xl mx-auto h-10 flex rounded-2xl overflow-hidden">
    <input type="text" name="search" id="searchWiki" placeholder="Search for anything" class="flex-1 h-full px-4 bg-white focus:outline-none border-none">
    <div class="flex items-center justify-center h-full w-10 bg-white">
        <i class="fas fa-search text-gray-400" id="searchIcon"></i>
    </div>
</div>
<div id="searchresult" class=""></div>

<div class="flex  flex-col mx-auto max-w-xl mt-14 border border-gray-600 rounded-xl p-4 bg-gray-100 shadow-md">
    <p class="text-center text-2xl font-semibold text-gray-800">Explore the Newest Categories <i class="fas fa-fire text-yellow-500"></i></p>

    <div class="flex flex-wrap justify-center mt-4">
        <?php foreach ($data['lastcategory'] as $category) { ?>

            <button class="m-2 px-4 py-2 flex space-x-2 bg-gray-500 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:shadow-outline-teal active:bg-teal-800">
                <i class="fas fa-th-list pt-1"></i>
                <P><?php echo $category->getCategoryName(); ?></P>
            </button>
        <?php } ?>
    </div>
</div>
</div>

<div class="mt-6 xl:p-20  lg:grid-cols-1 mx-auto grid grid-cols-1 md:grid-cols-2  gap-14 ">
    <?php foreach ($data['wikis'] as $wiki) { ?>
        <div class=" bg-white rounded-xl hover:shadow-xl ">
            <!-- <img  src="data:image/jpg;charset=utf8;base64,<?php // echo base64_encode($wiki->getImageP() ); 
                                                                ?>"
                alt="Wiki Image" class="w-full rounded-xl  object-cover" /> -->
            <div class="p-6">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getAuthor()->getImage()); ?>" alt="Author Image">
                    <div class="text-sm">
                        <p class="text-gray-600"><?php echo $wiki->getNameAuthor()->getUsername(); ?></p>
                        <p class="text-gray-400">Published on <?php echo $wiki->getDate(); ?></p>
                    </div>
                </div>
                <h2 class="mt-4 text-xl font-semibold text-gray-800"><?php echo $wiki->getTitle(); ?></h2>
                <p class="mt-2 text-gray-600"><?php echo substr($wiki->getTexte(), 0, 150); ?></p>
                <form method="post" action="<?php echo URLROOT ?>/Pages/wikipage" class="mt-4 flex">
                    <input type="hidden" name="idWikiPage" value="<?php echo $wiki->getWikiID(); ?>">
                    <input type="submit" name="page" value="Read more" class="text-indigo-600 hover:text-indigo-800">
                </form>
            </div>
        </div>
    <?php } ?>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var liveSearchInput = document.getElementById("searchWiki");
    var searchResult = document.getElementById("searchresult");

    liveSearchInput.addEventListener("input", function() {
        var input = liveSearchInput.value;

        if (input !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "pages/searchAction", true);
            xhr.setRequestHeader("Content-type", "application/json");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let jsonData = JSON.parse(xhr.responseText);
                    console.log(jsonData);
                    searchdata(jsonData, liveSearchInput, searchResult);                       
                    searchResult.style.display = "block";
                }
            };
            var requestData = {
                input: input
            };
            xhr.send(JSON.stringify(requestData));
        } else {
            searchResult.style.display = "none";
        }
    });
});
function searchdata(wiki, liveSearchInput, searchResult) {
    let searchValue = liveSearchInput.value;
    let fragment = document.createDocumentFragment();

    if (!wiki || wiki.length === 0) {
        fragment.appendChild(document.createElement('p')).innerHTML = `<p class="text-center text-3xl text-gray-500 mb-6 mt-10 font-serif">No data found for <b>'${searchValue}'</b></p>`;
    } else {
        wiki.forEach(item => {
            let div = document.createElement('div');
            
            div.className = "bg-white rounded-xl hover:shadow-xl mt-8 max-w-2xl mx-auto";
                        // Assuming item.texte is a string
                var Text = item.texte.length > 150 ? item.texte.substring(0, 150) + '...' : item.texte;

                div.innerHTML = `
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="text-gray-600">${item.nom}</p>
                                <p class="text-gray-400">Published on ${item.date_post}</p>
                            </div>
                        </div>
                        <h2 class="mt-4 text-xl font-semibold text-gray-800">${item.titre}</h2>
                        <p class="mt-2 text-gray-600">${Text}</p>
                        <form method="post" action="<?php echo URLROOT ?>/Pages/wikipage" class="mt-4 flex">
                            <input type="hidden" name="idWikiPage" value="${item.id}">
                            <input type="submit" name="page" value="Read more" class="text-indigo-600 hover:text-indigo-800">
                        </form>
                    </div>
                `;

            fragment.appendChild(div);
        });
    }

    searchResult.innerHTML = ''; // Clear previous content
    searchResult.appendChild(fragment);
}


</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>