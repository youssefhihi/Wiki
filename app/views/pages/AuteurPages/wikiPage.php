<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/burgerMenu.php'; ?>

<?php
if (empty($data['oneWiki'])) {
    header('location:' . APPROOT . 'AuteurPages/home.php');
    exit(); 
}

foreach($data['oneWiki'] as $wiki) {
?>
<div class="p-10 border rounded-md mb-8 bg-white">
    <div class="flex items-center mb-4">
        <!-- Author Image -->
        <img class="w-14 h-14 rounded-full mr-4" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getAuthor()->getImage()); ?>" alt="Author Image">
        <div class="text-xl">
            <p class="text-gray-600"><?php echo $wiki->getNameAuthor()->getUsername(); ?></p>
            <p class="text-gray-400">Published on <?php echo $wiki->getDate(); ?></p>
        </div>
    </div>
    <!-- Wiki Title -->
    <h2 class="text-3xl font-semibold text-gray-800 mb-2"><?php echo $wiki->getTitle(); ?></h2>
    <div class="flex">
        <div class="w-1/2">
            <!-- Wiki Description -->
            <p class="text-gray-600"><?php echo $wiki->getTexte(); ?></p>
        </div>
        <div class="w-1/2 pl-4">
            <!-- Wiki Image -->
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($wiki->getImageP()); ?>" alt="Wiki Image" class="w-full rounded-xl object-cover" />
        </div>
    </div>
</div>
<?php } ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
