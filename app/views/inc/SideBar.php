<div class=" mt-6  text-center"> 
   <?php foreach($data['userinfo'] as $user){ 
        ?>          
                <h1 class="text-2xl font-semibold "> Welcome <?php echo $user->getUsername();?> </h1>
        </div> 
        
<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-600 dark:bg-gray-800">
      <ul class="space-y-5 font-medium ">
      
             <!--    Affiche information about user  -->
            <div class="flex flex-col items-center space-x-4 mb-5">
                
                    <img  src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($user->getImage() ); ?>"
                    alt="Profile Picture" class="w-28 h-28 rounded-full"/>
             
                <div>
                    <p class="text-black"><?php echo $user->getEmail();?></p>
                </div>
            </div>
            <?php } ?>
         <div class="border-2 border-black "></div>
         <li>
            <a href="<?php echo URLROOT ?>/dashboard" class="flex items-center p-2 text-white rounded-lg dark:text-white  hover:text-black hover:bg-gray-100  dark:hover:bg-gray-700 group">
            <i class="fas fa-chart-bar"></i>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         
         <li>
            <a href="<?php echo URLROOT ?>/dashboard/category" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-black dark:hover:bg-gray-700 group">
            <i class="fas fa-th-large "></i> 
               <span class="flex-1 ms-3 whitespace-nowrap">Category</span>
            </a>
         </li>
         <li>
            <a href="<?php echo URLROOT ?>/dashboard/tag" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-black dark:hover:bg-gray-700 group">
               <i class="fas fa-tags"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Tag</span>
               </a>
         </li>
         <li>
            <a href="<?php echo URLROOT ?>/dashboard/wiki" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-black dark:hover:bg-gray-700 group">
            <i class="fas fa-file-alt text-2xl"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Wiki</span>
            </a>
         </li>
        
         <li class="">
            
            <form method="post"  action="<?php echo URLROOT ?>/dashboard/logout" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group mt-16">
            <i class="fas fa-sign-out-alt"></i> 
               <input type="submit" name="logout" class="flex-1 ms-3 whitespace-nowrap" value="logout">
            </form>
         </li>
        
      </ul>
   </div>
</aside>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>