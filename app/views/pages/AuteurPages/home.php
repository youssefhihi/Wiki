<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>

<div class="max-w-2xl mx-auto h-10 flex  rounded-2xl overflow-hidden">
    <input type="text" placeholder="Search for anything" class="flex-1 h-full px-4 bg-white focus:outline-none">
    <div class="flex items-center justify-center h-full w-10 bg-white">
        <i class="fas fa-search text-gray-400"></i>
    </div>
</div>
    <div class="mt-8 grid  grid-cols-2 gap-5 md:grid-cols-1 ">
        <?php foreach($data['wikis'] as $wiki){ ?>
    <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-lg">
    <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getImageP() ); ?>"
                alt="Wiki Image" class="w-full h-32 object-cover" />
            <div class="p-6">
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getAuthor()->getImage()); ?>" alt="Author Image">               
                 <div class="text-sm">
                <p class="text-gray-600"><?php echo $wiki->getNameAuthor()->getUsername(); ?></p>
                <p class="text-gray-400">Published on <?php echo $wiki->getDate();?></p>
                </div>
            </div>
            <h2 class="mt-4 text-xl font-semibold text-gray-800"><?php echo $wiki->getTitle();?></h2>
            <p class="mt-2 text-gray-600"><?php echo substr($wiki->getTexte(), 0, 150); ?></p>
            <div class="mt-4">
            <a href="full_text_page.php?wiki_id=<?php echo $wiki->getWikiID(); ?>" class="text-indigo-600 hover:text-indigo-800">Read more</a>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>