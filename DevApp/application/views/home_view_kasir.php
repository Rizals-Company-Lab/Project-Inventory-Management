<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="p-5  bg-dark sm:relative ml-1 mr-1 mt-2 mx-auto w-auto h-auto sm:h-auto border rounded-md shadow-md">
        <!-- homepage -->

        <div
            class="relative overflow-hidden flex sm:w-auto p-1 sm:bg-white h-[100px] sm:h-[400px] rounded-md border-white shadow-md">
            <div
                class="absolute overflow-hidden flex sm:w-[99%] sm:bg-dark  h-[10px] sm:h-[350px] rounded-md border-white shadow-md">
            </div>


            <img class="w-[100px] sm:w-[300px] mr-3 -mt-5 sm:h-[300px] h-[100px] sm:absolute z-10 sm:ml-[74%] sm:-mt-2 "
                src="<?= base_url() ?>/dist/img/abk3.png" alt="">
            <a class="bg-yellow-300 hover:bg-yellow-600 z-10 sm:absolute sm:ml-[90%] rounded-md text-white ml-20 sm:mt-3 h-10 py-2 px-5 sm:py-2 sm:px-5"
                href="<?= base_url() ?>Auth/logout">LOGOUT</a>

            <img class="sm:flex hidden gambar sm:ml-3 sm:w-[500px] w-[100px] h-[100px] sm:h-[500px]"
                src="<?= base_url() ?>/dist/img/gam.jpg" alt="gambar">
        </div>
        <h1 class="sm:absolute -mt-10 ml-20 text-white sm:-mt-[350px] sm:text-[50px] sm:ml-[570px]">ALI BAJA RINGAN
            <br>
            <br>
            <p class="sm:text-[40px] -ml-12 sm:ml-[50px]">MENYEDIAKAN BERBAGAI MACAM
                <br>BAJA , PLAVON , GALVALUM
            </p>
        </h1>
        <div class="sm:flex hidden gambar ml-20 blur-lg bg-secondary/25 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute">
        </div>
        <div class="sm:flex hidden gambar ml-10 blur-lg bg-white/50 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute">
        </div>
        <div class=" sm:flex hidden gambar blur-lg bg-white/80 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>

        <!--end homepage -->



        <div class=" sm:flex justify-center mt-7 mb-5">
            <!-- card1 -->

            <a class=" flex sm:w-96 ml-3 hover:-mt-3 w-auto flex-col rounded-xl mx-auto mb-3 hover:backdrop-blur-sm hover:bg-white/95  bg-white bg-clip-border text-gray-700 shadow-md group"
                href="<?= base_url() ?>product">
                <div>
                    <div class="p-6 ">
                        <h5
                            class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            <i class="fa fa-table w-10" aria-hidden="true"></i>
                            MENU BARANG
                        </h5>
                        <p
                            class="block font-sans text-base font-light leading-relaxed text-inherit antialiased group-hover:text-blue-500">
                            menampilkan Daftar Barang Penjualan </p>
                    </div>
                    <div class="p-6 pt-0">

                        <button
                            class="select-none rounded-lg bg-bg2 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" data-ripple-light="true">
                            Details
                        </button>

                    </div>
                </div>
            </a>

            <!-- card2 -->
            <a class=" flex sm:w-96 ml-3 w-auto flex-col rounded-xl mx-auto mb-3 hover:backdrop-blur-sm hover:bg-white/95  bg-white bg-clip-border text-gray-700 shadow-md group"
                href="<?= base_url() ?>transaction">
                <div>
                    <div class="p-6 hover:mt-3">
                        <h5
                            class="mb-2 block font-sans sm:text-xl text-base font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            <i class="fa fa-cart-arrow-down w-10 " aria-hidden="true"></i>
                            MENU PENJUALAN
                        </h5>
                        <p
                            class="block font-sans text-base font-light leading-relaxed text-inherit antialiased group-hover:text-blue-500">
                            menampilkan Daftar riwayat transaksi dan Tambah transaksi baru </p>
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <button
                            class="select-none rounded-lg bg-bg2 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" data-ripple-light="true">
                            Details
                        </button>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <footer
        class=" w-full items-center gap-y-6 gap-x-12 border-t border-blue-gray-50 py-6 text-center md:justify-between">
        <p class="block font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
            © 2023 Material ALI Baja Galvalum Plavon
        </p>
    </footer>
    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>