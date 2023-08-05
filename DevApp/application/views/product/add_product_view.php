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
                    <img class="sm:w-[300px] w-[50px]" src="<?= base_url() ?>/dist/img/abk3.png" alt="">
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
                                href="<?php echo site_url('product');?>">PRODUK</a>
                        </li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('Transaction');?>">TRANSAKSI</a></li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('Purcase');?>">KOLAKAN</a></li>
                        <li class="text-center sm:p-4 p-1 hover:bg-primary"><a class="hover:text-white"
                                href="<?php echo site_url('report');?>">KEUNTUNGAN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <body>
            <div class=" w-full mx-auto  bg-blue-200 mt-3 ml-1 mr-1 h-[650px] border rounded-md shadow-md ">
                <form
                    class="sm:mx-auto overflow-hidde  bg-white sm:mt-10 relative  w-auto mt-6 h-[90%] sm:w-[700px] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm shadow-white rounded-md group"
                    action="<?= site_url('product/save_product'); ?>" method="post">
                    <h1 class="sm:text-xl text-base font-bold text-center py-3 bg-bg2">TAMBAH BARANG BARU</h1>
                    <br>
                    <div>
                        <div>
                            <label class="font-bold sm:text-lg text-sm" for="SKU">KODE BARANG</label>
                            <br>
                            <input
                                class="mt-2 sm:text-lg text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="text" name="SKU" id="SKU" placeholder="BJR-TBL055-PNJ6">
                        </div>
                        <div>
                            <label class="font-bold sm:text-lg text-sm" for="productName">NAMA BARANG</label>
                            <br>
                            <input
                                class="mt-2 sm:text-lg text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="text" name="productName" id="productName" placeholder="Baja Ringan 65">
                        </div>
                        <div>
                            <label class="font-bold sm:text-lg text-sm" for="productDescription">DESKRIPSI
                                BARANG</label>
                            <br>
                            <input
                                class="mt-2 sm:text-lg text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="text" name="productDescription" id="productDescription"
                                placeholder="Baja Ringan lebar 65 panjang 70">
                        </div>
                        <div>
                            <label class="font-bold sm:text-lg text-sm" for="sellingPrice">HARGA JUAL</label>
                            <br>
                            <input
                                class="mt-2 sm:text-lg text-sm appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="number" name="sellingPrice" id="sellingPrice" value="1000" min="1000">
                        </div>
                        <br>
                    </div>

                    <button
                        class="sm:text-lg text-sm mb-3 font-bold px-[50px] text-white py-2 w-full rounded-sm bg-blue-700 hover:bg-primary"
                        type="submit">Submit</button>
                    <button
                        class="sm:text-lg w-full text-sm font-bold px-[100px] text-white py-2 rounded-sm bg-red-700 hover:bg-primary">
                        <a href="<?= base_url() ?>product">kembali</a>
                    </button>

                </form>
            </div>
        </body>
        <script src="<?= base_url() ?>/dist/js/script.js"></script>

</html>