@extends('layouts.app')
@section('content')

  <style>
    .accordion-item {
      border: none;
    }
    .accordion-button {
      background-color: #ffffff;
      border: none;
      text-align: left;
      padding: 1rem;
      border-radius: 0;
      font-weight: bold;
    }
    .accordion-button:focus {
      box-shadow: none;
    }
    .accordion-button.collapsed {
      background-color: #ffffff;
    }
    .accordion-body {
      padding: 0;
    }
    .accordion-body p {
      padding: 0.3rem;
      margin: 0;
    }

    h1
    {
        font-family: 'Hermione FREE' !important;
    }
    h3
    {
        font-family: 'Hermione FREE' !important;
    }
    h3
    {
        font-family: 'Hermione FREE' !important;
    }
    b
    {
        font-family: 'Futura BdCn BT' !important;
    }
    .collapse.show 
    {
        padding-left: 5%;   
    }
  </style>
</head>
<body>

    <div style="padding-top:15%;"></div>

    {{-- 

    - SHOPPING
1. Do I need to sign up for an account to order? udah
Yes, you have to register an account to purchase. The account will provide us with your personal details such as email address and shipping address, so you don't have to give us your information every time you shop.

2. Can I order items that are sold out? udah
We might be considering it, or perhaps the items are available in our stockists. Just hit the 'notify me when available' button.

3. Can I have special requests? udah
We will try as much as possible to fulfill your special requests, but to be sure, reach us at info@carawoman.co

Can I cancel my order? udah
You cannot cancel your order after submitting it. Please do review your shopping bag before submitting an order.

Can I add an item to my order after I confirm it? udah
Unfortunately, you cannot. You will need to place a new order for any additional items you want to purchase after confirming an order.

How do I pay my order?
Payment can be made via Bank Transfer in Indonesian Rupiah (IDR) for Indonesia Area. For International Payment can be made via PayPal (USD). --}}

  <div class="container mt-5">
    <h3 class="text-center mb-4">Frequently Asked Questions</h3>

    <div class="accordion" id="faqAccordion">


        {{-- SET 1 --}}

      <div class="accordion-item">
        
        <h6 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Shopping
          </button>
        </h6>

        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
            <div class="accordion-body">            
                <p><b>Do I need to sign up for an account to order?</b></p>    
                <p>
                    Yes, you have to register an account to purchase. 
                    The account will provide us with your personal details such as email address and shipping address, 
                    so you don't have to give us your information every time you shop.
                </p>
            </div>
            <div class="accordion-body">            
                <p><b>Can I order items that are sold out?</b></p>    
                <p>
                    We might be considering it, or perhaps the items are available in our stockists. Just hit the 'notify me when available' button.
                </p>
            </div>
            <div class="accordion-body">            
                <p><b>Can I have special requests?</b></p>    
                <p>
                    We will try as much as possible to fulfill your special requests, but to be sure, reach us at 
                    <a href="mailto:officiallyyours.ph@gmail.com">officiallyyours.ph@gmail.com</a> 
                </p>
            </div>
            <div class="accordion-body">            
                <p><b>Can I cancel my order?</b></p>    
                <p>
                    You cannot cancel your order after submitting it. Please do review your shopping bag before submitting an order.
                </p>
            </div>
            <div class="accordion-body">            
                <p><b>Can I add an item to my order after I confirm it?</b></p>    
                <p>
                    Unfortunately, you cannot. You will need to place a new order for any additional items you want to purchase after confirming an order.
                </p>
            </div>
            <div class="accordion-body">            
                <p><b>How do I pay my order?</b></p>    
                <p>
                    Payment can be made via Bank Transfer Philippines Peso (PHP) for Philippines area. For International Payment can be made via PayPal (USD).
                </p>
            </div>

        </div>     

      </div>

      {{-- END SET 1 --}}


      {{-- SET 2 START --}}

      {{-- <div class="container mt-5"> --}}
        {{-- <h2 class="text-center mb-4">Frequently Asked Questions</h2> --}}
        <div class="accordion" id="faqAccordion">
          <div class="accordion-item">
            <h6 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Deliveries
              </button>
            </h6>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
              <div class="accordion-body">            
                <p><b>How long does it take to receive my order?</b></p>
                <p>
                  Please allow 2-7 business days for domestic order and delivery process. For international shipping, it will depend on the destination.
                </p>
              </div>
              <div class="accordion-body">            
                <p><b>Can I schedule the time for my delivery?</b></p>
                <p>
                  We are sorry we don't have this option currently.
                </p>
              </div>
              <div class="accordion-body">            
                <p><b>Can I get my order earlier?</b></p>
                <p>
                  You can contact us through Viber or 
                  <a href="https://api.whatsapp.com/send/?phone=639064495863&text&type=phone_number&app_absent=0" target="_blank">
                    Whatsapp.
                  </a>
                </p>
              </div>
              <div class="accordion-body">            
                <p><b>How can I track my order?</b></p>
                <p>
                  After your order is processed, you will receive an email notifying you of the tracking number. 
                  You can use the tracking number to track your order.
                </p>
              </div>
              <div class="accordion-body">            
                <p><b>What should I do if my package comes late?</b></p>
                <p>
                  Please contact us 
                  <a href="https://api.whatsapp.com/send/?phone=639064495863&text&type=phone_number&app_absent=0" target="_blank">
                    here.
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      {{-- </div> --}}
            


      {{-- SET 2 END --}}


      {{-- set 3 start --}}

      <div class="accordion-item">
        <h6 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Return and Exchange
          </button>
        </h6>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
          <div class="accordion-body">            
            <p><b>What do I do if the size doesn't fit me?</b></p>
            <p>
              Unfortunately, we do not accept any exchanges or refunds regarding size issues. 
              Please refer to our sizing guide and product's description and make sure to order the right size.
            </p>
          </div>
          <div class="accordion-body">            
            <p><b>What do I do if I received a defective item?</b></p>
            <p>
              If you have received a defective item from us, 
              you may send us picture of the defect so we are able to decide whether you can exchange it or not. 
              Please write in to us at 
              <a href="mailto:officiallyyours.ph@gmail.com">officiallyyours.ph@gmail.com</a>
              or reach us through Viber or WhatsApp immediately for assistance.
            </p>
          </div>
          <div class="accordion-body">            
            <p><b>What if I receive a wrong item or wrong size?</b></p>
            <p>
              If you have received an incorrect item, please notify us within 3 working days after receiving the item 
              and we will process an exchange right away for the item you originally ordered with no charge and full reimbursement of your shipping cost.
            </p>
          </div>
          <div class="accordion-body">            
            <p><b>How do I return or exchange the defect or incorrect item?</b></p>
            <p>
              {{-- #todo --}}
              Check our Returns & Exchanges page.
            </p>
          </div>
        </div>
      </div>

      {{-- set 3 end --}}

      {{-- set 4 start --}}
      <div class="accordion-item">
        <h6 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Sizing Guide
          </button>
        </h6>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
          <div class="accordion-body">            
            <p><b>How do I choose my size?</b></p>
            <p>
              We have provided a size chart for each of our products. Please select the product you like, 
              and check its size chart on the product page. If you are not sure about your size, 
              use a measuring tape in centimeters to measure your bust, waist, and hip. 
              If you have any questions, please contact us and feel free to ask.
            </p>
          </div>
        </div>
      </div>
      
      {{-- set 4 end --}}
      



      {{-- <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Question 3: Where does it come from?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
          <div class="accordion-body">
            <p>
              Contrary to popular belief, Lorem Ipsum is not simply random text.
            </p>
          </div>
        </div>
      </div> --}}

      {{-- set 3 start --}}



    </div>
  </div>


  <div style="padding-top:15%;"></div>


@endsection