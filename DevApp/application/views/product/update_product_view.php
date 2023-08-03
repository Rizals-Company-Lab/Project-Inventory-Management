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
        <nav class="mt-4 sm:ml-4 sm:mr-4 w-auto">
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
            <div class="bg-slate-300  mt-3 w-full font-semibold">
                <h1 class="bg-yellow-300 text-center sm:text-2xl text-base py-3">UPDATE DATA BARANG TOKO</h1><br>
                <form class="bg-white" action="<?= site_url('product/update_product'); ?>" method="post">
                    <div class="sm:ml-[100px] ml-2 mr-2 sm:py-5 py-2 sm:mr-[100px]">
                        <label class="" for="SKU">KODE BARANG</label>
                        <input
                            class="mt-2 appearance-none block mx-auto w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="SKU" id="SKU" value="<?= $product->SKU ?>" disabled>
                        <input type="hidden" name="SKU" id="SKU" value="<?= $product->SKU ?>">
                        <label class="" for="productName">NAMA BARANG</label>
                        <input
                            class="mt-2 appearance-none block mx-auto  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="productName" id="productName" value="<?= $product->productName ?>">

                        <label for="productDescription">DESKRIPSI BARANG</label>
                        <input
                            class="mt-2 appearance-none block mx-auto  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="productDescription" id="productDescription"
                            value="<?= $product->productDescription ?>">

                        <label for="sellingPrice">HARGA</label>
                        <input
                            class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" name="sellingPrice" id="sellingPrice" min="1"
                            value="<?= $product->sellingPrice ?>">

                        <button
                            class="sm:text-lg mb-3 text-base font-bold px-[50px] text-white py-2 w-full rounded-sm bg-blue-700 hover:bg-primary"
                            type="submit" name="save" id="save" value="save">Simpan</button>
                        <button
                            class="sm:text-lg w-full text-sm font-bold px-[100px] text-white py-2 rounded-sm bg-red-700 hover:bg-primary">
                            <a href="<?= base_url() ?>product">kembali</a>
                        </button>
                    </div>

                </form>
            </div>

            <script src="<?= base_url() ?>/dist/js/script.js"></script>
        </body>

</html>