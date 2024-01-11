<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>


<div class="container mx-auto mt-8 p-8 bg-gray-200 rounded-md shadow-lg">
            <?php foreach($data['userinfo'] as $user){ ?>
                 <!--Affiche information about user  -->
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


           <!-- ---------------------------------------popup Update Image Profile----------------------------------- -->
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
          
<!-- ---------------------------------------button ADD Wiki----------------------------------- -->
        <div class="flex justify-end mt-4">
            <button onclick="openPopup()" class="px-4 py-2 border border-black bg-white text-black rounded-md hover:bg-black  hover:text-white">
                Add Wiki
            </button>  
        </div>
        
<!-- ---------------------------------------Affichage   wikis by id of user ----------------------------------- -->

        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Wikis</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <?php foreach($data['wiki'] as $wiki){ ?>
                <!-- Wiki Cards -->
                <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-xl">
                   
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
                        <div class="flex">
                             <!-- Wiki Image -->
                            <!-- <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getImageP() ); ?>"
                                alt="Wiki Image" class="w-full h-32 object-cover" /> -->
                        <!-- Wiki Description -->
                        <p class="mt-2 text-gray-600"><?php echo substr($wiki->getTexte(), 0, 200); ?></p>
                        </div>
                        <form method="post" action="<?php echo URLROOT ?>/Pages/wikipage" class="mt-4 flex">
                            <input type="hidden" name="idWikiPage" value="<?php echo $wiki->getWikiID(); ?>">
                            <input type="submit" name="page" value="Read more" class="text-indigo-600 hover:text-indigo-800">
                        </form>
                        <!-- Delete Icon -->
                         <div class="flex gap-2  justify-end">
                            <i class="fas fa-trash  text-black text-2xl  cursor-pointer" onclick="DeleteWiki(<?php echo $wiki->getWikiID();?>)"></i>
                            <!-- Modify Icon -->
                            <i class="fas fa-edit text-black text-2xl cursor-pointer" onclick="updateWiki(<?php echo $wiki->getWikiID();?>)"></i>
                        </div>                                                
                    </div>
                </div>
 <!-- ---------------------------------------popup Delete Wiki----------------------------------- -->

                <div id="popupDeleteWiki<?php echo $wiki->getWikiID();?>"  class="hidden  fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                    <div class="bg-white mx-auto max-w-2xl p-14  m-48   rounded-md">
                        <form  method="post" action="<?php echo URLROOT ?>/account/DeleteWiki" >
                            <div class="flex flex-col ">
                                <i class="fas fa-trash text-gra-600 text-4xl text-center "></i>
                                <h1 class="text-black text-3xl font-bold mb-10">Are you sure you want to delete this Wiki ?</h1>
                            </div>
                            <div class="flex  justify-between ">
                                <input type="hidden" name="idWiki" value="<?php echo $wiki->getWikiID();?>">
                                <button  onclick="closeDeleteWiki(<?php echo $wiki->getWikiID();?>)" class=" text-white text-2xl rounded-xl bg-blue-700 w-28 h-14">Close</button>
                                <input type="submit" name="DeleteWiki" value="Delete" class=" text-white text-2xl rounded-xl bg-red-700 w-28 h-14">
                            </div>
                        </form>
                    </div>
                </div>
<!-- ---------------------------------------popup Update Wiki----------------------------------- -->

                <div id="popupUpdateWiki<?php echo $wiki->getWikiID();?>" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
                    <div class="bg-white max-w-3xl mx-auto m-16 p-8 rounded-md">
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
                            <div class="flex flex-col gap-5">
                                <input type="submit" name="UpdateWiki" value="Update Wiki" class="w-full p-2 border border-black text-black rounded-md hover:bg-black hover:text-white">
                                <button onclick="closeUpdateWiki(<?php echo $wiki->getWikiID();?>)" class="w-full p-2 border border-black text-white bg-gray-700 rounded-md">Close </button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <?php 
                }
                ?>
            </div>
        </div>        
    </div>

    <!-- ---------------------------------------popup Add Wiki----------------------------------- -->


    <div id="popup" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
    <div class="bg-white max-w-3xl mx-auto m-16 p-8 rounded-md">
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
                <div class="flex flex-col gap-5">
                <input type="submit" name="AddWiki" value="Add Wiki"class="w-full p-2 border border-black text-black rounded-md hover:bg-black hover:text-white">
                <button onclick="closePopup()"  class="w-full p-2 border border-black text-white bg-gray-700 rounded-md">Close </button>
                </div>
            </form>
        </div>
        
    </div>
            <?php
            }
            ?>



<?php require APPROOT . '/views/inc/footer.php'; ?>
