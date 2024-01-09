<<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>


    <div class="container mx-auto mt-8 p-8 bg-white rounded-md shadow-lg">
       
            <?php foreach($data['userinfo'] as $user){ ?>
                <div class="flex items-center space-x-4">
                <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($song->getImage() ); ?>"
                alt="Profile Picture" class="w-16 h-16 rounded-full"/> 
                <div>
                    <h2 class="text-xl font-semibold text-gray-800"><?php echo $user->getUsername();?></h2>     
                    <p class="text-gray-400 "><?php echo $user->getEmail();?></p>
                </div>
           </div>
           <?php
            }
            ?>

        <div class="flex justify-end mt-4">
            <button onclick="openPopup()" class="px-4 py-2 border border-black bg-white text-black rounded-md hover:bg-black  hover:text-white">
                Add Wiki
            </button>
            
        </div>
        

        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Your Wikis</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Wiki Cards -->
                <div class="max-w-md mx-auto bg-white rounded-md overflow-hidden shadow-lg">
                    <!-- Wiki Image -->
                    <img class="w-full h-32 object-cover" src="https://placekitten.com/600/300" alt="Wiki Image">
                    <div class="p-6">
                        <div class="flex items-center">
                            <!-- Author Image -->
                            <img class="w-10 h-10 rounded-full mr-4" src="https://placekitten.com/100/100" alt="Author Image">
                            <div class="text-sm">
                                <p class="text-gray-600">Author Name</p>
                                <p class="text-gray-400">Published on January 1, 2023</p>
                            </div>
                        </div>
                        <!-- Wiki Title -->
                        <h2 class="mt-4 text-xl font-semibold text-gray-800">Card Title</h2>
                        <!-- Wiki Description -->
                        <p class="mt-2 text-gray-600">Brief description or summary of the wiki content. It can span multiple lines.</p>
                         <div class="mt-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-800">Read more</a>
                        </div>
                        <!-- Delete Icon -->
                         <div class="flex gap-2  justify-end">
                    <i class="fas fa-trash  text-black text-2xl  cursor-pointer" onclick="deleteWiki()"></i>
                    <!-- Modify Icon -->
                    <i class="fas fa-edit text-black text-2xl cursor-pointer" onclick="modifyWiki()"></i>
                        </div>
                                       
                        
                    </div>
                </div>
                <!-- Repeat similar structure for other wiki cards -->
            </div>
        </div>

      
        
    </div>

    <div id="popup" class="hidden fixed w-full h-full top-0 left-0 items-center justify-center bg-black bg-opacity-50 z-20">
    <div class="bg-white p-8 rounded-md">
        <form>
            <input type="text" name="titre" placeholder="Enter the title of your wiki" class="w-full p-2 mb-4 border rounded-md">
            <input type="text" name="text" placeholder="Enter your wiki" class="w-full p-2 mb-4 border rounded-md">
            <input type="file" name="image" placeholder="Image" class="w-full p-2 mb-4 border rounded-md">
            <select name="categorie" class="w-full p-2 mb-4 border rounded-md">
                <option value="" selected disabled>Choose category</option>
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
            </select>

            <div class="mb-4">
                <p class="text-sm  mb-2">Select tags for your wiki:</p>
                <div class="flex flex-wrap gap-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="tag" value="tag1">
                        <span class="text-gray-800">Tag 1</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="tag" value="tag2">
                        <span class="text-gray-800">Tag 2</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="tag" value="tag3">
                        <span class="text-gray-800">Tag 3</span>
                    </label>
                    
                </div>
            </div>

           

            <button type="button" name="AddWiki" onclick="addWiki()" class="w-full p-2 bg-black text-white rounded-md hover:bg-gray-800">Add Wiki</button>
        </form>
    </div>
    <div>
        <button onclick="closePopup()" class="absolute text-4xl top-0 right-2 text-black">&times;</button>
    </div>
</div>



<script src="../../assets/js/app.js"></script>
</body>
</html>
