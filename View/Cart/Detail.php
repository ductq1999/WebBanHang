<?php
    if(!isset($_SESSION['mycart'])){
        echo "<center><a href=\"index.php?mod=products&act=allproducts\" class=\"btn btn-primary\" type=\"button\">Mời bạn mua hàng!</a></center>";
    }
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>CHI TIẾT GIỎ HÀNG</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
 <?php
 include_once("View/Products/Showleft.php");
 ?>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">Xoá</th>
                                            <th class="product-thumbnail">Ảnh</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-remove">Sửa số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="cart_item">
                                            


<?php
$sum=0;

    foreach($_SESSION["mycart"] as $key=>$val){
        
        $row=$pro->GetProductByID($key);
        $sum+=$val*$row["Price"];
        // echo "<tr>";
        echo "<td class=\"product-remove\">";
        echo        "<a title=\"Remove this item\" class=\"remove\" href=\"index.php?mod=cart&act=delete&id=$key\" onclick=\"return IsDelete()\">×</a><td>";
      //  echo "<td><img height=\"50\"  src=\"Upload/$row[ImageUrl]\" /></td>";
        echo    "<a href=\"single-product.html\"><img width=\"145\" height=\"145\" alt=\"\" class=\"shop_thumbnail\" src=\"Upload/$row[ImageUrl]\"></a></td>";

        echo "<td class=\"product-thumbnail\">";
        echo    "<a href=\"single-product.html\">{$row['ProductName']}</a></td>";

        echo "<td class=\"product-price\">";
        echo        "<span class=\"amount\">{$row['Price']}đ</span></td>";

        echo "<td>$val</td>";

        echo "<td><a href=\"index.php?mod=cart&act=edit&id=$key\"><img src=\"Images/Edit.gif\" /></a></td>";
        echo "</tr>";
    }

?>
        </tbody>
    </table>
</form>

                            
                            <div class="cart_totals ">
                                <h2>Tổng tiền</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng giỏ hàng</th>
                                            <td><span class="amount"><?php echo number_format($sum,0);?>đ</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Phí ship</th>
                                            <td>Free shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <td><strong><span class="amount"><?php echo number_format($sum,0);?>đ</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
    if(count($_SESSION['mycart'])==0){
        echo "<center><a href=\"index.php?mod=products&act=allproducts\" class=\"btn btn-primary\" type=\"button\">Mời bạn mua hàng!</a></center>";
    }
    else echo "<center><a href=\"index.php?mod=order&act=add\" class=\"btn btn-primary\" type=\"button\">Đặt hàng</a></center>";
?>

                        </div>
                    </div>                        
                </div>                    
            </div>
        </div>
    </div>
</div>

