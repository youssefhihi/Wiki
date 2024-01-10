<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/SideBar.php'; ?>
    <section class="p-10 sm:ml-64 mt-14">
        <div class="p-8">
            <div class="flex flex-col gap-10">
                <div class="flex justify-between">
                <h1 class=" text-black text-3xl">Wikis Category</h1>
                
        </div>
        <table class="w-full border border-collapse border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Number</th>
            <th class="border p-2">Autor</th>
            <th class="border p-2">Wiki Title</th>
            <th class="border p-2">Texte</th>
            <th class="border p-2">Image</th>
            <th class="border p-2">Archive</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($data['Wiki'] as $wiki){
        ?>
        <tr class="border">
            <td class="border p-2"><?php echo $wiki->getWikiID();?></td>
            <td class="border p-2"><?php echo $wiki->getAuthor()->getEmail();?></td>
            <td class="border p-2"><?php echo $wiki->getTitle();?></td>
            <td class="border p-2"><?php echo $wiki->getTexte();?></td>
            <td class="border p-2"><img class="w-10 h-10 rounded-full mr-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getImageP());?>" alt=" Image"> </td>
            <td class="border p-2 flex justify-around">                
            <i onclick="openArchiveWiki(<?php echo $wiki->getWikiID();?>)" class="fas fa-archive"></i>

            </td>    
           
<!-- ____________________________________Popup Archive___________________________________________________________ -->
<div id="popupArchiveWiki<?php echo $wiki->getWikiID();?>"  class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                <div class="bg-white mx-auto max-w-2xl p-14  m-48     rounded-md">
                    <form  method="post" action="<?php echo URLROOT ?>/dashboard/ArchiveWiki" >
                        <h1 class="text-black text-3xl font-bold">Are you sure <?php echo $wiki->getWikiID();?>?</h1>
                        <div class="flex space-x-5 justify-end">
                            <input type="hidden" name="wikiID" value="<?php echo $wiki->getWikiID();?>">
                            <button  onclick="closeArchiveWiki()" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                            <input type="submit" name="ArchiveWiki" value="Archive" class=" text-white text-2xl rounded-xl bg-red-700 w-28 h-14">
                        </div>
                    </form>
                </div>
            </div>
          
        <?php     
            }
        ?>
        </tr>
    </tbody>
</table>
</div>
</div>


</section>
<!-- ____________________________________Popup Add Category___________________________________________________________ -->

<script>
    
function openArchiveWiki(id) {
    document.getElementById(`popupArchiveWiki${id}`).classList.remove('hidden');
}

function closeArchiveWiki(){
    document.getElementById('popupArchiveWiki').classList.add('hidden');
}
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

