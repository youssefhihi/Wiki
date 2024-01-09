<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/SideBar.php'; ?>

      
        <div class="p-8 flex flex-wrap gap-16">
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-users text-2xl"></i> Users</p>
                <p class="text-2xl font-semibold"><?php echo $data['UserCount'];?></p>
           </div>
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-file-alt text-2xl"></i> Wikis</p>
                <p class="text-2xl font-semibold"><?php // echo $data['wikiCount'];?> </p>
           </div>
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-th-large text-2xl"></i> Categories</p>
                <p class="text-2xl font-semibold"><?php echo $data['CategoryCount'];?></p>
           </div>
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-300 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-tags text-2xl"></i> Tags</p>
                <p class="text-2xl font-semibold"><?php echo $data['TagCount'];?></p>
           </div>
          
           
        </div>
    </div>

</body>
</html>
