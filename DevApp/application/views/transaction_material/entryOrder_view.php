<body>
    <?php
    if (isset($idOrderTransaction)):
        ?>

        <form
            class="sm:mx-auto  sm:mt-5 relative mb-5 w-auto mt-0 h-full sm:w-[75%] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm border shadow-white rounded-md group"
            action="<?= site_url('transaction_material/save_transaction_update'); ?>" method="post">

            <?php
    else:
        ?>

            <form
                class="sm:mx-auto  sm:mt-5 relative mb-5 w-auto mt-0 h-full sm:w-[75%] sm:h-[90%] p-3 ml-3 mr-3  shadow-sm border shadow-white rounded-md group"
                action="<?= site_url('transaction_material/save_transaction'); ?>" method="post">
                <?php
    endif;
    ?>
            <h1 class="font-bold sm:text-2xl text-base mb-3 py-3 bg-bg2 text-center">
                <?php
                if (isset($idOrderTransaction)):
                    ?>
                    TAMBAH TRANSAKSI MATERIAL
                    <?php
                else:
                    ?>
                    UPDATE TRANSAKSI MATERIAL
                    <?php
                endif;
                ?>
            </h1>
            <style>
                #loading-container {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }

                #loading-spinner {
                    border: 6px solid rgba(0, 0, 0, 0.3);
                    border-radius: 50%;
                    border-top: 6px solid #3498db;
                    width: 50px;
                    height: 50px;
                    animation: spin 1s linear infinite;
                }

                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }

                    100% {
                        transform: rotate(360deg);
                    }
                }
            </style>
            <div id="loading-container">
                <div id="loading-spinner"></div>
            </div>
            <div class="sm:flex w-full sm:justify-evenly">
                <div class="">
                    <label class="font-bold sm:text-lg text-sm " for="buyerName">Nama Pembeli :</label>
                    <input class="mt-2 w-full py-2 border text-black px-5  rounded-md shadow-md"
                        placeholder="Nama Pembeli" required type="text" name="buyerName" id="buyerName"
                        value="<?= (isset($buyerNameTransaction)) ? $buyerNameTransaction : '' ?>">
                </div>
                <div class="sm:ml-3">
                    <label class="font-bold sm:text-lg text-sm " for="buyerAddress">Alamat Pembeli :</label>
                    <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md"
                        placeholder="Alamat Pembeli" required type="text" name="buyerAddress" id="buyerAddress"
                        value="<?= (isset($buyerAddressTransaction)) ? $buyerAddressTransaction : '' ?>">
                </div>
                <div class="sm:ml-3">
                    <label class="font-bold sm:text-lg text-sm " for="buyerPhone">No Hp Pembeli :</label>
                    <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md"
                        placeholder="No Hp Pembeli" required type="text" name="buyerPhone" id="buyerPhone"
                        value="<?= (isset($buyerPhoneTransaction)) ? $buyerPhoneTransaction : '' ?>">
                </div>
                <div class="sm:ml-3">
                    <label class="font-bold sm:text-lg text-sm " for="bankAccountNumber">No. REK Pembeli :</label>
                    <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md"
                        placeholder="Rekening Pembeli" required type="text" name="bankAccountNumber"
                        id="bankAccountNumber"
                        value="<?= (isset($bankAccountNumberTransaction)) ? $bankAccountNumberTransaction : '' ?>">
                </div>
            </div>
            <div class="sm:flex w-full justify-between mb-5 sm:mt-3">
                <div class="">
                    <label class="font-bold sm:text-lg text-sm" for="search">Search:</label>
                    <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md" type="text"
                        id="search" placeholder="Cari Barang Disini...">
                </div>
                <div class="sm:ml-3">
                    <label class="font-bold sm:text-lg text-sm" for="ongkir">Ongkos Kirim :</label>
                    <input class="mt-2 w-full  py-2 border text-black px-5  rounded-md shadow-md"
                        placeholder="Input Nominal" required type="number" name="ongkir" id="ongkir"
                        value="<?= (isset($ongkirTransaction)) ? $ongkirTransaction : '' ?>">
                </div>
            </div>
            <div id="allContent">
                <div class="overflow-x-scroll">
                    <table class=" w-[500px] sm:w-full mt-0 sm:mt-5">
                        <div class="p-3 w-full sm:bg-dark">
                            <thead class="bg-blue-400">
                                <tr class="text-[12px] sm:text-xl">
                                    <th class="py-3">SKU</th>
                                    <th class="py-3">Nama Barang</th>
                                    <th class="py-3">Deskripsi Barang</th>
                                    <th class="py-3">Harga Jual</th>
                                    <th class="py-3">Stock</th>
                                    <th class="py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dataProduct">

                                <?php foreach ($product->result() as $singleView): ?>
                                    <tr
                                        class="cursor-pointer text-[10px] sm:text-xl bg-white py-2  hover:bg-slate-200 duration-300">
                                        <td class="py-3 w-auto">
                                            <?= $singleView->SKU ?>
                                        </td>
                                        <td class="py-3 w-auto">
                                            <?= $singleView->productName ?>
                                        </td>
                                        <td class="py-3 w-auto">
                                            <?= $singleView->productDescription ?>
                                        </td>
                                        <td class="py-3 w-auto">
                                            <?= $singleView->materialPrice ?>
                                        </td>
                                        <td class="py-3 w-auto">
                                            <?= $singleView->sisa_stock ?>
                                        </td>
                                        <td class="py-3 w-auto">
                                            <?php


                                            $isSKUExist = in_array($singleView->SKU, array_column($checkout->result(), 'SKU'));

                                            ?>
                                            <button
                                                class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                                <?= $isSKUExist ? 'disabled' : ($singleView->sisa_stock > 0 ? '' : 'disabled') ?> type="button"
                                                onclick="insertDataPesan('<?= $singleView->SKU ?>')">

                                                <?= $isSKUExist ? 'Sudah dipesan' : ($singleView->sisa_stock > 0 ? 'Pesan' : 'Stock Kosong') ?>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </div>
                    </table>
                </div>
                <div id="pagination" class="mt-3">

                    <nav aria-label="Page navigation example">
                        <ul
                            class="inline-flex -space-x-px w-fit h-fit rounded-lg border border-gray-300 overflow-hidden  divide-x ">
                            <li id="prevPage"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">
                                &laquo;

                            </li>
                            <span id="prevPrevCurrent"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                            <span id="prevCurrent"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                            <span id="currentPage"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-blue-600 bg-blue-100 divide-x-2"></span>
                            <span id="nextCurrent"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                            <span id="nextNextCurrent"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700"></span>
                            <li id="nextPage"
                                class="inline-flex -space-x-px px-3 py-2 leading-tight text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700">
                                &raquo;
                            </li>
                        </ul>
                    </nav>


                    <!-- <button id="prevPage">Previous</button>
                <span id="currentPage">1</span>
                <button id="nextPage">Next</button> -->
                </div>
                <br>
                <div>
                    <h1 class="font-bold sm:text-2xl text-base py-3 bg-bg2 text-center">PEMESANAN</h1>
                    <div class="overflow-x-scroll">

                        <table class=" w-[500px] sm:w-full sm:mt-5">
                            <div class="p-3 w-full sm:bg-dark">
                                <thead class="bg-blue-400">
                                    <tr class="text-[12px] sm:text-xl">
                                        <th class="py-3 ">Nama Barang</th>
                                        <th class="py-3">Deskripsi Barang</th>
                                        <th class="py-3">Jumlah</th>
                                        <th class="py-3">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($checkout->result() as $row): ?>
                                        <tr>
                                            <input type="hidden" name="SKU<?= $row->idCheckout ?>"
                                                id="SKU<?= $row->idCheckout ?>" value="<?= $row->idCheckout ?>">
                                            <input type="hidden" name="materialPrice<?= $row->idCheckout ?>"
                                                id="materialPrice<?= $row->idCheckout ?>"
                                                value="<?= $row->materialPrice ?>">
                                            <!-- <?= $row->materialPrice ?> -->
                                            <td class="border px-3 py-2 shadow-sm">
                                                <!-- <input type="hidden" name="productName<?= $row->productName ?>"
                                        id="productName<?= $row->productName ?>" value="<?= $row->productName ?>"> -->
                                                <?= $row->productName ?>
                                            </td>
                                            <td class="border px-3 py-2 shadow-sm">
                                                <?= $row->productDescription ?>
                                            </td>
                                            <td class="border px-3 py-2 shadow-sm">
                                                <input class="py-2 w-full ml-3 text-center border" type="number"
                                                    name="qtyOrder<?= $row->idCheckout ?>" value="1" min="1" max="<?php foreach ($product->result() as $singleView):
                                                          if ($row->SKU == $singleView->SKU) {
                                                              echo $singleView->sisa_stock;
                                                          }
                                                      endforeach; ?>">
                                            </td>
                                            <td class="border px-3 py-2 shadow-sm">
                                                <button
                                                    class="bg-blue-700 rounded-md text-white px-5 py-1 shadow-md hover:bg-blue-900"
                                                    type="button" onclick="deleteDataPesan('<?= $row->SKU ?>')">-</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </div>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            if (isset($idOrderTransaction)):
                ?>
                <input type="hidden" name="idOrder" id="idOrder" value="<?= $idOrderTransaction ?>">
                <?php
            endif;
            ?>
            <button
                class="sm:text-lg text-sm mb-3 sm:font-bold font-semibold mt-3 px-[50px] text-white py-2 w-full rounded-sm bg-blue-500 hover:bg-lime-500"
                type="submit">PESAN SEKARANG</button>
        </form>
</body>
<script src="<?= base_url() ?>/dist/js/script.js"></script>

<script src="<?= base_url() ?>dist/js/jquery.min.js"></script>

<script>
    function validateAndSubmit() {
        $.ajax({
            url: "<?= base_url('transaction_umum/check_order_product') ?>",
            type: "post",
            success: function (response) {
                console.log(response);
                // Response akan berisi hasil dari validasi di server
                if (response === 'sudah') {
                    // Jika validasi berhasil, kirim formulir
                    document.forms[0].submit(); // Ganti 0 dengan indeks formulir yang sesuai jika ada lebih dari satu formulir
                } else {
                    // Jika validasi gagal, berikan pesan atau lakukan tindakan lain
                    alert("Belum Memilih Pesanan");
                }
            }
        });
    }
</script>


<script type="text/javascript">
    function test() {

        var currentPage = sessionStorage.getItem('currentPage') || 1;

        console.log("currentPage" + currentPage);
        var itemsPerPage = 5; // Set the number of items per page
        // Menghitung jumlah elemen <tr> dalam tabel
        var jumlahTr = $('#dataProduct tr').length;

        var maxPages = Math.ceil(jumlahTr / itemsPerPage);

        // Menampilkan jumlah <tr> dalam console (bisa diubah sesuai kebutuhan)
        console.log("Jumlah <tr> dalam tabel: " + maxPages);
        // Function to update the displayed items based on the current page


        function updateDisplay() {


            if (sessionStorage.getItem('searchText')) {
                searchProduct()
            } else {
                console.log("currentPage" + currentPage);
                sessionStorage.setItem('currentPage', currentPage);
                var startIndex = (currentPage - 1) * itemsPerPage;
                var endIndex = startIndex + itemsPerPage;

                $('#dataProduct tr').hide(); // Hide all rows
                $('#dataProduct tr').slice(startIndex, endIndex).show(); // Show the current page items
                $('#prevPrevCurrent').text(parseInt(currentPage) - 2); // Update the current page indicator
                $('#prevCurrent').text(parseInt(currentPage) - 1); // Update the current page indicator
                $('#currentPage').text(parseInt(currentPage)); // Update the current page indicator
                $('#nextCurrent').text(parseInt(currentPage) + 1); // Update the current page indicator
                $('#nextNextCurrent').text(parseInt(currentPage) + 2); // Update the current page indicator

                if (currentPage < maxPages) {
                    $('#nextPage').show()

                } else {
                    $('#nextPage').hide()
                }
                if (currentPage < maxPages - 1) {
                    $('#nextNextCurrent').show()
                } else {
                    $('#nextNextCurrent').hide()
                }
                if (currentPage < maxPages) {
                    $('#nextCurrent').show()
                } else {
                    $('#nextCurrent').hide()
                }
                if (currentPage > 1) {
                    $('#prevCurrent').show()
                } else {
                    $('#prevCurrent').hide()
                }
                if (currentPage > 2) {
                    $('#prevPrevCurrent').show()
                } else {
                    $('#prevPrevCurrent').hide()
                }
                if (currentPage > 1) {
                    $('#prevPage').show()
                } else {
                    $('#prevPage').hide()
                }
            }

        }


        updateDisplay();

        // Pagination - Next Page
        $('#nextNextCurrent').click(function () {
            currentPage = currentPage + 2;
            updateDisplay();
        });

        // Pagination - Previous Page
        $('#prevPrevCurrent').click(function () {
            if (currentPage > 1) {
                currentPage = currentPage - 2;
                updateDisplay();
            }
        });

        // Pagination - Next Page
        $('#nextCurrent').click(function () {
            currentPage++;
            updateDisplay();
        });

        // Pagination - Previous Page
        $('#prevCurrent').click(function () {
            if (currentPage > 1) {
                currentPage--;
                updateDisplay();
            }
        });

        // Pagination - Next Page
        $('#nextPage').click(function () {
            currentPage++;
            updateDisplay();
        });

        // Pagination - Previous Page
        $('#prevPage').click(function () {
            if (currentPage > 1) {
                currentPage--;
                updateDisplay();
            }
        });


        $('#search').on('keyup', function (e) {
            var searchText = $(this).val().toLowerCase();
            var characterCount = searchText.length;



            console.log("SDFG tertekan" + characterCount);
            if (characterCount <= 0) {
                // Remove a specific item from session storage
                sessionStorage.removeItem('searchText');

                console.log("Backspace koso" + characterCount);
                $('#pagination').show()
                updateDisplay();
            } else {
                sessionStorage.setItem('searchText', searchText);
                searchProduct()
            }

        });

        function searchProduct() {

            var searchText = sessionStorage.getItem('searchText');



            $('#search').val(searchText);
            $('#dataProduct tr').hide(); // Hide all rows
            $('#pagination').hide()
            // Show rows that match the search text
            $('#dataProduct tr').filter(function () {
                return $(this).text().toLowerCase().includes(searchText);
            }).show();
        }
    }

    test()
    $('#loading-container').hide();

    function insertDataPesan(SKU) {
        $('#loading-container').show();
        console.log("loadinggggggg");
        $.ajax({
            url: "<?= base_url('transaction_material/insert_checkout') ?>",
            type: "post",
            data: {
                SKU: SKU
            },
            success: function (response) {
                // console.log(response);
                $("#allContent").html(response);
                // $.ajax({
                //     type: "GET",
                //     url: "dist/ajax/ajaxEntry.php",
                //     data: "",
                //     success: function (data) {
                //         $("#allContent").html(data);
                //         operasi();
                //     }
                // });
                test();
                $('#loading-container').hide();
                console.log("loadingg ilabnggg");
                // location.reload()
            }
        });


        console.log("UPdaterrrt");
    }

    function deleteDataPesan(SKU) {
        $('#loading-container').show();
        console.log("loadinggggggg");
        $.ajax({
            url: "<?= base_url('transaction_material/delete_checkout') ?>",
            type: "post",
            data: {
                SKU: SKU
            },
            success: function (response) {
                // console.log(response);
                $("#allContent").html(response);
                // $.ajax({
                //     type: "GET",
                //     url: "dist/ajax/ajaxEntry.php",
                //     data: "",
                //     success: function (data) {
                //         $("#allContent").html(data);
                //         operasi();
                //     }
                // });
                test();
                $('#loading-container').hide();
                console.log("loadingg ilabnggg");
                // location.reload()
            }
        });
    }
</script>

</html>