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

    <div class="p-5  bg-dark sm:relative ml-4 mr-4 mt-3 mx-auto w-auto h-auto sm:h-[620px] border rounded-md shadow-md">
        <!-- homepage -->
        <div
            class="relative overflow-hidden flex sm:w-auto p-1 bg-white h-[300px] sm:h-[450px] rounded-md border-white shadow-md">
            <img class="gambar sm:ml-[30px] sm:w-[500px] w-[300px] h-[300px] sm:h-[500px]"
                src="<?= base_url() ?>/dist/img/gam.jpg" alt="gambar">
        </div>
        <div class="gambar ml-20 blur-lg bg-secondary/25 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>
        <div class="gambar ml-10 blur-lg bg-white/50 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>
        <div class="gambar blur-lg bg-white/80 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>
        <!--end homepage -->

        <div class="sm:w-[500px] sm:h-[300px] ml-[700px] absolute bg-bg rounded-md -mt-[400px]">
            <div class="product"></div>
        </div>
    </div>

    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>