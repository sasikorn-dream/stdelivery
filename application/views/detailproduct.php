<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
			foreach ($products as $product) {
			?>
            <div class="col-md-3">
                <a<?php echo base_url(); ?>index.php /main/test/<?php echo $product['products_id']; ?>">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="<?php echo $product['products_img']; ?>" alt="Card image cap">
                        <div class="badge  badge-lg price">
                            <?php echo number_format($product['products_price'], 2); ?>&nbsp;บาท
                        </div>
                        <div class="card-body">
                            <p class="card-text text-center restaurant"> <?php echo $product['products_name']; ?>
                            </p>
                            <div class="text-center">
                                <button class="btn btn-success"
                                    ng-click="add_cart(<?php echo $product['products_id']; ?>,'<?php echo $product['products_name']; ?>',<?php echo $product['products_price']; ?>)">Add
                                    to cart</button>
                            </div>
                        </div>

                    </div>
                    </a>
            </div>
            <?php
			} ?>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-success" ng-if="cart.length>0">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">รายการ</th>
                <th scope="col">ราคา</th>
                <th scope="col">จำนวน</th>
                <th scope="col">รวม</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="c in cart">
                <td scope="row">{{$index+1}}</td>
                <td class="text-dark">{{c.products_name}}</td>
                <td>฿{{c.products_price|number:2}}</td>
                <td>
                    <button class="btn btn-dark text-light" ng-click="remove_count($index)">-</button>
                    &nbsp;{{c.count}}&nbsp;
                    <button class="btn btn-dark text-light" ng-click="add_count($index)">+</button></td>
                <td>฿{{c.count*c.products_price|number:2}}</td>
                <td>
                    <button class="btn btn-danger text-light" ng-click="remove($index)">delete</button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">รวม</td>
                <td>฿{{total()|number:2}}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

</div>