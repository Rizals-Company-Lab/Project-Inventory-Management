<body>
    <div class=" w-full mx-auto  bg-blue-200 mt-3 ml-1 mr-1 h-full border rounded-md shadow-md ">
        <form
            class="sm:mx-auto overflow-hidde  bg-white sm:mt-5 relative  w-auto mt-6 h-[90%] sm:w-[700px] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm shadow-white rounded-md group"
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
                <div class="sm:flex justify-between font-bold">
                    <div>
                        <label for="sellingPrice">HARGA JUAL UMUM</label>
                        <input
                            class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" name="sellingPrice" id="sellingPrice" min="1" value="">
                    </div>
                    <div class="sm:ml-5">
                        <label for="distributorPrice">HARGA JUAL DISTRIBUTOR</label>
                        <input
                            class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" name="distributorPrice" id="distributorPrice" min="1" value="">
                    </div>
                    <div class="sm:ml-5">
                        <label for="materialPrice">HARGA JUAL MATERIAL</label>
                        <input
                            class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" name="materialPrice" id="materialPrice" min="1" value="">
                    </div>
                    <div class="sm:ml-5">
                        <label for="productionPrice">HARGA JUAL PRODUKSI</label>
                        <input
                            class="mt-2 appearance-none block  w-full mx-auto bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            type="number" name="productionPrice" id="productionPrice" min="1" value="">
                    </div>
                </div>
                <br>
            </div>

            <button
                class="sm:text-lg text-sm mb-3 font-bold px-[50px] text-white py-2 w-full rounded-sm bg-blue-700 hover:bg-primary"
                type="submit">Submit</button>


        </form>
    </div>
</body>
<script src="<?= base_url() ?>/dist/js/script.js"></script>

</html>