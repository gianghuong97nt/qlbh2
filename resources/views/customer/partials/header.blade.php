<div class="header-top-w3layouts">
    <div class="container">
        <div class="col-md-6 logo-w3">
            <a href="{{ route('home') }}"><img src="{{asset('frontend_assets/images/logo2.png')}}" alt=" " /><h1>ELECTRONIC</h1></a>
        </div>
        <div class="col-md-6 phone-w3l">
            <ul>
                <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></li>
                <li>+18045403380</li>
            </ul>
        </div>
    </div>
</div>
<div class="header-bottom-w3ls">
    <div class="container">
        <div class="col-md-7 navigation-agileits">
            <nav class="navbar navbar-default">
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav ">
                        <li class=" active"><a href="#" class="hyper "><span>Home</span></a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Electronic<b class="caret"></b></span></a>
                        </li>
                        <li><a href="#" class="hyper"><span>About</span></a></li>
                        <li><a href="#" class="hyper"><span>Contact Us</span></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <script src="{{asset('frontend_assets/js/dropdown-menu.js')}}"></script>
        <div class="col-md-4 search-agileinfo">
            <form action="#" method="post">
                <input type="search" name="Search" placeholder="Search for a Product..." required="">
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
            </form>
        </div>
        <div class="col-md-1 cart-wthree">
            <div class="cart">
                <form action="{{ url('/cart') }}" method="get" class="last">
                    <button class="w3view-cart" type="submit" name="submit" value="">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <span id="num-cart">{{ \Cart::getTotalQuantity() }}</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var add_cart_url = '<?php echo url('cart/add') ?>';
        $('#result').on('click', '.pw3ls-cart,.w3ls-cart',function (e) {
            e.preventDefault();

            var dataPost = $(this).closest('form').serializeArray();

            // post đến controller
            $.ajax({
                url: add_cart_url,
                dataType:'json',
                type:'POST',
                data: dataPost,
                success: function(result){
                    // bung popup
                    $('#myModal').modal('show');
                }
            });

        });
    });
</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bạn đã thêm sản phẩm vào giỏ hàng thành công</h4>
            </div>
            <div class="modal-body">
                <p style="text-align: center">
                    <a href="{{ url('/cart') }}" class="btn btn-success">Thanh toán</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tiếp tục mua sắm</button>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">đóng</button>
            </div>
        </div>

    </div>
</div>
