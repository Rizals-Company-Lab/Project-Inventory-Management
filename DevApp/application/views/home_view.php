<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar star -->
    <!-- <nav class="mt-4 ml-4 mr-4 w-auto">
        <div class="sm:flex justify-around border rounded-md shadow-md">
            <div class="flex justify-between">
                <h1 class=" p-5">LOGO</h1>
                <div class="flex items-center relative px-4 sm:hidden">
                    <button class="" id="tombolMenu" name="tombolMenu" type="button">
                        <span class="tombol-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="tombol-line"></span>
                        <span class="tombol-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
            </div>
            <div class="sm:flex  ">
                <ul class="sm:flex  sm:border-none sm:rounded-none sm:shadow-none border rounded-md shadow-md hidden  ml-2 mr-2 mb-2;"
                    id="hilang" nama="hilang">
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="#">HOME</a>
                    </li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="#">PRODUK</a>
                    </li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                            href="">TRANSAKSI</a></li>
                    <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white" href="">KONTAK</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!-- navbar end -->

    <div class="p-5 sm:relative ml-4 mr-4 mt-3 mx-auto w-auto h-auto sm:h-[620px] border rounded-md shadow-md">
        <!-- homepage -->
        <div class="relative flex w-auto p-1 bg-bg h-[300px] sm:h-[450px] rounded-md border-white shadow-md">
            <img class="gambar sm:ml-[30px] sm:w-[500px] w-[300px] h-[300px] sm:h-[500px]"
                src="<?= base_url() ?>/dist/img/gam.jpg" alt="gambar">


        </div>
        <!--end homepage -->

        <div class="card">
            <div
                class="flex p-4 mt-4 sm:w-[400px] bg-secondary2/80 hover:bg-bg2/100 backdrop-blur-md w-auto h-[200px] rounded-md shadow-md">
                <div class=" bg-bg w-[50px] h-[50px]"></div>
                <div class="ml-4">
                    <h1>MENU BARANG</h1>
                    <p class="text-sm p-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia amet, tempore
                        temporibus sit
                        nulla, placeat minima voluptate quidem magni!</p>
                    <button class="bg-primary rounded-md shadow-md px-6 py-1 ml-[10px]"><a href="#">Detail
                            Barang</a></button>
                </div>
            </div>
            <div class="flex p-4 mt-4 sm:w-[400px] bg-bg2 w-auto h-[200px] rounded-md shadow-md">
                <div class=" bg-bg"></div>
                <div class="ml-4">
                    <h1>MENU BARANG</h1>
                    <p class="text-sm p-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia amet, tempore
                        temporibus sit
                        nulla, placeat minima voluptate quidem magni!</p>
                    <button class="bg-primary rounded-md shadow-md px-6 py-1 ml-[10px]"><a href="#">Detail
                            Barang</a></button>
                </div>
            </div>
            <div class="flex p-4 mt-4 sm:w-[400px] bg-bg2 w-auto h-[200px] rounded-md shadow-md">
                <div class=" bg-bg"></div>
                <div class="ml-4">
                    <h1>MENU BARANG</h1>
                    <p class="text-sm p-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia amet, tempore
                        temporibus sit
                        nulla, placeat minima voluptate quidem magni!</p>
                    <button class="bg-primary rounded-md shadow-md px-6 py-1 ml-[10px]"><a href="#">Detail
                            Barang</a></button>
                </div>
            </div>
        </div>

    </div>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>