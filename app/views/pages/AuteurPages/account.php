<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>


    <div class="container mx-auto mt-8 p-8 bg-white rounded-md shadow-lg">
       
            <?php foreach($data['userinfo'] as $user){ ?>
                <div class="flex items-center space-x-4">
                    <div class="flex">
                <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user->getImage() ); ?>"
                alt="Profile Picture" class="w-16 h-16 rounded-full"/>
                <i class="fas fa-edit text-black cursor-pointer" onclick="updateImage(<?php echo $user->getUser_id();?>)"></i>
                </div>
                <div>
                    <input type="hidden" value="<?php echo $_SESSION['idUseer'];?>">
                    <h2 class="text-xl font-semibold text-gray-800"><?php echo $user->getUsername();?></h2>     
                    <p class="text-gray-400 "><?php echo $user->getEmail();?></p>
                </div>
           </div>
           <!-- popup Update Image Profile -->
           <div id="popupUpdateImage<?php echo $user->getUser_id();?>" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
    <div class="bg-white mx-auto max-w-2xl p-14 m-48 rounded-md">
        <form method="post" action="<?php echo URLROOT ?>/account/ImageProfile" enctype="multipart/form-data">
            <input type="file" name="image">
            <div class="flex space-x-5 justify-end">
                <input type="hidden" name="iduser" value="<?php echo $_SESSION['idUseer']?>">
                <button onclick="closeUpdateImage()" class="text-white text-2xl rounded-xl bg-red-700 w-28 h-14">Close</button>
                <input type="submit" name="UpdateImage" value="Update" class="text-white text-2xl rounded-xl bg-black w-28 h-14">
            </div>
        </form>
    </div>
</div>
          

        <div class="flex justify-end mt-4">
            <button onclick="openPopup()" class="px-4 py-2 border border-black bg-white text-black rounded-md hover:bg-black  hover:text-white">
                Add Wiki
            </button>
            
        </div>
        

        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Wikis</h3>
            <div class="grid grid-cols-2 gap-5">
                <?php foreach($data['wiki'] as $wiki){ ?>
                <!-- Wiki Cards -->
                <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-lg">
                    <!-- Wiki Image -->
                    <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getImageP() ); ?>"
                alt="Wiki Image" class="w-full h-32 object-cover" />
                    <div class="p-6">
                        <div class="flex items-center">
                            <!-- Author Image -->
                            <img class="w-10 h-10 rounded-full mr-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getAuthor()->getImage()); ?>" alt="Author Image">
                            <div class="text-sm">
                            <p class="text-gray-600"><?php echo $wiki->getNameAuthor()->getUsername(); ?></p>

                                <p class="text-gray-400">Published on <?php echo $wiki->getDate();?></p>
                            </div>
                        </div>
                        <!-- Wiki Title -->
                        <h2 class="mt-4 text-xl font-semibold text-gray-800"><?php echo $wiki->getTitle();?></h2>

                        <!-- Wiki Description -->
                        <p class="mt-2 text-gray-600"><?php echo $wiki->getTexte();?></p>
                         <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800"><?php echo $wiki->getCategorie()->getCategoryName();?></a>
                        </div>
                        <!-- Delete Icon -->
                         <div class="flex gap-2  justify-end">
                    <i class="fas fa-trash  text-black text-2xl  cursor-pointer" onclick="DeleteWiki(<?php echo $wiki->getWikiID();?>)"></i>
                    <!-- Modify Icon -->
                    <i class="fas fa-edit text-black text-2xl cursor-pointer" onclick="updateWiki(<?php echo $wiki->getWikiID();?>)"></i>

                        </div>
                                       
                        
                    </div>
                </div>
 
                <div id="popupDeleteWiki<?php echo $wiki->getWikiID();?>"  class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                <div class="bg-white mx-auto max-w-2xl p-14  m-48   rounded-md">
                    <form  method="post" action="<?php echo URLROOT ?>/account/DeleteWiki" >
                        <h1 class="text-black text-3xl font-bold">Are you sure <?php echo $wiki->getWikiID();?>?</h1>
                        <div class="flex space-x-5 justify-end">
                            <input type="hidden" name="idWiki" value="<?php echo $wiki->getWikiID();?>">
                            <button  onclick="closeDeleteWiki(<?php echo $wiki->getWikiID();?>)" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                            <input type="submit" name="DeleteWiki" value="Delete" class=" text-white text-2xl rounded-xl bg-red-700 w-28 h-14">
                        </div>
                    </form>
                </div>
            </div>

                <div id="popupUpdateWiki<?php echo $wiki->getWikiID();?>" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
    <div class="bg-white p-8 rounded-md">
        <form method="post" action="<?php echo URLROOT ?>/account/UpdateWiki" enctype="multipart/form-data">
        <input type="hidden" name="iduseer" value="<?php echo $_SESSION['idUseer'];?>">
            <input type="text" name="titre" value="<?php echo $wiki->getTitle();?>" placeholder="Enter the title of your wiki" class="w-full p-2 mb-4 border rounded-md">
            <input type="hidden" name="wikiID" value="<?php echo $wiki->getWikiID();?>">
            <input type="text" name="texte" value="<?php echo $wiki->getTexte();?>" placeholder="Enter your wiki" class="w-full p-2 mb-4 border rounded-md">
            <input type="file" name="image" value="<?php echo base64_encode($wiki->getImageP() ); ?>" placeholder="Image" class="w-full p-2 mb-4 border rounded-md">
            <select name="categorie" class="w-full p-2 mb-4 border rounded-md">
                <option value="" selected ><?php echo $wiki->getCategorie()->getCategoryName();?></option>
                <?php foreach($data['category'] as $category){ ?>
                <option value="<?php echo $category->getCategoryID();?>"><?php echo $category->getCategoryName();?></option>         
              
                <?php  }?>
            </select>

            <div class="mb-4">
                <p class="text-sm  mb-2">Select tags for your wiki:</p>
                <div class="flex flex-wrap gap-2">
                <?php foreach($data['tag'] as $tag){ ?>
               <label class="flex items-center space-x-2">
                        <input type="checkbox"  name="tags[]" value="<?php echo $tag->getTagID();?>">
                        <span  class="text-gray-800"><?php echo $tag->getTagName();?></span>
                    </label>
                    <?php  }?>
                </div>
            </div>

           

            <input type="submit" name="UpdateWiki" value="Update Wiki" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800">
        </form>
    </div>
    <div>
    <button onclick="closeUpdateWiki(<?php echo $wiki->getWikiID();?>)" class="absolute text-4xl top-0 right-2 text-black">&times;</button>
    </div>
</div>


               
               <?php 
                }
                ?>
            </div>
        </div>

      
        
    </div>

    <div id="popup" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
    <div class="bg-white p-8 rounded-md">
        <form method="post" action="<?php echo URLROOT ?>/account/InsertWiki" enctype="multipart/form-data">
        <input type="hidden" name="iduseer" value="<?php echo $_SESSION['idUseer'];?>">
            <input type="text" name="titre" placeholder="Enter the title of your wiki" class="w-full p-2 mb-4 border rounded-md">
            <input type="text" name="texte" placeholder="Enter your wiki" class="w-full p-2 mb-4 border rounded-md">
            <input type="file" name="image" placeholder="Image" class="w-full p-2 mb-4 border rounded-md">
            <select name="categorie" class="w-full p-2 mb-4 border rounded-md">
                <option value="" selected disabled>Choose category</option>
                <?php foreach($data['category'] as $category){ ?>
                <option value="<?php echo $category->getCategoryID();?>"><?php echo $category->getCategoryName();?></option>         
              <?php  }?>
            </select>

            <div class="mb-4">
                <p class="text-sm  mb-2">Select tags for your wiki:</p>
                <div class="flex flex-wrap gap-2">
                <?php foreach($data['tag'] as $tag){ ?>
               <label class="flex items-center space-x-2">
                        <input type="checkbox" name="tags[]" value="<?php echo $tag->getTagID();?>">
                        <span  class="text-gray-800"><?php echo $tag->getTagName();?></span>
                    </label>
                    <?php  }?>
                </div>
            </div>

           

            <input type="submit" name="AddWiki" value="Add Wiki" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800">
        </form>
    </div>
    <div>
        <button onclick="closeUpdateImage()" class="absolute text-4xl top-0 right-2 text-black">&times;</button>
    </div>
</div>
<?php
            }
            ?>


<script>
function updateImage(id) {
    document.getElementById('popupUpdateImage' + id).classList.remove('hidden');
}

function closeUpdateImage(){
    document.getElementById('popupUpdateImage').classList.add('hidden');
}


function updateWiki(id) {
    document.getElementById('popupUpdateWiki' + id).classList.remove('hidden');
}


function closeUpdateWiki(id){
    document.getElementById('popupUpdateWiki' + id).classList.add('hidden');
}

function DeleteWiki(id) {
    document.getElementById('popupDeleteWiki' + id).classList.remove('hidden');
}


function closeDeleteWiki(id){
    document.getElementById('popupDeleteWiki' + id).classList.add('hidden');
}

</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
