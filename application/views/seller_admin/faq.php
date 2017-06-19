 <div class="navigation">
      <nav class="navbar navbar-default hm_nav">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <!--<a class="navbar-brand" href="#">Brand</a>--> 
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url(); ?>seller_admin/login">HOME <span class="sr-only">(current)</span></a></li>
              <li><a href="<?php echo base_url(); ?>seller_admin/benifits">BENIFITS</a></li>
			  <li><a href="<?php echo base_url(); ?>seller_admin/howitworks">HOW IT WORKS</a></li>
              <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HOW IT WORKS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>-->
              <li><a href="<?php echo base_url();?>seller_admin/pricing_calculator">PRICINGS</a></li>
			  <li class="active"><a href="<?php echo base_url();?>seller_admin/faq">FAQ's</a></li>
              <!--<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HELP <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php //echo base_url();?>seller_admin/faq">FAQ's</a></li>
              <li><a href="<?php //echo base_url();?>seller_admin/LearningCenter">Learning Center</a></li>
            </ul>
          </li>-->
            </ul>
          </div>
          <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
      </nav>
    </div>
  </div>
  
  <!--header part end here --> 
  <!--body start here -->
  <div class="faq_main">
    <div class="container">
      <h1 class="head_title">FAQ's</h1>
      <div class="faq"> 
        
        <!--<h1 onclick="document.getElementById('gry').style.display='block'">GETTING STARTED</h1>-->
        <h1 data-toggle="collapse" data-target="#gry">GETTING STARTED</h1>
        <div class="demo"> 
          <!--<div id="gry" style="display:none">-->
          <div id="gry" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="more-less glyphicon glyphicon-plus"></i> Why should I sell on CARTINHOUR? </a> </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">CARTINHOUR is the new revolution in Indian e-commerce with ability to reach maximum online and highest credibility. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <i class="more-less glyphicon glyphicon-plus"></i> Who can sell on CARTINHOUR?</a> </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body"> Anyone selling new and genuine products is welcome. In order to start selling, you need to have the following:
                    <ul class="checkmark">
                      <li>PAN Card (Personal PAN for business type “Proprietorship” and Personal + Business PAN for business type as “Company”)</li>
                      <li>VAT/TIN Number (not mandatory for books)</li>
                      <li>Bank account and supporting KYC documents (Address Proof, and Cancelled cheque)</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i> How do I sell on CARTINHOUR?</a> </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">To sell on CARTINHOUR:
                    <ul class="checkmark">
                      <li>Register yourself at seller.CARTINHOUR.com.</li>
                      <li>List your products under specific product categories.</li>
                      <li>Once an order is received, pack the product and mark it as ‘Ready to go’. Our delivery boy will pick up the product and deliver it to the customer.</li>
                      <li>Once an order is successfully dispatched, CARTINHOUR will settle your payment within 7-14 business days. </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfour">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefpor" aria-expanded="false" aria-controls="collapsefpor"> <i class="more-less glyphicon glyphicon-plus"></i> Can I offer both products and services on CARTINHOUR?</a> </h4>
                </div>
                <div id="collapsefpor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                  <div class="panel-body">Currently, you can sell only products and not services on CARTINHOUR. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfive">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive"> <i class="more-less glyphicon glyphicon-plus"></i> Do I need to courier my products to CARTINHOUR?</a> </h4>
                </div>
                <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                  <div class="panel-body">No, CARTINHOUR will handle shipping of your products. All you need to do is pack the product and keep it ready for dispatch. Our delivery boy will pick up the product from you and deliver it to the customer. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="six">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix"> <i class="more-less glyphicon glyphicon-plus"></i> What are the documents required to register as a seller on CARTINHOUR?</a> </h4>
                </div>
                <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="six">
                  <div class="panel-body">You are required to have the following documents:
                    <ul class="checkmark">
                      <li>PAN Card (Personal PAN for business type “Proprietorship” and Personal + Business PAN for business type as “Company”)</li>
                      <li>VAT/TIN Number (not mandatory for books)</li>
                      <li>Bank account and supporting KYC documents (Address Proof, and Cancelled Cheque)</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="seven">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseseven"> <i class="more-less glyphicon glyphicon-plus"></i> I do not have a TIN/VAT, can I still register as a seller with only PAN?</a> </h4>
                </div>
                <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="seven">
                  <div class="panel-body">You can register as a seller with only PAN, but you will be eligible to sell only books. If you want to sell any other product, you will mandatorily require a VAT/TIN. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="eight">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapeight" aria-expanded="false" aria-controls="collapeight"> <i class="more-less glyphicon glyphicon-plus"></i> Who decides the price of the products?</a> </h4>
                </div>
                <div id="collapeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="eight">
                  <div class="panel-body">As a seller, you will set the price of your products. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="nine">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapnine" aria-expanded="false" aria-controls="collapnine"> <i class="more-less glyphicon glyphicon-plus"></i> Will I get charged for listing products on CARTINHOUR?</a> </h4>
                </div>
                <div id="collapnine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="nine">
                  <div class="panel-body">No. Listing of products on CARTINHOUR.com is free. CARTINHOUR does not charge anything for listing your catalogue online. You only pay a small commission for what you sell. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="ten">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapten" aria-expanded="false" aria-controls="collapten"> <i class="more-less glyphicon glyphicon-plus"></i> Who takes care of the delivery of my products?</a> </h4>
                </div>
                <div id="collapten" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ten">
                  <div class="panel-body">Our delivery boy will pick up the product from you and deliver it to the customer. All you need to do is keep it packed and ready for dispatch. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="eleven">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapeleven" aria-expanded="false" aria-controls="collapeleven"> <i class="more-less glyphicon glyphicon-plus"></i> How and when will I get paid?</a> </h4>
                </div>
                <div id="collapeleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="eleven">
                  <div class="panel-body">The payment will be made directly to your bank account through NEFT transactions within 7-14 business days of dispatching an order. The actual payment period will vary depending on how long you have been selling at CARTINHOUR, your customer ratings and number of orders fulfilled.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="teivel">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapteivel" aria-expanded="false" aria-controls="collapteivel"> <i class="more-less glyphicon glyphicon-plus"></i> When can I start selling?</a> </h4>
                </div>
                <div id="collapteivel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="teivel">
                  <div class="panel-body">After all the required documents have been verified and your seller profile is complete, you can start listing your products and start selling.</div>
                </div>
              </div>
            </div>
          </div>
          <!-- panel-group -->
          <h1 data-toggle="collapse" data-target="#price">PRICING AND PAYMENTS</h1>
          <div id="price" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="price1">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapprice1" aria-expanded="false" aria-controls="collapprice1"> <i class="more-less glyphicon glyphicon-plus"></i> Who decides the price of the product?</a> </h4>
                </div>
                <div id="collapprice1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="price1">
                  <div class="panel-body">As a seller, you will set the price of your products. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="price2">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapprice2" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i> What are the fees charged?</a> </h4>
                </div>
                <div id="collapprice2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="price2">
                  <div class="panel-body">The following deductions are made from the order item value:
                    <ul class="checkmark">
                      <li>CIH fee: A percentage of the order item value vary based on vertical/sub-category. Check your CIH fee for your product here.</li>
                      <li>Shipping fee (calculated on the basis of the product weight, shipping location and)</li>
                      <li>Collection fee: This will vary based on order item value and customer payment mode (Prepaid/Cash on Delivery) </li>
                      <li>selling fee: A slab wise Fixed fee. This vary based on Order item value</li>
                      <li>Service tax (applicable on all the above components)</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="price3">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapprice3" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>What is CIH fee and how much commission is charged?</a> </h4>
                </div>
                <div id="collapprice3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="price3">
                  <div class="panel-body">Commission fee is a certain percentage of the order item value of your product. It differs across categories and vertical/sub-categories. Check here for your product.
                    Please give an example to show the cost calculation.
                    Here’s an easy example, which illustrates a sample the above calculation:
                    <table class="table table-bordered table-responsive cat">
                      <thead class="thead-inverse">
                        <tr>
                          <th>ITEM</th>
                          <th>AMOUNT (RS.)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Product Price (decided by you)</td>
                          <td>1500</td>
                        </tr>
                        <tr>
                          <td>CIH Fee (varies across sub-categories/verticals)</td>
                          <td>150 (assuming 10%)</td>
                        </tr>
                        <tr>
                          <td>Shipping Fee (Local shipping, weight 500 grams)</td>
                          <td>30</td>
                        </tr>
                        <tr>
                          <td>Deliveryservice Fee (1.3% on the Order item value)</td>
                          <td>19.5</td>
                        </tr>
                        <tr>
                          <td>Selling Fee</td>
                          <td>20</td>
                        </tr>
                        <tr>
                          <td>Total Fee</td>
                          <td>219.5</td>
                        </tr>
                        <tr>
                          <td>Service Tax (15% of Marketplace Fee including Swachh Bharat &Krishi Kalyan cess)</td>
                          <td>32.925</td>
                        </tr>
                        <tr>
                          <td>Total deductions</td>
                          <td>252.425</td>
                        </tr>
                        <tr>
                          <td>Settlement Value (Amount credited to you)</td>
                          <td>1247.575</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="price4">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapprice4" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>How and when do I get paid?</a> </h4>
                </div>
                <div id="collapprice4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="price4">
                  <div class="panel-body">All payments are made through NEFT transactions (online banking). The payment is made directly to your bank account within the next 7-15 business days from the date of order dispatch. </div>
                </div>
              </div>
            </div>
          </div>
          <h1 data-toggle="collapse" data-target="#list">LISTINGS AND CATALOG</h1>
          <div id="list" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="list1">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaplist1" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>What is listing?</a> </h4>
                </div>
                <div id="collaplist1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list1">
                  <div class="panel-body">Listing a product refers to filling out all the necessary information and adding images of the product so that a customer can make an informed buying decision. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="list2">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaplist2" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>How do I list my products on CARTINHOUR?</a> </h4>
                </div>
                <div id="collaplist2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list2">
                  <div class="panel-body">We give you a step-by-step process of how to list your products on our website. It is important to choose the most suitable category to list your product as it will help customers find your products faster. Based on the category you choose, you'll be asked to include product details such as size, model, colour, etc. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="list3">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaplist3" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Can I get help for development of catalogue (product images, description, etc.)?</a> </h4>
                </div>
                <div id="collaplist3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list3">
                  <div class="panel-body">Yes, we are happy to help you at every stage while doing business with us. We help you connect with industry experts for the development of your catalogues. With the help of our catalogue partners across India, you can have attractive images and crisp content developed at unbeatable prices. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="list4">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaplist4" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>How does a catalogue partner help me?</a> </h4>
                </div>
                <div id="collaplist4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list4">
                  <div class="panel-body">Our catalogue partners develop high-quality photographs of your products and crisp product descriptions for your product catalogue. A good catalogue gives your customers a better understanding of your products and helps boost your sales. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="list5">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaplist5" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>How do I price my products?</a> </h4>
                </div>
                <div id="collaplist5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list5">
                  <div class="panel-body">When pricing products on CARTINHOUR, please account for the applicable Marketplace Fee and include a suitable margin to arrive at the Selling Price. For ease of calculation, you can use our Commission Calculator widget once onboarded. </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="list6">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaplist6" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Will I get charged for listing products on CARTINHOUR?</a> </h4>
                </div>
                <div id="collaplist6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="list6">
                  <div class="panel-body">No. Listing of products on CARTINHOUR.com is free. CARTINHOUR does not charge anything to you for listing your catalogue online. You only pay a small commission for what you sell. </div>
                </div>
              </div>
            </div>
          </div>
          <h1 data-toggle="collapse" data-target="#order">ORDER MANAGEMENT AND SHIPPING</h1>
          <div id="order" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="order1">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaporder1" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Who takes care of the delivery of my products?</a> </h4>
                </div>
                <div id="collaporder1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="order1">
                  <div class="panel-body">Our delivery boy will pick up the product from you and deliver it to the customer. All you need to do is keep it packed and ready for dispatch.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="order2">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaporder2" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>What should I do if my area is not serviceable by CARTINHOUR?</a> </h4>
                </div>
                <div id="collaporder2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="order2">
                  <div class="panel-body">During registering, save the details of your pin code and click on the Continue button. You will be notified via e-mail when your pin code becomes serviceable.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="order3">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaporder3" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>How do I manage my orders on CARTINHOUR?</a> </h4>
                </div>
                <div id="collaporder3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="order3">
                  <div class="panel-body">Through our seller dashboard, we make it easy for you to manage your orders. Whenever a customer places an order, we send you an email or phone message alert. You need to pack the order and keep it ready for dispatch within the time frame provided by you and inform us through the seller portal. This will alert our delivery boy to pick up the product from you.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="order4">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collaporder4" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Does CARTINHOUR provide packaging material?</a> </h4>
                </div>
                <div id="collaporder4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="order4">
                  <div class="panel-body">We have a strong network of best packaging material providers in the industry. We can connect you with them to get good quality packaging material which impresses the customers and ensures your products remain undamaged.</div>
                </div>
              </div>
            </div>
          </div>
          <h1 data-toggle="collapse" data-target="#return">RETURNS AND SELLER PROTECTION</h1>
          <div id="return" class="collapse">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="return1">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapreturn1" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>What protection does CARTINHOUR offer in case of lost/damaged goods and fraudulent customer claims?</a> </h4>
                </div>
                <div id="collapreturn1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="return1">
                  <div class="panel-body">CARTINHOUR has set up a Seller safety scheme (SSS) to protect our sellers against fraud. You can request for SSS claim through the seller dashboard. When the buyer or delivery boy is at fault, you will receive due compensation.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="return2">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapreturn2" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Would I get compensation if the customer has returned damaged products?</a> </h4>
                </div>
                <div id="collapreturn2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="return2">
                  <div class="panel-body">Yes, you can raise a claim through Seller safety scheme. Depending on the case and category, you will be given a refund provided you have adequate proof that you shipped an authentic/undamaged product. This will help us close the dispute in your favour.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="return3">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapreturn3" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Would I get compensation if the customer has replaced the original product with a different item?</a> </h4>
                </div>
                <div id="collapreturn3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="return3">
                  <div class="panel-body">Yes, you can raise a claim through Seller safety scheme. Depending on the case and category, you will be given a refund provided you have adequate proof that you shipped the right product. This will help us close the dispute in your favour.</div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="return4">
                  <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapreturn4" aria-expanded="false" aria-controls="collapseThree"> <i class="more-less glyphicon glyphicon-plus"></i>Would I get compensation if the goods are damaged or lost in transit?</a> </h4>
                </div>
                <div id="collapreturn4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="return4">
                  <div class="panel-body">Yes. When your products are damaged in transit, you can raise a claim under the Seller safety scheme. The refund depends on the scenario and product.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- container --> 
        
      </div>
    </div>
  </div>
  
  <!--body end here --> 