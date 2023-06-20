<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Purcasing</title>
</head>

<body>
    <form action="<?= site_url('purcase/save_purcase'); ?>" method="post">
        <label for="">SKU</label>
        <select name="SKU" id="skuSelect">
            <?php foreach ($product->result() as $singleView): ?>
                <option value="<?= $singleView->SKU ?>">
                    <?= $singleView->SKU ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="">Nama Barang</label>
        <select name="productName" id="productNameSelect">
            <?php foreach ($product->result() as $singleView): ?>
                <option value="<?= $singleView->SKU ?>">
                    <?= $singleView->productName ?>
                </option>
            <?php endforeach; ?>
        </select>


        <label for=""> Harga Beli</label>


        <input type="number" min="1000" name="buyingPrice" id="buyingPrice" value="1000">
        <label for=""> Jumlah Beli</label>
        <input type="number" min="1" name="qtyPurcase" id="qtyPurcase" value="1">
        <label for="">Total</label>
        <span id="total"></span>
        <label for=""> Tanggal Beli</label>
        <input type="date" name="purcaseTimestamp" id="purcaseTimestamp">


        <button type="submit">Submit</button>
    </form>
</body>

<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>
<script>$(document).ready(function () {
        calculateTotal();
        // Membuat fungsi untuk menghitung total
        function calculateTotal() {
            var buyingPrice = parseInt($("#buyingPrice").val());
            var qtyPurcase = parseInt($("#qtyPurcase").val());

            // Menghitung total
            var total = buyingPrice * qtyPurcase;

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