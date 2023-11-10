<body>
    <div class="w-full px-5">
        <form
            class="sm:mx-auto overflow-hidde bg-white sm:mt-5 relative  w-auto mt-6 h-[90%] sm:w-full sm:h-[90%] p-3 sm:ml-3 sm:mr-3  shadow-sm shadow-white rounded-md group"
            action="<?= site_url('purcase/save_purcase'); ?>" method="post">
            <h1 class="sm:text-xl font-bold text-center mb-3 py-3 bg-bg2">TAMBAH BARANG BARU</h1>
            <label class="font-bold sm:text-lg text-sm " for="">KODE BARANG</label>
            <div>
                <select
                    class="mt-2 appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="SKU" id="skuSelect">
                    <?php foreach ($product->result() as $singleView): ?>
                        <option
                            class="mt-2 appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            value="<?= $singleView->SKU ?>">
                            <?= $singleView->SKU ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="font-bold sm:text-lg text-sm" for="">NAMA BARANG</label>
                <select
                    class="mt-2 appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    name="productName" id="productNameSelect">
                    <?php foreach ($product->result() as $singleView): ?>
                        <option
                            class="mt-2 appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            value="<?= $singleView->SKU ?>">
                            <?= $singleView->productName ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="font-bold sm:text-lg text-sm" for=""> HARGA PEMBELIAN</label>
                <input required
                    class="mt-2 appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" min="1000" name="buyingPrice" id="buyingPrice" value="">
            </div>
            <div class="sm:flex ">
                <div>
                    <label class="font-bold sm:text-lg text-sm" for=""> JUMLAH PEMBELIAN</label>

                    <input
                        class="mt-2 appearance-none  w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="number" min="1" name="qtyPurcase" id="qtyPurcase" value="1">
                </div>
                <div class="sm:ml-5">
                    <label class="font-bold sm:text-lg text-sm" for="">TOTAL</label>
                    <br>
                    <br>
                    <span class=" bg-gray-200 rounded py-2 px-5  leading-tight focus:outline-none focus:bg-white"
                        id="total"></span>
                </div>
                <!-- <div class="sm:ml-[100px] mt-2">
                    <label class="font-bold sm:text-lg text-sm" for=""> TANGGAL PEMBELIAN</label>
                    <input
                        class="mt-2 appearance-none block w-full bg-gray-200 text-gray-700 border border-blue-500 rounded py-3 px-4  mb-3 leading-tight focus:outline-none focus:bg-white"
                        type="date" name="purcaseTimestamp" id="purcaseTimestamp">
                </div> -->
            </div>


            <button
                class="sm:text-lg mb-3 text-base font-bold px-[50px] text-white py-2 w-full rounded-sm bg-blue-700 hover:bg-primary"
                type="submit">Submit</button>

            <br>
        </form>
    </div>
</body>
<script src="<?= base_url() ?>/dist/js/script.js"></script>
<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        calculateTotal();
        // Membuat fungsi untuk menghitung total
        function calculateTotal() {
            var buyingPrice = parseInt($("#buyingPrice").val());
            var qtyPurcase = parseInt($("#qtyPurcase").val());

            // Menghitung total
            if (buyingPrice > 0) {

                var total = buyingPrice * qtyPurcase;
            } else {

                var total = 0;
            }

            // Menampilkan total pada elemen dengan id "total"
            $("#total").text(total);
        }

        // Memanggil fungsi calculateTotal saat nilai buyingPrice atau qtyPurcase berubah
        $("#buyingPrice, #qtyPurcase").change(function () {
            calculateTotal();
        });
    });

    // Ketika nilai elemen select dengan id "productNameSelect" berubah
    $("#productNameSelect").change(function () {
        // Mendapatkan nilai yang dipilih
        var selectedValue = $(this).val();

        // Mengatur nilai elemen select dengan id "skuSelect" sesuai dengan nilai yang dipilih
        $("#skuSelect").val(selectedValue);
    });

    // Ketika nilai elemen select dengan id "skuSelect" berubah
    $("#skuSelect").change(function () {
        // Mendapatkan nilai yang dipilih
        var selectedValue = $(this).val();

        // Mengatur nilai elemen select dengan id "productNameSelect" sesuai dengan nilai yang dipilih
        $("#productNameSelect").val(selectedValue);
    });
</script>

</html>