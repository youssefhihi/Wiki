<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/SideBar.php'; ?>
<section class="p-10 sm:ml-64 md:mt-14">
        <div class="md:p-8">
            <div class="flex flex-col gap-10">
                <div class="flex justify-between">
                <h1 class=" text-black text-2xl mb-10 md:mb-0 md:text-3xl">Wikis Category</h1>
                <button onclick="AddCategory()" class="px-4 md:py-2 border border-black bg-white text-black rounded-md hover:bg-black  hover:text-white">
                Add Category
            </button>   
        </div>
        <table class="w-full border border-collapse border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Number</th>
            <th class="border p-2">Category</th>
            <th class="border p-2">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($data['category'] as $category){
        ?>
        <tr class="border">
            <td class="border p-2"><?php echo $category->getCategoryID();?></td>
            <td class="border p-2"><?php echo $category->getCategoryName();?></td>
            <td class="border p-2 flex justify-around">                
                <i class="fas fa-trash text-black text-2xl cursor-pointer" onclick="DeleteCategory(<?php echo $category->getCategoryID();?>)"></i>
                <i class="fas fa-edit text-black text-2xl cursor-pointer" onclick="UpdateCategory(<?php echo $category->getCategoryID();?>)"></i>
            </td>
<!-- ____________________________________Popup Delete Category___________________________________________________________ -->
           
            <div id="popupDeleteCategory<?php echo $category->getCategoryID();?>"  class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                <div class="bg-white mx-auto max-w-2xl p-14  m-48     rounded-md">
                    <form  method="post" action="<?php echo URLROOT ?>/dashboard/DeleteCategory" >
                        <h1 class="text-black text-3xl font-bold">Are you sure <?php echo $category->getCategoryID();?>?</h1>
                        <div class="flex space-x-5 justify-end">
                            <input type="hidden" name="idCategory" value="<?php echo $category->getCategoryID();?>">
                            <button  onclick="closeDeleteCategory()" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                            <input type="submit" name="DeleteCategory" value="Delete" class=" text-white text-2xl rounded-xl bg-red-700 w-28 h-14">
                        </div>
                    </form>
                </div>
            </div>
<!-- ____________________________________Popup Update Category___________________________________________________________ -->

            <div id="popupUpdateCategory<?php echo $category->getCategoryID();?>" class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                <div class="bg-white mx-auto max-w-2xl p-14  m-48   rounded-md">
                    <form  method="post" action="<?php echo URLROOT ?>/dashboard/UpdateCategory" >
                        <input type="hidden" name="idCategory" value="<?php echo $category->getCategoryID();?>">
                        <input type="text" name="name" placeholder="Enter the Name of your Category" class="w-full p-2 mb-4 border rounded-md">
                        <div class="flex space-x-5 justify-end">
                            <button  onclick="closeUpdateCategory()" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                            <input type="submit" name="UpdateCategory" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800" value="Update Category">             
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


    <div id="popupCategory" class=" hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
        <div class="bg-white mx-auto max-w-2xl p-14  m-48     rounded-md">
            <form method="post" action="<?php echo URLROOT ?>/dashboard/InsertCategory">
                <input type="text" name="name" placeholder="Enter the Name of your Category" class="w-full p-2 mb-4 border rounded-md">
                <input type="submit" name="AddCategory" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800" value="Add Category">             
            </form>
        
        <button onclick="closeCategory()" class=" text-4xl absolute top-48 right-80  text-black">&times;</button>
        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

