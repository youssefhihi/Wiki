<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/SideBar.php'; ?>
<section class="p-10 sm:ml-64 md:mt-14">
        <div class="md:p-8">
            <div class="flex flex-col gap-10">
                <div class="flex justify-between">
                <h1 class=" text-black text-2xl mb-10 md:mb-0 md:text-3xl">Wikis Tags</h1>
                <button onclick="AddTag()" class="px-4 md:py-2 border border-black bg-white text-black rounded-md hover:bg-black  hover:text-white">
                Add Tag
            </button>   
        </div>
        <table class="w-full border border-collapse border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Number</th>
            <th class="border p-2">Tag</th>
            <th class="border p-2">Operation</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = 0;
            foreach($data['Tag'] as $Tag){
                $i++;
        ?>
        <tr class="border">
            <td class="border p-2"><?php echo $i ?></td>
            <td class="border p-2"><?php echo $Tag->getTagName();?></td>
            <td class="border p-2 flex justify-around">                
                <i class="fas fa-trash text-black text-2xl cursor-pointer" onclick="DeleteTag(<?php echo $Tag->getTagID();?>)"></i>
                <i class="fas fa-edit text-black text-2xl cursor-pointer" onclick="UpdateTag(<?php echo $Tag->getTagID();?>)"></i>
            </td>
<!-- ____________________________________Popup Delete Tag___________________________________________________________ -->
           
            <div id="popupDeleteTag<?php echo $Tag->getTagID();?>"  class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                <div class="bg-white mx-auto max-w-2xl p-14  m-48     rounded-md">
                    <form  method="post" action="<?php echo URLROOT ?>/dashboard/DeleteTag" >
                        <h1 class="text-black text-3xl font-bold">Are you sure <?php echo $Tag->getTagID();?>?</h1>
                        <div class="flex space-x-5 justify-end">
                            <input type="hidden" name="idTag" value="<?php echo $Tag->getTagID();?>">
                            <button  onclick="closeDeleteTag()" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                            <input type="submit" name="DeleteTag" value="Delete" class=" text-white text-2xl rounded-xl bg-red-700 w-28 h-14">
                        </div>
                    </form>
                </div>
            </div>
<!-- ____________________________________Popup Update Tag___________________________________________________________ -->

            <div id="popupUpdateTag<?php echo $Tag->getTagID();?>" class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                <div class="bg-white mx-auto max-w-2xl p-14  m-48   rounded-md">
                    <form  method="post" action="<?php echo URLROOT ?>/dashboard/UpdateTag" >
                        <input type="hidden" name="idTag" value="<?php echo $Tag->getTagID();?>">
                        <input type="text" name="name" value="<?php echo $Tag->getTagName();?>" placeholder="Enter the Name of your Tag" class="w-full p-2 mb-4 border rounded-md">
                        <div class="flex space-x-5 justify-end">
                            <button  onclick="closeUpdateTag()" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                            <input type="submit" name="UpdateTag" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800" value="Update Tag">             
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


<!-- ____________________________________Popup Add Tag___________________________________________________________ -->


    <div id="popupTag" class=" hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
        <div class="bg-white mx-auto max-w-2xl p-14  m-48     rounded-md">
            <form method="post" action="<?php echo URLROOT ?>/dashboard/InsertTag">
                <input type="text" name="name" placeholder="Enter the Name of your Tag" class="w-full p-2 mb-4 border rounded-md">
                <input type="submit" name="AddTag" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800" value="Add Tag">             
            </form>
        
        <button onclick="closeTag()" class=" text-4xl absolute top-48 right-80  text-black">&times;</button>
        </div>
    </div>
<script>
    function AddTag() {
    document.getElementById('popupTag').classList.remove('hidden');
}

function closeTag(){
    document.getElementById('popupTag').classList.add('hidden');
}
function DeleteTag(id) {
    document.getElementById(`popupDeleteTag${id}`).classList.remove('hidden');
}

function closeDeleteTag(){
    document.getElementById('popupDeleteTag').classList.add('hidden');
}

function UpdateTag(id) {
    document.getElementById(`popupUpdateTag${id}`).classList.remove('hidden');
}

function closeUpdateTag(){
    document.getElementById('popupUpdateTag').classList.add('hidden');
}
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>

