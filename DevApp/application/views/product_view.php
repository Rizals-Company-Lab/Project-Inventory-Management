<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<div class="container">
    <h1>
        <center>PRODUCT LIST</center>
    </h1>
    <a class="" href="<?php echo site_url('product/add_new');?>">ADD PRODUCT</a>
    <br>
    <br>
    <table class="">
        <thead>
            <tr>
                <th>NO</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $count = $row + 1;
                foreach (->result() as $row) :
                ?>
            <tr>
                <th>
                    <??>
                </th>
                <td><?php ?></td>
                <td><?php ?></td>
                <td>
                    <a class="" href="<?php echo site_url('product/get_edit/'.);?>">Update</a>
                    <a class="" href="<?php echo site_url('product/get_delete/'.);?>">Delete</a>
                </td>
            </tr>
            <tr>
                <?php
                $count++;
                endforeach ;
                ?>
            </tr>
        </tbody>
    </table>
    <!-- pagination -->
    <div>
        <?= $pagination; ?>
    </div>
</div>

<body>

</body>

</html>