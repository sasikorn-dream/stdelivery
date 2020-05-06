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

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Count</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>