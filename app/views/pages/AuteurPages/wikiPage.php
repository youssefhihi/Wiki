<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>

<?php
if (empty($data['oneWiki'])) {
    header('location:' . APPROOT . 'AuteurPages/home.php');
    exit(); 
}


foreach($data['oneWiki'] as $wiki) {

 
?>
<div class="p-10  mt-10 mx-auto max-w-4xl rounded-md mb-8 bg-white">
   
<div class="flex flex-col md:flex-row items-center mb-4">
    <!-- Author Image -->
    <img class="w-14 h-14 rounded-full mr-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getAuthor()->getImage()); ?>" alt="Author Image">
    
    <div class=" text-xl mt-2 md:mt-0 md:ml-4 flex flex-col">
        <p class="text-gray-600 ml-3 md:ml-0"><?php echo $wiki->getNameAuthor()->getUsername(); ?></p>
        <p class="text-gray-400">Published on <?php echo $wiki->getDate(); ?></p>
    </div>

    <div class="ml-auto flex space-x-2  mt-5 md:mt-0 p-3  rounded-xl">
        <p class=" font-semibold ">Tags:</p>
        <span class="tags bg-gray-500 rounded-xl text-black font-mono">#<?php echo $wiki->getTag()->getTagName(); ?></span> 
    </div>
</div>

    <!-- Wiki Title -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-10 ">
    <h2 class="text-3xl font-semibold text-gray-800 mb-2 md:w-2/3"><?php echo $wiki->getTitle(); ?></h2>
    <p class="text-xl font-semibold md:w-1/3 text-right"> Category : <span class="font-mono text-gray-800 underline"><?php   echo  $wiki->getCategorie()->getCategoryName(); ?></span></p>
</div>
    <div class=" flex flex-col md:flex-row  mt-8">
    <div class="w-full md:w-1/2 pl-0 md:pl-4 mt-4 md:mt-0">
            <!-- Wiki Image -->
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getImageP()); ?>" alt="Wiki Image" class="w-full rounded-xl object-cover" />
        </div>
        <div class="w-full md:w-1/2">
            <!-- Wiki Description -->
            <p class="text-gray-600"><?php echo $wiki->getTexte(); ?></p>
        </div>
       
    </div>
</div>
<?php } ?>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var tagsElement = document.querySelector('.tags');
    
    if (tagsElement) {
      var tagsText = tagsElement.textContent;
      var modifiedTags = tagsText.replace(/,/g, ' #');
      tagsElement.textContent = modifiedTags;
    }
  });
</script>


<?php require APPROOT . '/views/inc/footer.php'; ?>
