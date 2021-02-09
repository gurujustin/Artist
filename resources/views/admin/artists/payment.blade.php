<!DOCTYPE html>
<html lang="en">

<head>

    <title>.:TOP MUSIC EVENTS:. MAKE ONLINE PAYMENT</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/music2.css')}}">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>

    <script>
        $('.carousel').carousel();
    </script>

</head>

<body>


    <nav class="my_navbar fixed-top">
        <div class="row">
            <div class="col-md-4 top_left">
                <img src="{{asset('img/menu.png')}}" class="hover" />
            </div>
            <div class="col-md-4 top_middle">
                <img src="{{asset('img/logo.png')}}" class="hover" />
            </div>
            <div class="col-md-4 top_right">
                <img src="{{asset('img/search.png')}}" class="hover" /> &nbsp; &nbsp; <img src="{{asset('img/contact.png')}}" class="hover">
            </div>
        </div>
    </nav>

    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->

        <div class="top_section5">
            <div class="row" style="margin:0">
                <div class="col-md-12 top_box">
                    <h1>MAKE ONLINE PAYMENT</h1>
                </div>
            </div>
        </div>

        <div class="top_section22">

        </div>


        <div class="container">
            <h2 class="pay_head center">Choose Your Payment Option:</h2>
                <div class="row">

                    <div class="col-md-5 center">
                        <label for="pay">
                            <img src="{{asset('img/pay_paypal.jpg')}}" />
                            <h3 class="pay_label">Pay By Paypal</h3>
                            <input type="radio" value="Paypal" name="payment_method" id="pay" checked/> <span></span>
                        </label>
                    </div>
                    <div class="col-md-2 center">
                        <h1 class="dark_grey or">OR</h1>
                    </div>

                    <div class="col-md-5 center">
                        <label for="pay2">
                            <img src="{{asset('img/pay_stripe.jpg')}}" />
                            <h3 class="pay_label">Pay By Stripe</h3>
                            <input type="radio" value="Stripe" name="payment_method" id="pay2" /> <span></span>
                        </label>
                    </div>
                </div>

                <form action="{{route('payment-confirm')}}" method="POST" id="payform">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 center">
                            <div class="form-group row mt-5">
                                <label for="referid" class="col-sm-4 col-form-label" style="font-size:18px">Booking Number</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="referid" id="referid" type="text" placeholder="Your reference number" value="{{$referid}}"/>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <label for="amount" class="col-sm-4 col-form-label" style="font-size:18px">Amount(GBP)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"  id="amount" placeholder="Amount to pay (&pound;)" value="{{$amount}}"/>
                                </div>
                            </div>
                            <img src="{{asset('img/cards.jpg')}}" />
                        </div>
                    </div>
                </form>
                {{-- <div class="pay_now"><a href="payment_success.html"><button class="my_but4">PAY NOW</button></a></div> --}}
                <div class="content text-center" style="margin: 75px auto;">
                    <div class="links">
                        <div id="paypal-button"></div>
                    </div>
                </div>

        </div>

        <div class="site_bottom">

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h3>More Info:</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Wedding Events</a></li>
                            <li><a href="#">Corporate Events</a></li>
                            <li><a href="#">Paty Events</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Latest News</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3 class="hide">Hidden</h3>
                        <ul>
                            <li><a href="#">For Musicians</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>

                    </div>
                    <div class="col-md-3">
                        <h3>Subscribe:</h3>
                        <div>
                            Subscribe to our newsletter to have access to the latest news, updates and offers.
                        </div>
                        <input class="subscribe" placeholder="Your e-mail address" />
                        <br />
                        <button class="my_but3">Subscribe Now</button>

                    </div>
                    <div class="col-md-3">
                        <h3>Contact Us:</h3>

                        <div>
                            <strong>Tel:</strong> 0780 9671 303<br>
                            <strong>E-mail:</strong> <a href="mailto:info@topmusicevents.uk">info@topmusicevents.uk</a>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6"><strong>Our Office:</strong>
                                    <br>
                                    92 Station Road<br>
                                    N3 2QJ London</div>
                                <div class="col-md-6"><img src="{{asset('img/logo.png')}}" style="width:115px" /></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8 foot_left">
                    &copy;2020 Copyrights TOP MUSIC EVENTS | All Rights Reserved Worldwide | Powered by KS
                </div>
                <div class="col-md-4 foot_right">
                    FIND US: <img src="{{asset('img/soc.png')}}" />
                </div>
            </div>
    </footer>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>

        paypal.Button.render({
          // Configure environment
          env: 'sandbox',
          client: {
            sandbox: 'ATdfsZSGwT3YgNOAo-aKsNjWzktt3z8ckL9uyjlQKw07xGNF1BNyfiLvhgCsIbYWr09siauz1KpZCG9f',
            production: 'EHprO7QbFZ54MfHEzm23RANmeDOtx8f7179kg8hLcDAVnGPc0mgfjLC8jvDtOpVogtdJkYjmU6QKLh7w'
          },
          // Customize button (optional)
          locale: 'en_US',
          style: {
            size: 'large',
            color: 'gold',
            shape: 'rect',
            label: 'paypal',
            tagline: false
          },

          // Enable Pay Now checkout flow (optional)
          commit: true,

          // Set up a payment
          payment: function(data, actions) {
            return actions.payment.create({
              transactions: [{
                amount: {
                  total: '{{$amount}}',
                  currency: 'GBP'
                }
              }]
            });
          },
          // Execute the payment
          onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
              // Show a confirmation message to the buyer
              document.body.querySelector('#payform').submit();
            });
          }
        }, '#paypal-button');
    </script>
</body>

</html>
