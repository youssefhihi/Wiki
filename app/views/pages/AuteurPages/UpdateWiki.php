
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; 
foreach($data['oneWiki'] as $wiki){
?>
<!-- --------------------------------------- Update Wiki----------------------------------- -->

<div id="popupUpdateWiki<?php echo $wiki->getWikiID();?>" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                    <div class="bg-white max-w-3xl mx-auto m-16 p-8 rounded-md">
                        <form method="post" action="<?php echo URLROOT ?>/account/UpdateWiki" enctype="multipart/form-data">
                            
                            
                            <input type="text" name="titre" value="<?php echo $wiki->getTitle();?>" placeholder="Enter the title of your wiki" class="w-full p-2 mb-4 border rounded-md">
                            <input type="hidden" name="wikiID" value="<?php echo $wiki->getWikiID();?>">
                            <input type="text" name="texte" value="<?php echo $wiki->getTexte();?>" placeholder="Enter your wiki" class="w-full p-2 mb-4 border rounded-md">
                            <input type="file" name="image" value="<?php echo base64_encode($wiki->getImageP() ); ?>" placeholder="Image" class="w-full p-2 mb-4 border rounded-md">
                            <select name="categorie" class="w-full p-2 mb-4 border rounded-md">
                                
                                <option value="" selected ><?php echo $wiki->getCategorie()->getCategoryName();?></option>
                                <?php foreach($data['category'] as $category){ ?>
                                <option  value="<?php echo $category->getCategoryID();?>"><?php echo $category->getCategoryName();?></option>                                     
                                <?php  }?>
                            
                            </select>

                            <div class="mb-4">
                                <p class="text-sm  mb-2">Select tags for your wiki:</p>
                                <div class="flex flex-wrap gap-2">
                                <?php foreach($data['tag'] as $tag){ 
                                   foreach($data['oneWiki'] as $wikitag){
                                    ?>

                                <label class="flex items-center space-x-2">

                                <input id="checkbox-item-<?php echo $tag->getTagID();?>" type="checkbox" name="tags[]" value="<?php echo $tag->getTagID();?>" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <input type="checkbox"  name="tags[]" value="<?php echo $tag->getTagID();?>">
                                    <span  class="text-gray-800"><?php echo $tag->getTagName();?></span>
                                </label>
                                <?php } }?>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5">
                                <input type="submit" name="UpdateWiki" value="Update Wiki" class="w-full p-2 border border-black text-black rounded-md hover:bg-black hover:text-white">
                                <button onclick="closeUpdateWiki(<?php echo $wiki->getWikiID();?>)" class="w-full p-2 border border-black text-white bg-gray-700 rounded-md">Close </button>
                            </div>
                        </form>
                    </div>
                    
                </div>
<?php 
}
require APPROOT . '/views/inc/footer.php'; ?>