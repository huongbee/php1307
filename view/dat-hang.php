<div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-reservation">
            <div class="container">
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(-5px);" data--50-top="transform: translateY(-15px);opacity:0.8;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Giỏ hàng của bạn</div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">Just a few click to make the reservation online for saving your time and money</div>
              </div>
            </div>
          </div>
          <div class="page-content-wrapper">

            <section class="section-reservation-form padding-top-100 padding-bottom-100">
              <div class="container">
                 <div class="section-content cart-detail">
                  <?php
                  if($data->items != null){
                  ?>
                 
                    <div class="swin-sc swin-sc-title style-2">
                      <h3 class="title"><span>Chi tiết giỏ hàng</span></h3>
                    </div>
                    <div class="reservation-form">
                      <div class="swin-sc swin-sc-contact-form light mtl">
                        <table class="table table-striped" style="text-align: center;">
                            <thead>
                              <tr>
                                <th width="30%" style="text-align: center;">Product</th>
                                <th width="20%" style="text-align: center;">Price</th>
                                <th width="20%" style="text-align: center;">Qty.</th>
                                <th width="20%" style="text-align: center;">Total</th>
                                <th width="10%" style="text-align: center;">Remove</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach($data->items as $key=>$sanpham):
                              ?>
                              <tr id="sanpham-<?=$key?>">
                                <td>
                                  <img src="public/restaurant-template-master/assets/images/hinh_mon_an/<?=$sanpham['item']->image?>" width="150px">
                                  <p><br><b><?=$sanpham['item']->name?></b></p>
                                </td>
                                <td><b><?=number_format($sanpham['item']->price)?> vnđ </b></td>
                                <td>
                                <select name="product-qty" id="product-qty" class="form-control product-qty"  width="50" data-id="<?=$key?>">
                                  <?php
                                  for($i=1; $i<=5; $i++):
                                  ?>
                                  <option value="<?=$i?>" <?=$sanpham['qty']==$i ? "selected" : ''?>><?=$i?></option>
                                <?php endfor?>
                                </select>
                                </td>
                                <td><b id="dongia-<?=$key?>" style="color:blue"><?=number_format($sanpham['price'])?> vnđ</b></td>
                                <td><a class="remove" title="Remove this item" data-id="<?=$key?>"><i class="fa fa-trash-o fa-2x" ></i></a></td>
                              </tr>
                              <?php
                              endforeach
                            ?>
                            <tr>
                              <td colspan="3"></td>
                              <td><b style="color: red; font-size: 20px" class="totalPrice"><?=number_format($data->totalPrice)?> vnđ</b></td>
                              <td></td>
                            </tr>
                            </tbody>
                        </table>     
                       
                      </div>
                      
                      <div class="swin-sc swin-sc-contact-form light mtl style-full">
                        <div class="swin-sc swin-sc-title style-2">
                          <h3 class="title"><span>Đặt hàng</span></h3>
                        </div>
                        <form>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" placeholder="Fullname" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="text" placeholder="Email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <div class="fa fa-map-marker"></div>
                              </div>
                              <input type="text" placeholder="Address" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <div class="fa fa-phone"></div>
                              </div>
                              <input type="text" placeholder="Phone" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                            <textarea placeholder="Message" class="form-control"></textarea>
                          </div>
                           <div class="form-group">
                            <div class="swin-btn-wrap center"><a href="#" class="swin-btn center form-submit"> <span>Checkout</span></a></div>
                          </div>
                        </form>
                      </div>
                      </div>
                  
                  <?php 
                  }
                  else{

                    echo '<h3 class="title" style="text-align:center"><span>Bạn chưa mua sản phẩm nào</span></h3>';
                    header("refresh: 10; url=index.php");

                  }
                   ?>
                 </div>
              </div>
            </section>

            <section data-bottom-top="background-position: 50% 100px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" class="section-reservation-service padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="section-content">
                  <div class="swin-sc swin-sc-title style-2 light">
                    <h3 class="title"><span>Fooday Best Service</span></h3>
                  </div>
                  <div class="swin-sc swin-sc-iconbox light">
                    <div class="row">
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item icon-box-02 wow fadeInUpShort">
                          <div class="wrapper-icon"><i class="icons swin-icon-dish"></i><span class="number">1</span></div>
                          <h4 class="title">Reservation</h4>
                          <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div data-wow-delay="0.5s" class="item icon-box-02 wow fadeInUpShort">
                          <div class="wrapper-icon"><i class="icons swin-icon-dinner-2"></i><span class="number">2</span></div>
                          <h4 class="title">Private Event</h4>
                          <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div data-wow-delay="1s" class="item icon-box-02 wow fadeInUpShort">
                          <div class="wrapper-icon"><i class="icons swin-icon-browser"></i><span class="number">3</span></div>
                          <h4 class="title">Online Order</h4>
                          <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-12">
                        <div data-wow-delay="1.5s" class="item icon-box-02 wow fadeInUpShort">
                          <div class="wrapper-icon"><i class="icons swin-icon-delivery"></i><span class="number">4</span></div>
                          <h4 class="title">Fast Delivery</h4>
                          <div class="description">Lorem ipsum dolor sit amet, tong consecteturto sed eiusmod incididunt utote labore et</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
<script>
  $(document).ready(function(){
    $('.remove').click(function(){
      var id = $(this).attr('data-id');
      var action = "delete";
      $.ajax({
        url:'cart.php',
        data:{
          id: id,
          action: action
        },
        type: "POST",
        success: function(data){
          if(parseInt(data)==0){
            $('.cart-detail').html('<h3 class="title" style="text-align:center"><span>Giỏ hàng rỗng</span></h3>')
            setTimeout(function(){window.location.href = "index.php"}, 10000);
          }
          else{
            $('#sanpham-'+id).hide();
            $('.totalPrice').html(data)
          }
          
        }
      })
    })

    $('.product-qty').change(function(){
        var  id = $(this).attr('data-id');
        var soluong = $(this).val();
        console.log(id)
        console.log(soluong);

        var action = "update";
        $.ajax({
            url:'cart.php',
            data:{
                id: id,
                action: action,
                qty: soluong
            },
            type: "POST",
            success: function(data){
                //var json = JSON.parse(data)
                //var dongiaSanpham = json.dongiaSanpham
                var dongiaSanpham = data.dongiaSanpham
                var tongtien = data.tongtien

                $('#dongia-'+id).html(dongiaSanpham)
                $('.totalPrice').html(tongtien)
                //console.log(tongtien)
            }
        })
    })
  })
</script>