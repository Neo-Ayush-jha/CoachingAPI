
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title> Razorpay Payment Gateway </title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   <body>
      <div id="app">
         <main class="py-4">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-3 col-md-offset-6">
                     @if($message = Session::get('error'))
                     <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> {{ $message }}
                     </div>
                     @endif
                     @if($message = Session::get('success'))
                     <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> {{ $message }}
                     </div>
                     @endif
                     <div class="card card-default">
                        <div class="card-header">
                           Laravel 8- Razorpay Payment Gateway Integration
                        </div>
                        <div class="card-body text-center">
                           <form action="/payment" method="POST" >
                              @csrf
                              <script src="https://checkout.razorpay.com/v1/checkout.js"
                                 data-key="rzp_test_ISOwomsQzcDDQt"
                                 data-amount="504001" 
                                 data-currency="INR"
                                 data-buttontext="Pay 500 INR"
                                 data-name="Neo Ayush"
                                 data-description="Rozerpay"
                                 data-image="https://instagram.fpat3-3.fna.fbcdn.net/v/t51.2885-19/318029955_864019648273986_578016024937764370_n.jpg?stp=dst-jpg_s320x320&_nc_ht=instagram.fpat3-3.fna.fbcdn.net&_nc_cat=106&_nc_ohc=uXwz7qzuBjoAX-YfK6g&edm=AOQ1c0wBAAAA&ccb=7-5&oh=00_AfCMHONFG07gsNWvJDZB9syPqUVxo7c2VEANvxfaGzPKLw&oe=6395217C&_nc_sid=8fd12b"
                                 data-prefill.name="name"
                                 data-prefill.email="email"
                                 data-theme.color="#F37254"></script>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>
      </div>
   </body>
</html>
{{-- rzp_test_ISOwomsQzcDDQt
   53hKzsqH5MyVyXclZmscoHKP --}}