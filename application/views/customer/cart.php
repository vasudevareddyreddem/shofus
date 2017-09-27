<style>
    /*  bhoechie tab */
    
    div.bhoechie-tab-container {
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border: 1px solid #ddd;
        margin-top: 20px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
    }
    div.bhoechie-tab-menu {
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group {
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a {
        margin-bottom: 0;
    }
    div.bhoechie-tab-menu div.list-group>a .glyphicon,
    div.bhoechie-tab-menu div.list-group>a .fa {
        color: #45b1b9;
    }
    div.bhoechie-tab-menu div.list-group>a:first-child {
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a:last-child {
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
    }
    div.bhoechie-tab-menu div.list-group>a.active,
    div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
    div.bhoechie-tab-menu div.list-group>a.active .fa {
        background-color: #45b1b9;
        background-image: #45b1b9;
        color: #ffffff;
    }
    div.bhoechie-tab-menu div.list-group>a.active:after {
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #45b1b9;
    }
    div.bhoechie-tab-content {
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        
        padding-left: 20px;
        padding-top: 10px;
    }
    div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
        display: none;
    }
    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        border-top: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">

                        <h4 class="glyphicon glyphicon-shopping-cart"></h4>
                        <br/>Check Cart
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-folder-open"></h4>
                        <br/>Billing Address
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4>
                        <br/>Payment mode
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-ok"></h4>
                        <br/>Thanks for Shopping
                    </a>

                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <center>
                        <div class="">
                            <!--SHIPPING METHOD-->
                            <div class="panel panel-default">
                                <div class="panel-heading " style="background-color:#fff;">

                                    <div class="pull-left">
                                        <h4>Current Cart</h4>
                                    </div>
                                    <div class="pull-right" style="line-height:40px;">
                                        <span style="font-size:17px; " class="glyphicon glyphicon-map-marker site_col"></span> &nbsp;
                                        <input style="border:none;background:transparent;font-size:17px;width:100px;" onclick="pincodechange();" type="text" value="500072" />
                                        <a id="hide_loc">
                                            <span style="color:#45b1b9;font-weight:500;cursor:pointer">Change</span>
                                        </a>
                                        <a id="show_loc" style="display:none;">
                                            <span style="color:#45b1b9;font-weight:500;cursor:pointer">Check</span>
                                        </a>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
								<div class="loop">
                                <div class="panel-body">
                                    <table class="table borderless">

                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="col-md-2">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaGHtakM-MNkXnCwvKIRpXPCWUk5IZpmo_vsfNm8RNVdWFP5zV" style="width: 72px; height: 72px;"> </a>

                                                    </div>
                                                    <br>
                                                    <div style="width:90px" class="input-group">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px;"type="button" class="btn btn-primary btn-number btn-small"  data-type="minus" data-field="quant[2]">
												<span style="margin:-4px" class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                        </span>
                                                        <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px" type="button" class="btn btn-primary btn-number btn-small" data-type="plus" data-field="quant[2]">
												  <span style="margin:-4px" class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-left" style="width:250px;">
                                                    <p class="" style="font-size:17px;font-weight:500">Drapes Crepe Printed Salwar Suit Dupatta Material</p>
                                                    <p>brand</p>
                                                    <p>brand</p>
                                                    <p><span style="font-size:20px;font-weight:500">₹522</span> &nbsp;&nbsp;
                                                        <span class="price-old" style="font-size:16px;color:#bbb">₹ 655</span>&nbsp;&nbsp;
                                                        <span class="site_col" style="font-size:18px;">10% off</span>&nbsp;&nbsp;</p>


                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-center">
                                    <div class="pull-left">
                                        <span style="color:#888;font-size:17px">Seller:</span>&nbsp;&nbsp;<span>Lorem Ipsum</span>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
								<div class="loop">
                                <div class="panel-body">
                                    <table class="table borderless">

                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="col-md-2">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaGHtakM-MNkXnCwvKIRpXPCWUk5IZpmo_vsfNm8RNVdWFP5zV" style="width: 72px; height: 72px;"> </a>

                                                    </div>
                                                    <br>
                                                    <div style="width:90px" class="input-group">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px;"type="button" class="btn btn-primary btn-number btn-small"  data-type="minus" data-field="quant[2]">
												<span style="margin:-4px" class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                        </span>
                                                        <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px" type="button" class="btn btn-primary btn-number btn-small" data-type="plus" data-field="quant[2]">
												  <span style="margin:-4px" class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-left" style="width:250px;">
                                                    <p class="" style="font-size:17px;font-weight:500">Drapes Crepe Printed Salwar Suit Dupatta Material</p>
                                                    <p>brand</p>
                                                    <p>brand</p>
                                                    <p><span style="font-size:20px;font-weight:500">₹522</span> &nbsp;&nbsp;
                                                        <span class="price-old" style="font-size:16px;color:#bbb">₹ 655</span>&nbsp;&nbsp;
                                                        <span class="site_col" style="font-size:18px;">10% off</span>&nbsp;&nbsp;</p>


                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-center">
                                    <div class="pull-left">
                                        <span style="color:#888;font-size:17px">Seller:</span>&nbsp;&nbsp;<span>Lorem Ipsum</span>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
								<div class="loop">
                                <div class="panel-body">
                                    <table class="table borderless">

                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="col-md-2">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaGHtakM-MNkXnCwvKIRpXPCWUk5IZpmo_vsfNm8RNVdWFP5zV" style="width: 72px; height: 72px;"> </a>

                                                    </div>
                                                    <br>
                                                    <div style="width:90px" class="input-group">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px;"type="button" class="btn btn-primary btn-number btn-small"  data-type="minus" data-field="quant[2]">
												<span style="margin:-4px" class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                        </span>
                                                        <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px" type="button" class="btn btn-primary btn-number btn-small" data-type="plus" data-field="quant[2]">
												  <span style="margin:-4px" class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-left" style="width:250px;">
                                                    <p class="" style="font-size:17px;font-weight:500">Drapes Crepe Printed Salwar Suit Dupatta Material</p>
                                                    <p>brand</p>
                                                    <p>brand</p>
                                                    <p><span style="font-size:20px;font-weight:500">₹522</span> &nbsp;&nbsp;
                                                        <span class="price-old" style="font-size:16px;color:#bbb">₹ 655</span>&nbsp;&nbsp;
                                                        <span class="site_col" style="font-size:18px;">10% off</span>&nbsp;&nbsp;</p>


                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-center">
                                    <div class="pull-left">
                                        <span style="color:#888;font-size:17px">Seller:</span>&nbsp;&nbsp;<span>Lorem Ipsum</span>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
								<div class="loop">
                                <div class="panel-body">
                                    <table class="table borderless">

                                        <tbody>
                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                            <tr>
                                                <td class="col-md-2">
                                                    <div class="media">
                                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaGHtakM-MNkXnCwvKIRpXPCWUk5IZpmo_vsfNm8RNVdWFP5zV" style="width: 72px; height: 72px;"> </a>

                                                    </div>
                                                    <br>
                                                    <div style="width:90px" class="input-group">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px;"type="button" class="btn btn-primary btn-number btn-small"  data-type="minus" data-field="quant[2]">
												<span style="margin:-4px" class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                        </span>
                                                        <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">
                                                        <span class="input-group-btn">
											  <button style="width:20px;padding:6px" type="button" class="btn btn-primary btn-number btn-small" data-type="plus" data-field="quant[2]">
												  <span style="margin:-4px" class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="text-left" style="width:250px;">
                                                    <p class="" style="font-size:17px;font-weight:500">Drapes Crepe Printed Salwar Suit Dupatta Material</p>
                                                    <p>brand</p>
                                                    <p>brand</p>
                                                    <p><span style="font-size:20px;font-weight:500">₹522</span> &nbsp;&nbsp;
                                                        <span class="price-old" style="font-size:16px;color:#bbb">₹ 655</span>&nbsp;&nbsp;
                                                        <span class="site_col" style="font-size:18px;">10% off</span>&nbsp;&nbsp;</p>


                                                </td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer text-center">
                                    <div class="pull-left">
                                        <span style="color:#888;font-size:17px">Seller:</span>&nbsp;&nbsp;<span>Lorem Ipsum</span>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                </div>
								
                            </div>
                            <!--SHIPPING METHOD END-->
                        </div>
                    </center>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <center>
		<div class="col-sm-12 col-xs-12 login-register-form m-b-3 text-left">
          <div class="title"><span>Please Enter Your Information</span></div>
          <form>
            <div class="form-group">
              <label for="emailInputLogin">Email address</label>
              <input type="email" class="form-control" id="emailInputLogin" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="passwordInputLogin">Password</label>
              <input type="password" class="form-control" id="passwordInputLogin" placeholder="Password">
            </div>
			 <div class="form-group">
              <label for="emailInputLogin">Email address</label>
              <input type="email" class="form-control" id="emailInputLogin" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="passwordInputLogin">Password</label>
              <input type="password" class="form-control" id="passwordInputLogin" placeholder="Password">
            </div> <div class="form-group">
              <label for="emailInputLogin">Email address</label>
              <input type="email" class="form-control" id="emailInputLogin" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="passwordInputLogin">Password</label>
              <input type="password" class="form-control" id="passwordInputLogin" placeholder="Password">
            </div>
			 <div class="form-group">
              <label for="emailInputLogin">Email address</label>
              <input type="email" class="form-control" id="emailInputLogin" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="passwordInputLogin">Password</label>
              <input type="password" class="form-control" id="passwordInputLogin" placeholder="Password">
            </div>
             <button type="submit" class="btn btn-primary "> Back</button>
          <button class="pull-right btn btn-primary btn-small" type="submit">Proceed to Checkout</span><span aria-hidden="true">&rarr;</span></button>
         
          </form>
        </div>
                    </center>
                </div>

                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                    <center>
                        <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                    </center>
                </div>

                <div class="bhoechie-tab-content">
                    <center>
                        <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                        <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                        <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<br>
<script>
    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
</script>
<script>
    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script>
    function pincodechange(val) {
        $("#hide_loc").hide();
        $("#show_loc").show();
    }
</script>