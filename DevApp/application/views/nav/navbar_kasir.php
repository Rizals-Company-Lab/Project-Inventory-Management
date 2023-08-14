<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-slate-200">
    <!-- Navbar star -->
    <div class="sm:flex">
        <nav class="mt-4 ml-4 mr-4 w-auto">
            <div class=" justify-around border rounded-md shadow-md bg-dark text-white">
                <div class="flex justify-between">
                    <img class="sm:w-[300px] w-[80px]" src="<?= base_url() ?>/dist/img/abk3.png" alt="">
                    <div class="flex items-center relative px-4 sm:hidden">
                        <button class="" id="tombolMenu" name="tombolMenu" type="button">
                            <span class="tombol-line transition duration-300 ease-in-out origin-top-left"></span>
                            <span class="tombol-line"></span>
                            <span class="tombol-line transition duration-300 ease-in-out origin-bottom-left"></span>
                        </button>
                    </div>
                </div>
                <div class="sm:h-[400px]">
                    <ul class=" sm:flex flex-col hidden sm:border-none sm:rounded-none sm:shadow-none rounded-md shadow-md h-auto  ml-2 mr-2"
                        id="hilang" nama="hilang">
                        <li class="text-center sm:p-4 p-1 hover:bg-primary "><a class="hover:text-white"
                                href="<?= base_url('Home') ?>">HOME</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary "><a class="hover:text-white "
                                href="<?php echo site_url('product'); ?>">PRODUK</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('Transaction'); ?>">TRANSAKSI</a></li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('Purcase'); ?>">KOLAKAN</a></li>
                        <!-- <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('report'); ?>">KEUNTUNGAN</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>