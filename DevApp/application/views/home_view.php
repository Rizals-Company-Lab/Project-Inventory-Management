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
            class="relative overflow-hidden flex sm:w-auto p-1 bg-white h-[200px] sm:h-[400px] rounded-md border-white shadow-md">
            <div
                class="absolute overflow-hidden flex sm:w-[99%] bg-dark  h-[200px] sm:h-[350px] rounded-md border-white shadow-md">
            </div>
            <img class="w-[300px] h-[300px] absolute z-10 sm:ml-[1000px] sm:-mt-14 "
                src="<?= base_url() ?>/dist/img/abk3.png" alt="">
            <img class="gambar sm:ml-[30px] sm:w-[500px] w-[200px] h-[200px] sm:h-[500px]"
                src="<?= base_url() ?>/dist/img/gam.jpg" alt="gambar">
        </div>
        <div class="gambar ml-20 blur-lg bg-secondary/25 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>
        <div class="gambar ml-10 blur-lg bg-white/50 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>
        <div class="gambar blur-lg bg-white/80 sm:w-[300px] sm:h-[300px] -mt-[300px] absolute"></div>
        <!--end homepage -->



        <div class=" sm:flex justify-around mt-7 ">
            <!-- card1 -->
            <div
                class=" flex sm:w-96 hover:-mt-3 w-auto flex-col rounded-xl mx-auto mb-3 hover:backdrop-blur-sm hover:bg-white/95  bg-white bg-clip-border text-gray-700 shadow-md group">
                <div class="p-6 ">
                    <h5
                        class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        <i class="fa fa-table w-10" aria-hidden="true"></i>
                        MENU BARANG
                    </h5>

                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url() ?>product">
                        <button
                            class="select-none rounded-lg bg-bg2 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" data-ripple-light="true">
                            Details
                        </button>
                    </a>
                </div>
            </div>

            <!-- card2 -->
            <div
                class=" flex sm:w-96 hover:-mt-3 w-auto flex-col rounded-xl mx-auto mb-3 hover:backdrop-blur-sm hover:bg-white/95  bg-white bg-clip-border text-gray-700 shadow-md group">
                <div class="p-6 ">
                    <h5
                        class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        <i class="fa fa-cart-arrow-down w-10 " aria-hidden="true"></i>
                        MENU PENJUALAN
                    </h5>

                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url() ?>transaction">
                        <button
                            class="select-none rounded-lg bg-bg2 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" data-ripple-light="true">
                            Details
                        </button>
                    </a>
                </div>
            </div>
            <!-- card3 -->
            <div
                class=" flex sm:w-96 hover:-mt-3 w-auto flex-col rounded-xl mx-auto mb-3 hover:backdrop-blur-sm hover:bg-white/95  bg-white bg-clip-border text-gray-700 shadow-md group">
                <div class="p-6 ">
                    <h5
                        class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        <i class="fa fa-list w-10" aria-hidden="true"></i>
                        MENU KOLAKAN
                    </h5>

                </div>
                <div class="p-6 pt-0">
                    <a href="<?= base_url() ?>purcase">
                        <button
                            class="select-none rounded-lg bg-bg2 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" data-ripple-light="true">
                            Details
                        </button>
                    </a>
                </div>
            </div>
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