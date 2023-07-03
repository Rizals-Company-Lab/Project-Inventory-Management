<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body>

    <form action="<?= site_url('product/update_product'); ?>" method="post">
        <label for="SKU">SKU</label>
        <input type="text" name="SKU" id="SKU" value="<?= $product->SKU ?>" disabled>
        <input type="hidden" name="SKU" id="SKU" value="<?= $product->SKU ?>">
        <br>
        <label for="productName">productName</label>
        <input type="text" name="productName" id="productName" value="<?= $product->productName ?>">
        <br>

        <label for="productDescription">productDescription</label>
        <input type="text" name="productDescription" id="productDescription"
            value="<?= $product->productDescription ?>">

        <br>
        <label for="sellingPrice">sellingPrice</label>
        <input type="number" name="sellingPrice" id="sellingPrice" min="1" value="<?= $product->sellingPrice ?>">

        <br>
        <button type="submit" name="save" id="save" value="save">Simpan</button>


    </form>

    <script src="<?= base_url() ?>/dist/js/script.js"></script>
</body>

</html>