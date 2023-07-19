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
            <div class=" justify-around border rounded-md shadow-md  bg-dark text-white">
                <div class=" justify-between">
                    <img class="w-[300px]" src="<?= base_url() ?>/dist/img/abk3.png" alt="">
                </div>
                <div class="h-[400px]">
                    <ul class="  sm:border-none sm:rounded-none sm:shadow-none border rounded-md shadow-md h-auto  ml-2 mr-2"
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
                                href="<?php echo site_url('');?>">KONTAK</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <body>
            <div class="bg-slate-300 mt-3 w-full font-semibold">
                <h1 class="bg-yellow-300 text-center text-2xl py-3">UPDATE DATA BARANG TOKO</h1><br>
                <form class="bg-white" action="<?= site_url('product/update_product'); ?>" method="post">
                    <div class="ml-[100px] py-5 mr-[100px]">
                        <label class="" for="SKU">KODE BARANG</label>
                        <input
                            class="mt-2 appearance-none block mx-auto w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="SKU" id="SKU" value="<?= $product->SKU ?>" disabled>
                        <input type="hidden" name="SKU" id="SKU" value="<?= $product->SKU ?>">
                        <br>
                        <label class="" for="productName">NAMA BARANG</label>
                        <input
                            class="mt-2 appearance-none block mx-auto  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="productName" id="productName" value="<?= $product->productName ?>">
                        <br>

                        <label for="productDescription">DESKRIPSI BARANG</label>
                        <input
                            class="mt-2 appearance-none block mx-auto  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="text" name="productDescription" id="productDescription"
                            value="<?= $product->productDescription ?>">

                        <br>
                        <label for="sellingPrice">HARGA</label>
                        <input
                            class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" name="sellingPrice" id="sellingPrice" min="1"
                            value="<?= $product->sellingPrice ?>">

                        <br>
                        <button
                            class="text-lg font-bold px-[50px] text-white py-2 w-full rounded-sm bg-blue-700 hover:bg-primary"
                            type="submit" name="save" id="save" value="save">Simpan</button>
                    </div>

                </form>
            </div>

            <script src="<?= base_url() ?>/dist/js/script.js"></script>
        </body>

</html>