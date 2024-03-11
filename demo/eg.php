<?php 
require('top.php');

if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
<script>
window.location.href = 'index.php';
</script>
<?php
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}
$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order=" order by product.price desc ";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc ";
		$old_selected="selected";
	}

}

if($cat_id>0){
	$get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
}else{
	?>
<script>
window.location.href = 'index.php';
</script>
<?php
}										
?>
<div class="body__overlay"></div>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(images/discount/hat.webp) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Products</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5  " id="categories-filt">
                <div class="categories-filter">
                    <!--  -->
                    <?php
                     foreach ($cat_arr as $list) {
                         ?>
                    <button class="accordion"><?php echo $list['categories']; ?></button>
                    <div class="panel">
                        <?php
                             $cat_id = $list['id'];
                             $sub_cat_res = mysqli_query($con, "SELECT * FROM sub_categories WHERE status='1' AND categories_id='$cat_id'");
                             
                             if (mysqli_num_rows($sub_cat_res) > 0) {
                                 ?>
                        <ul>
                            <?php
                                     while ($sub_cat_rows = mysqli_fetch_assoc($sub_cat_res)) {
                                         echo '<li><a href="categories.php?id=' . $list['id'] . '&sub_categories=' . $sub_cat_rows['id'] . '">' . $sub_cat_rows['sub_categories'] . '</a></li>';
                                     }
                                     ?>
                        </ul>
                        <?php
                             }
                             ?>
                    </div>
                    <?php
                     }
                     ?>
                </div>
                <!--- categories filter end ---->
            </div>
            <!----- catagories-filt end --------->

            <?php if(count($get_product)>0){?>
            <div class="col-lg-9 col-md-9 col-sm-7 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select"
                                onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')"
                                id="sort_product_id">
                                <option value="">Default softing</option>
                                <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to hight
                                </option>
                                <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low
                                </option>
                                <option value="new" <?php echo $new_selected?>>Sort by new first</option>
                                <option value="old" <?php echo $old_selected?>>Sort by old first</option>
                            </select>
                        </div>

                    </div>
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view"
                                class="single-grid-view tab-pane fade in active clearfix">
                                <?php
										foreach($get_product as $list){
										?>
                                <!-- Start Single Category -->
                                <div class="col-md-4 col-lg-3 col-sm-6 col-xs-4" id="product-section">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product.php?id=<?php echo $list['id']?>">
                                                <img src="media/product/<?php echo $list['image']?>"
                                                    alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li><a href="javascript:void(0)"
                                                        onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i
                                                            class="icon-heart icons"></i></a></li>
                                                <li><a href="product.php?id=<?php echo $list['id']?>"><i
                                                            class="icon-handbag icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                            <h3 style="color:#ccc;font-size:16px; margin:5px 0;"><?php echo $list['brand'];?></h3>
                                            <ul class="fr__pro__prize">

                                                <li><i class="fa fa-inr"
                                                        aria-hidden="true"></i><?php echo $list['price']?></li>
                                                <strike>
                                                    <li class="old__prize"><i class="fa fa-inr"
                                                            aria-hidden="true"></i><?php echo $list['mrp']?></li>
                                                </strike>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { 
						echo "Data not found";
					} ?>

        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- End Banner Area -->
<input type="hidden" id="qty" value="1" />

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
</script>
<?php require('footer.php')?>
