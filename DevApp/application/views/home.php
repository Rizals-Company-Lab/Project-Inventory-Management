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
    <nav class="mt-4 ml-2 mr-2">
        <div class="sm:flex justify-around border rounded-md shadow-md">
            <div class="flex justify-between">
                <h1 class=" p-5">LOGO</h1>
                <div class="flex items-center relative px-4 sm:hidden">
                    <button class="" id="tombolMenu" name="tombolMenu" type="button">
                        <span class="tombol-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="tombol-line"></span>
                        <span class="tombol-line duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                </div>
            </div>
            <div class="p-3" id="hilang" nama="hilang" class="sm:flex hidden">
                <ul class="sm:flex sm:border-none sm:rounded-none sm:shadow-none border rounded-md shadow-md ">
                    <li class="text-center sm:p-4 p-1"><a class="" href="#">HOME</a></li>
                    <li class="text-center sm:p-4 p-1"><a href="#">PRODUK</a></li>
                    <li class="text-center sm:p-4 p-1"><a href="">TRANSAKSI</a></li>
                    <li class="text-center sm:p-4 p-1"><a href="">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>