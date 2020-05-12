<div class="container">
<table class="table table-borderless" ng-if="cart.length>0">
            <thead>
                <tr class="bg-darktext-light table-secondary">
                <th scope="col"></th>
                    <th scope="col">รายการ</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">รวม</th>
                    <th></th>
                </tr>
            </thead>
            <tbody >
                <tr ng-repeat="c in cart">
                <td scope="row">{{$index+1}}</td>
                    <td>{{c.products_name}}</td>
                    <td>฿{{c.products_price|number:2}}</td>
                    <td>
                        <button class="btn btn-dark text-light" ng-click="remove_count($index)">-</button>
                        &nbsp;{{c.count}}&nbsp;
                        <button class="btn btn-dark text-light" ng-click="add_count($index)">+</button></td>
                    <td>฿{{c.count*c.products_price|number:2}}</td>
                    <td>
                        <button class="btn btn-danger text-light btn-sm" ng-click="remove($index)">delete</button>
                    </td>
                </tr>
                <tr class="table-danger">
                    <td colspan="4" class="total-table ">รวม</td>
                    <td class="total-table">฿{{total()|number:2}}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <form>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">คุณ</label>
    <div class="col-sm-10">
    <?php 
  $user = $this->session->userdata("user");
//   pre($user);
  ?>
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $user->username; ?>">
    </div>
  </div>

  <div id="map">
    
  </div>

  
</form>
</div>