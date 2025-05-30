<?php
require_once 'connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$connect = new Connect();
$cartItems = $connect->getCartItems($_SESSION['user_id']);

include 'header.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

    <div class="b-text d-flex flex-wrap align-items-center text-center arrow_custom justify-content-center " style="padding-top:150px;">
        <h1 class="fs36 clnau line_tt text-uppercase lora">Giỏ hàng</h1>
    </div>

    <div class="_wreapper">
        <div class="selection-content">
            <div class="select-ctent">
                <div class="container">
                    <ul class="breadcrumb mb-4">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
                <div class="container">
                    <div class="list-ProCart box-cart-content">
                        <table class="table table-hover table-condensed text-center bold">
                            <thead>
                                <tr>
                                    <th style="width: 4%">
                                        <label class="custom-checkbox">
                                            <input type="checkbox" id="select-all" class="cart-checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th style="width: 6%">STT</th>
                                    <th style="width: 45%">Tên sản phẩm</th>
                                    <th style="width: 10%">Số lượng</th>
                                    <th style="width: 10%">Đơn giá</th>
                                    <th style="width: 15%">Thành tiền</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 1;
                                $tongtien = 0;
                                if (empty($cartItems)) {
                                    echo '<tr><td colspan="7" class="text-center">Không có sản phẩm nào trong giỏ hàng</td></tr>';
                                } else {
                                    foreach ($cartItems as $item):
                                        $hasDiscount = !empty($item['gia_giam']) &&
                                            strtotime($item['ngaybatdau']) <= time() &&
                                            strtotime($item['ngayketthuc']) >= time();
                                        $finalPrice = $hasDiscount ? $item['gia_sau_giam'] : $item['giaban'];
                                        $tongtien += $item['thanhtien'];
                                        $isOutOfStock = $item['soluong'] <= 0; // Check if product is out of stock
                                        ?>
                                        <tr class="row-item-cart <?php echo $isOutOfStock ? 'out-of-stock' : ''; ?>">
                                            <td>
                                                <label class="custom-checkbox">
                                                    <input type="checkbox" class="cart-checkbox item-checkbox"
                                                        data-id="<?= $item['idsanpham'] ?>"
                                                        data-price="<?= $finalPrice * $item['soluong'] ?>"
                                                        <?php echo $isOutOfStock ? 'disabled' : ''; ?>>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td data-th="stt"><?= $stt++ ?></td>
                                            <td data-th="product">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-4">
                                                        <a href="chi_tiet_san_pham.php?id=<?= $item['idsanpham'] ?>">
                                                            <img src="<?= $item['path_anh_goc'] ?>" class="img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <h3>
                                                            <a href="chi_tiet_san_pham.php?id=<?= $item['idsanpham'] ?>">
                                                                <?= $item['tensanpham'] ?>
                                                                <?php if ($isOutOfStock): ?>
                                                                    <span class="text-danger">(Hết hàng)</span>
                                                                <?php endif; ?>
                                                            </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="quantity">
                                                <div class="d_box_number">
                                                    <button class="minus" onclick="updatesoluong(<?= $item['idsanpham'] ?>, 'minus')"
                                                            <?php echo $isOutOfStock ? 'disabled' : ''; ?>>-</button>
                                                    <input type="number" min="1" max="<?= $item['soluong'] ?>" value="<?= $item['soluong'] ?>"
                                                        class="quantity" data-id="<?= $item['idsanpham'] ?>" readonly>
                                                    <button class="plus" onclick="updatesoluong(<?= $item['idsanpham'] ?>, 'plus')"
                                                            <?php echo $isOutOfStock ? 'disabled' : ''; ?>>+</button>
                                                </div>
                                            </td>
                                            <td class="price" data-th="price">
                                                <?php if ($hasDiscount): ?>
                                                    <div class="price-display">
                                                        <span class="original-price"><?= number_format($item['giaban'], 0, ',', '.') ?>đ</span>
                                                        <span class="final-price"><?= number_format($finalPrice, 0, ',', '.') ?>đ</span>
                                                        <span class="discount-badge">-<?= number_format($item['gia_giam'], 0, ',', '.') ?>đ</span>
                                                    </div>
                                                <?php else: ?>
                                                    <?= number_format($item['giaban'], 0, ',', '.') ?>đ
                                                <?php endif; ?>
                                            </td>
                                            <td class="subtotal" data-th="subtotal">
                                                <?= number_format($finalPrice * $item['soluong'], 0, ',', '.') ?>đ
                                            </td>
                                            <td class="actions" data-th="">
                                                <button class="btn-remove" onclick="xoasanpham(<?= $item['idsanpham'] ?>)">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right text_tien">Tổng tiền đã chọn:</td>
                                    <td colspan="2" class="text_tien" id="selected-total">0đ</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="cart-actions">
                            <a href="index.php" class="btn-continue">Tiếp tục mua hàng</a>
                            <button class="btn-thanhtoan" onclick="thanhtoan()">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Include footer
    include 'footer.php';
    ?>

    <script>
        function updateQuantity(productId, action) {
            // Add AJAX code to update quantity
        }

        function xoasanpham(productId) {
            // Add AJAX code to remove item
        }

        function thanhtoan() {
            const selectedItems = Array.from(document.querySelectorAll('.item-checkbox:checked'))
                .map(checkbox => {
                    const row = checkbox.closest('tr');
                    const quantity = row.querySelector('.quantity').value;
                    return `${checkbox.dataset.id}_${quantity}`;
                });

            if (selectedItems.length > 0) {
                // Redirect to thanhtoan.php with type and items parameters
                window.location.href = `thanhtoan.php?type=cart&items=${selectedItems.join(',')}`;
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Chưa chọn sản phẩm",
                    text: "Vui lòng chọn ít nhất một sản phẩm để thanh toán"
                });
            }
        }


        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('select-all');
            const itemCheckboxes = document.querySelectorAll('.item-checkbox');
            const checkoutBtn = document.querySelector('.btn-thanhtoan');
            const selectedTotal = document.getElementById('selected-total');

            function updateCheckoutButton() {
                const checkedBoxes = document.querySelectorAll('.item-checkbox:checked');
                if (checkedBoxes.length > 0) {
                    checkoutBtn.classList.add('active');

                    // Calculate total of selected items
                    let total = 0;
                    checkedBoxes.forEach(checkbox => {
                        total += parseFloat(checkbox.dataset.price);
                    });
                    selectedTotal.textContent = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(total);
                } else {
                    checkoutBtn.classList.remove('active');
                    selectedTotal.textContent = '0đ';
                }
            }

            // Select All functionality
            selectAll.addEventListener('change', function() {
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateCheckoutButton();
            });

            // Individual checkbox functionality
            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = Array.from(itemCheckboxes).every(item => item.checked);
                    selectAll.checked = allChecked;
                    updateCheckoutButton();
                });
            });

            // Update checkout function
            // Update the checkout button click handler
            checkoutBtn.addEventListener('click', function() {
                if (this.classList.contains('active')) {
                    thanhtoan();
                }
            });

        });
        $(document).ready(function() {
            window.updatesoluong = function(productId, action) {
                const quantityInput = $(`input[data-id="${productId}"]`);
                let currentQuantity = parseInt(quantityInput.val()) || 1;
                let newQuantity = currentQuantity;

                if (action === 'plus') {
                    newQuantity = currentQuantity + 1;
                } else if (action === 'minus' && currentQuantity > 1) {
                    newQuantity = currentQuantity - 1;
                }

                // Update display immediately
                quantityInput.val(newQuantity);

                // Calculate and update subtotal
                const row = quantityInput.closest('tr');
                const priceElement = row.find('.final-price').length ?
                    row.find('.final-price') :
                    row.find('.price');
                const price = parseFloat(priceElement.text().replace(/[^\d]/g, ''));
                const subtotal = price * newQuantity;

                row.find('.subtotal').text(new Intl.NumberFormat('vi-VN').format(subtotal) + 'đ');
                row.find('.item-checkbox').attr('data-price', subtotal);

                // Update total if item is checked
                if (row.find('.item-checkbox').is(':checked')) {
                    let total = 0;
                    $('.item-checkbox:checked').each(function() {
                        total += parseFloat($(this).attr('data-price'));
                    });
                    $('#selected-total').text(new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(total));
                }

                // Send update to server in background
                $.ajax({
                    url: 'update_gio_hang.php',
                    type: 'POST',
                    data: {
                        product_id: productId,
                        quantity: newQuantity,
                        action: 'update'
                    }
                });
            };
        });

        function xoasanpham(productId) {
            // Get product name from the row
            const productRow = document.querySelector(`input[data-id="${productId}"]`).closest('tr');
            const productName = productRow.querySelector('h3 a').textContent;

            Swal.fire({
                title: "Xóa sản phẩm?",
                text: `Bạn có chắc muốn xóa "${productName}" khỏi giỏ hàng?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'update_gio_hang.php',
                        type: 'POST',
                        data: {
                            product_id: productId,
                            action: 'remove'
                        },
                        dataType: 'json', // Specify that we expect JSON
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    title: "Đã xóa!",
                                    text: `Sản phẩm "${productName}" đã được xóa khỏi giỏ hàng`,
                                    icon: "success"
                                });
                                productRow.remove();
                                
                                // Check if updateCheckoutButton function exists
                                if (typeof updateCheckoutButton === 'function') {
                                    updateCheckoutButton();
                                }

                                // Update cart count in header
                                $.ajax({
                                    url: 'lay_so_luong_san_pham.php',
                                    type: 'GET',
                                    dataType: 'json',
                                    cache: false,
                                    success: function(cartData) {
                                        $('.cart-count').text(cartData.count);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("Error fetching cart count:", error);
                                    }
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error removing item:", error);
                            Swal.fire({
                                icon: "error",
                                title: "Lỗi",
                                text: "Đã xảy ra lỗi khi xóa sản phẩm"
                            });
                        }
                    });
                }
            });
        }
    </script>

</body>

</html>
<style>

.out-of-stock {
    opacity: 0.5; /* Dim the row */
    background-color: #f8f8f8; /* Optional: slight background change */
}

.out-of-stock .d_box_number button,
.out-of-stock .custom-checkbox .checkmark {
    cursor: not-allowed; /* Indicate non-interactivity */
}

.out-of-stock .text-danger {
    font-size: 14px;
    font-weight: bold;
}
    .price-display {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
    }

    .original-price {
        text-decoration: line-through;
        color: #999;
        font-size: 14px;
    }

    .final-price {
        color: #dbaf56;
        font-weight: bold;
        font-size: 16px;
    }

    .discount-badge {
        background-color: #ff4444;
        color: white;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 12px;
    }

    .text_tien {
        color: #dbaf56;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .custom-checkbox input[type="checkbox"] {
        display: none;
    }

    /* Tạo hình tròn tùy chỉnh */
    .custom-checkbox .checkmark {
        height: 20px;
        width: 20px;
        background-color: #eee;
        border-radius: 50%;
        /* hình tròn */
        display: inline-block;
        position: relative;
        cursor: pointer;
        border: 2px solid #ccc;
        transition: all 0.2s ease;
    }

    /* Khi được chọn */
    .custom-checkbox input:checked+.checkmark {
        background-color: #dbaf56;
        border-color: #dbaf56;
    }

    /* Tạo dấu chấm ở giữa khi chọn */
    .custom-checkbox input:checked+.checkmark::after {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
    }


    .cart-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        padding: 20px 0;
    }

    .btn-continue {
        padding: 12px 25px;
        background: #dbaf56cf;
        border: 2px solid #dbaf56;
        color: rgb(255, 255, 255);
        text-decoration: none;
        border-radius: 5px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-continue:hover {
        background: rgb(253, 206, 111);
        color: #fff;
    }

    .btn-thanhtoan {
        padding: 12px 35px;
        background: #ccc;
        border: none;
        color: #666;
        border-radius: 5px;
        font-weight: 500;
        cursor: not-allowed;
        transition: all 0.3s ease;
    }

    .btn-thanhtoan.active {
        background: #dbaf56;
        color: #fff;
        cursor: pointer;
    }

    .btn-thanhtoan.active:hover {
        background: #c69c43;
    }

    .cart-checkbox {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    .btn-checkout {
        background: #ccc;
        color: #666;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: not-allowed;
        transition: all 0.3s ease;
    }

    .btn-checkout.active {
        background: #dbaf56;
        color: white;
        cursor: pointer;
    }

    .cart-checkbox:checked {
        accent-color: #dbaf56;
    }

    .d_box_number {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .d_box_number button {
        width: 30px;
        height: 36px;
        background: #fff;
        border: 1px solid #ebebeb;
        cursor: pointer;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .d_box_number button:hover {
        background: #f5f5f5;
    }

    .d_box_number input[type="number"] {
        width: 60px;
        height: 36px;
        text-align: center;
        border: 1px solid #ebebeb;
        background: #fff;
        font-size: 14px;
        font-weight: 500;
        padding: 0 5px;
    }

    .d_box_number input[type="number"]::-webkit-inner-spin-button,
    .d_box_number input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .d_box_number input[type="number"] {
        -moz-appearance: textfield;
    }

    .bx-trash:before {
        content: "\ec50";
        color: #dbaf56;
        font-size: 25px;
    }
</style>