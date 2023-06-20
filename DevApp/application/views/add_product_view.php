<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="<?= base_url() ?>/dist/css/output.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>
            <center>ADD NEW PRODUCT</center>
        </h1>
        <form class="" action="<?php echo site_url('product/save');?>" method="post">
            <div class="w-auto top-5 mx-auto">
                <label>Nama Product</label>
                <input class="" type="text" name="product_name" placeholder="product name">
            </div>
            <div class="form-group">
                <label>price</label>
                <input class="form-control" type="text" name="product_price" placeholder="Price">
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</body>

</html>