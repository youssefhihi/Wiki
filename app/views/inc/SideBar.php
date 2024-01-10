<!-- <body class="font-sans bg-gray-100">
    <div id="MenuDashbord" class="bg-black text-white h-screen w-64 fixed top-0 left-0 rounded-r-2xl">
        <div class="p-4">
            <h1 class="text-2xl font-serif font-semibold"><i class="fas fa-chart-bar"></i> Dashboard</h1>
        </div>
        <nav class="space-y-4 mt-5 flex flex-col ">
            <a href="#" class="p-4 hover:bg-gray-700"><i class="fas fa-home"></i> Dashboard</a>
            <a href="#" class="p-4 hover:bg-gray-700"><i class="fas fa-th-large "></i> categories</a>
            <a href="#" class="p-4 hover:bg-gray-700"><i class="fas fa-tags"></i>tags</a>
                       
            <a href="#" class="p-4 hover:bg-gray-700"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>
   
    <div class="ml-64 ">   
        <i onclick="OpenDashbordMenu()" class="fas fa-bars text-3xl text-black p-4 cursor-pointer"></i>   
        <div class=" text-center">           
                <h1 class="text-2xl font-semibold">Welcome Youssef Hihi</h1>
        </div> -->
        
<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-500 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">

         
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fas fa-chart-bar"></i>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fas fa-th-large "></i> 
               <span class="flex-1 ms-3 whitespace-nowrap">Category</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <i class="fas fa-tags"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Tag</span>
               </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fas fa-file-alt text-2xl"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Wiki</span>
            </a>
         </li>
        
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fas fa-sign-out-alt"></i> 
               <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
            </a>
         </li>
        
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
  
</div>
