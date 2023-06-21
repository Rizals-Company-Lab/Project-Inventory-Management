<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Purcasing</title>
</head>

<body>
    <form action="<?= site_url('product/save_product'); ?>" method="post">


        <label for="SKU">SKU</label>
        <input type="text" name="SKU" id="SKU" placeholder="BJR-TBL055-PNJ6">
        <label for="productName">productName</label>
        <input type="text" name="productName" id="productName" placeholder="Baja Ringan 65">
        <label for="productDescription">productDescription</label>
        <input type="text" name="productDescription" id="productDescription"
            placeholder="Baja Ringan lebar 65 panjang 70">
        <label for="sellingPrice">sellingPrice</label>
        <input type="number" name="sellingPrice" id="sellingPrice" value="1000" min="1000">


        <button type="submit">Submit</button>
    </form>
</body>

</html>