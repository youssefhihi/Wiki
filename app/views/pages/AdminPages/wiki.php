<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/SideBar.php'; ?>
    
        <div class="p-8">
            <div class="flex flex-col gap-10">
                <div class="flex justify-between">
                <h1 class=" text-black text-3xl">Wikis Category</h1>
                <button onclick="AddCategory()" class="px-4 py-2 border border-black bg-white text-black rounded-md hover:bg-black  hover:text-white">
                Add Category
            </button>   
        </div>
        <table class="w-full border border-collapse border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Number</th>
            <th class="border p-2">Autor</th>
            <th class="border p-2">Wiki Title</th>
            <th class="border p-2">Archive</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($data['Wiki'] as $wiki){
        ?>
        <tr class="border">
            <td class="border p-2"><?php echo $wiki->getWikiID();?></td>
            <td class="border p-2"><?php echo $wiki->getNameAuthor();?></td>
            <td class="border p-2"><?php echo $wiki->getWikiTitle();?></td>
            <td class="border p-2 flex justify-around">                
            <i class="fas fa-archive"></i>

            </td>
<!-- ____________________________________Popup Delete Category___________________________________________________________ -->
           
           
<!-- ____________________________________Popup Update Category___________________________________________________________ -->

          
        <?php     
            }
        ?>
        </tr>
    </tbody>
</table>
</div>
</div>



<!-- ____________________________________Popup Add Category___________________________________________________________ -->


    

<?php require APPROOT . '/views/inc/footer.php'; ?>

