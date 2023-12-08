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

                <label for="sellingPrice">HARGA JUAL UMUM</label>
                <input
                    class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" name="sellingPrice" id="sellingPrice" min="1" value="<?= $product->sellingPrice ?>">
                <label for="distributorPrice">HARGA JUAL DISTRIBUTOR</label>
                <input
                    class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" name="distributorPrice" id="distributorPrice" min="1"
                    value="<?= $product->distributorPrice ?>">
                <label for="materialPrice">HARGA JUAL MATERIAL</label>
                <input
                    class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" name="materialPrice" id="materialPrice" min="1"
                    value="<?= $product->materialPrice ?>">
                <label for="productionPrice">HARGA JUAL PRODUKSI</label>
                <input
                    class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" name="productionPrice" id="productionPrice" min="1"
                    value="<?= $product->productionPrice ?>">

                <button
                    class="sm:text-lg mb-3 text-base font-bold px-[50px] text-white py-2 w-full rounded-sm bg-blue-700 hover:bg-primary"
                    type="submit" name="save" id="save" value="save">Simpan</button>


            </div>

        </form>
    </div>

    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>