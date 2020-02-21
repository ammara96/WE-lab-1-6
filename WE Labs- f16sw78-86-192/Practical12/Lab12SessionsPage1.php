<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<TITLE>Lab 12 Task 1 Sessions </TITLE>
<link href="Lab12Sessions.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1>Lab 12 Task 1 Shopping Cart using Sessions </h1>
<?php 
$productArray = array(
        "s1" => array(
            'id' => '1',
            'name' => 'Shirt',
            'code' => 's1',
            'image' => 'product-images/shirt.jpg',
            'price' => '500'
        ),
        "p1" => array(
            'id' => '2',
            'name' => 'Pants',
            'code' => 'p1',
            'image' => 'product-images/pants.jpg',
            'price' => '800'
        ),
        "sh1" => array(
            'id' => '3',
            'name' => 'Shoes ',
            'code' => 'sh1',
            'image' => 'product-images/shoes.jpg',
            'price' => '2000'
        )
    );

?>

<div id="product-grid">
<div class="txt-heading">Products</div>
<?php
if (! empty($productArray)) {
    foreach ($productArray as $k => $v) {
        ?>
		<div class="product-item">
        <form id="frmCart">
            <div class="product-image">
                <img src="<?php echo $productArray[$k]["image"]; ?>" width="100" height="100">
            </div>
            <div>
                <div class="product-info">
                    <strong><?php echo $productArray[$k]["name"]; ?></strong>
                </div>
                <div class="product-info product-price"><?php echo $productArray[$k]["price"]; ?></div>
                <div class="product-info">
                    <button type="button"
                        id="add_<?php echo $productArray[$k]["code"]; ?>"
                        class="btnAddAction cart-action"
                        onClick="cartAction('add','<?php echo $productArray[$k]["code"]; ?>')">
                        <img src="images/add-to-cart.png" />
                    </button>
                    <input type="text"
                        id="qty_<?php echo $productArray[$k]["code"]; ?>"
                        name="quantity" value="1" size="2" />
                </div>
            </div>
        </form>
    </div> 
	
	
	<?php
    }
}
?> 
<form action="Lab12Sessionsb.php">
    <input type="submit" value="View My Cart " />
</form>
</div> 
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
function cartAction(action, product_code) {
    var queryString = "";
    if (action != "") {
        switch (action) {
        case "add":
            queryString = 'action=' + action + '&code=' + product_code
                    + '&quantity=' + $("#qty_" + product_code).val();
            break;
        case "remove":
            queryString = 'action=' + action + '&code=' + product_code;
            break;
        case "empty":
            queryString = 'action=' + action;
            break;
        }
    }
    jQuery.ajax({
        url : "ajax-action.php",
        data : queryString,
        type : "POST",
        success : function(data) {
            $("#cart-item").html(data);
            if (action == "add") {
                $("#add_" + product_code + " img").attr("src",
                        "images/icon-check.png");
                $("#add_" + product_code).attr("onclick", "");
            }
        },
        error : function() {
        }
    });
}
</script> 
</body>
</html> 
