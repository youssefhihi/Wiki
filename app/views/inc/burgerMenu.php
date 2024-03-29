<body class="bg-gray-100">
    <div class="flex justify-between p-4">
        <div class="w-16 h-14 flex flex-col">
            <a href="">
                <img src="<?php echo URLROOT; ?>/image/logo-wiki.png" alt="logo">  
            </a>
        </div>
        <h1 class="md:text-xl text-black font-semibold font-mono">Welcome to Wiki  <span class="font-mono text-gray-600 underline">Your Gateway to Knowledge </span> </h1>

        <?php if(isset($_SESSION['idUseer'])){?>
        
            <div id="iconMenu" class="text-2xl text-black mr-3 cursor-pointer">
                <i onclick="openMenu()" class="fas fa-bars"></i>
            </div>
        
            <div id="burgerMenu" class="hidden bg-white border justify-end w-screen fixed top-0 right-0 p-4">
                <i onclick="toggleMenu()" class="fas fa-times absolute top-5 right-7 text-2xl cursor-pointer"></i>
                <nav class="flex flex-col gap-6 text-center items-center">
                    <img class="w-16 h-16 rounded-full" src="<?php echo URLROOT; ?>/image/logo-wiki.png" alt="logo">
                    <div class="flex flex-col gap-2 w-full">
                        <a href="<?php echo URLROOT ?>" class="text-xl w-full hover:bg-black hover:text-white">Home</a>
                        <a href="<?php echo URLROOT ?>/account" class="text-xl w-full hover:bg-black hover:text-white">Account</a>                    
                            <form method="post"  action="<?php echo URLROOT ?>/dashboard/logout" class="p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <i class="fas fa-sign-out-alt"></i> 
                            <input type="submit" name="logout" class=" whitespace-nowrap" value="logout">
                            </form>         
                    </div>
                </nav>
            </div>
        
        <?php } else{ ?>
        
            <div class="flex justify-end">
            <button class="border border-gray-800 bg-white text-black font-semibold  w-24 rounded-xl hover:bg-gray-800 hover:text-white ">
               <a href= "<?php echo URLROOT ?>/register">LogIn</a> 
            </button>
            </div>
        <?php }  ?>
    </div>
</body>
