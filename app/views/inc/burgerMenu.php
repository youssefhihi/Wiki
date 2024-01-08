
<body class="bg-gray-100">
<div class="flex justify-between p-4 ">
        <div class="w-16 h-14 flex flex-col">
            <a href="index.php">
                <img src="assets/images/logo-wiki.png" alt="logo">  
            </a>
        </div>
        <h1 class="text-xl text-black font-semibold">Lorem, ipsum dolor sit amet</h1>
        <div id="iconMenu" class="text-2xl text-black mr-3 cirsor-pointer">
            <i onclick="openMenu()" class="fas fa-bars"></i>
        </div>
    

        <div id="burgerMenu" class="hidden bg-white border justify-end w-screen fixed top-0 right-0 p-4">
    <i onclick="toggleMenu()" class="fas fa-times absolute top-5 right-7 text-2xl cursor-pointer"></i>
    <nav class="flex flex-col gap-6 text-center items-center">
        <img class="w-16 h-16 rounded-full" src="assets/images/logo-wiki.png" alt="logo">
        <div class="flex flex-col gap-2 w-full">
            <a href="index.php" class="text-xl w-full hover:bg-black hover:text-white">Home</a>
            <a href="views/AuteurPages/account.php" class="text-xl w-full hover:bg-black hover:text-white">Account</a>
            <a href="#" class="text-xl w-full hover:bg-black hover:text-white">Contact Us</a>
        </div>
    </nav>
</div>
   

</div> 