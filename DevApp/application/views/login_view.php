<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body>
    <div class=" w-auto bg-dark mx-auto mt-3 ml-1 mr-1 h-[600px] border rounded-md shadow-md">
        <form
            class="sm:mx-auto overflow-hidden sm:mt-10 relative bg-white/25   backdrop-blur-lg w-auto mt-6 h-[500px] sm:w-[500px] sm:h-[500px] p-3 ml-3 mr-3  shadow-sm shadow-white rounded-md group"
            action="<?php echo site_url('login/save');?>" method="post">
            <div
                class="duration-300 ease-in-out absolute ml-[50px] group-hover:-mt-[200px] -mt-[350px] -z-10 w-[500px] h-[500px] rounded-full bg-dark">
            </div>
            <h1 class="mt-10 text-white text-center text-xl">LOGIN</h1>
            <div class="mt-10 px-6 text-white">
                <div class="p-2 ">
                    <label>Username</label><br>
                    <input class="mt-2 mb-4 w-full h-[40px] border rounded-md shadow-md" type="text" id="username"
                        name="login_username" placeholder="   username">
                </div>
                <div class="p-2 ">
                    <label>password</label><br>
                    <input class="mt-2 mb-4 w-full  h-[40px] border rounded-md shadow-md" type="text" id="password"
                        name="login_password" placeholder="   password">
                </div>
                <div class="grid items-center mt-10">
                    <button class=" px-[50px] py-1  rounded-sm bg-blue-700 hover:bg-primary" id="login"
                        type="submit">Login</button><br>
                    <button class="" type="checkbox">RememberMe</button>
                </div>
            </div>
            <div
                class="duration-300 ease-in-out -z-10 absolute group-hover:w-[600px] group-hover:h-[600px]  -ml-[100px] group-hover:-mt-[50px] mt-[10px] w-[500px] h-[500px] rounded-full bg-dark">
            </div>
        </form>

    </div>
</body>

</html>