<?php require APPROOT . '/views/inc/header.php'; 

?>


<body class="bg-gray-100 h-screen flex items-center justify-center">

<div id="signup" class="hidden bg-white p-6 rounded-md shadow-md w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center mb-3">Create an Account</h2>

    <form id="form" method="post" action="<?php echo URLROOT ?>/Register/signupA" >
        <div class="mb-4">
            <label for="username" class="block text-gray-600 text-sm font-semibold mb-2">Username</label>
            <input type="text" id="username" name="name" class="w-full p-3 border rounded-md" placeholder="Enter your username" >
            <p id="userNameRegex"  class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">Name not valid </p>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-600 text-sm font-semibold mb-2">Email Address</label>
            <input type="text" id="email" name="email" class="w-full p-3 border rounded-md" placeholder="Enter your email" >
            <p id="emailRegex"  class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">email not valid </p>
           

        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm font-semibold mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full p-3 border rounded-md" placeholder="Enter your password" >
            <p id="passwordRegex"  class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">please use at least 8 characteres </p>
        </div>

        <div class="mb-6">
            <label for="confirmPassword" class="block text-gray-600 text-sm font-semibold mb-2">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="w-full p-3 border rounded-md" placeholder="Confirm your password" >
            <p id="confirmPasswordRegex"  class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">Password doesn't match</p>
        </div>
        <input type="submit" name="signup" value="Sign Up" class="w-full border-2 text-xl border-black bg-black text-white p-2 rounded-md hover:bg-white hover:text-black">
        </form>

    <p class="text-gray-600 text-sm mt-4 text-center">Already have an account? <span onclick="login()" class="text-indigo-700 cursor-pointer">Login here</span></p>
</div>

<div id="login" class="bg-white p-8 rounded-md shadow-md w-full max-w-md">
    <h2 class="text-2xl font-semibold text-center mb-6">Login to Your Account</h2>

    <form id="loginForm" method="post" action="<?php echo URLROOT ?>/Register/loginA">
        <div class="mb-4">
            <label for="email" class="block text-gray-600 text-sm font-semibold mb-2"> Email</label>
            <input type="email"  id="loginEmail"  name="email" class="w-full p-3 border rounded-md" placeholder="Enter your  email" >
            <p id="emailLoginRegex"class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">Invalid email format</p>
           
        
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-600 text-sm font-semibold mb-2">Password</label>
            <input type="password" id="loginPassword" name="password" class="w-full p-3 border rounded-md" placeholder="Enter your password" >
            <p id="passwordLoginRegex" class=" hidden text-red-400 border-b-2 border-red-500 font-mono pl-3 ">Invalid password format</p>
            <?php
            if(isset($data['error'])){
                ?>
            <p class=" text-red-400 border-b-2 border-red-500 font-mono pl-3 "><?php echo $data['error'] ; ?> </p>
                <?php
            }
                ?>

        </div>

        <input type="submit" name="login" value="Login" class="w-full border-2 text-xl border-black bg-black text-white p-2 rounded-md hover:bg-white hover:text-black">
        </form>

<p class="text-gray-600 text-sm mt-4 text-center">Don't have an account? <span onclick="signup()" class="text-indigo-700 cursor-pointer">Sign up here</span></p>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
