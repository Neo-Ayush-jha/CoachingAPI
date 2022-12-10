@extends('homepages/base')


@section('ayush')
    
    <div class="container ">
        <div class="row">
            
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


            <div class="col-lg-10 mt-3 mb-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('online-payment') }}" method="get" class="d-flex">
                            <input type="text" class="form-control" name="contact" placeholder="enter your registered Contact no">
                            <input type="submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($userDetail)
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    {{-- @foreach ($payment as $pay) --}}
                        <tr>
                            <td>{{ $userDetail->id }}</td>
                            <td>{{ $userDetail->name }}</td>
                            <td>{{ $userDetail->amount }}</td>
                            <td>
                                 <form action="/online-payment/call-back" method="POST" >
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                       data-key="rzp_test_ISOwomsQzcDDQt"
                                       data-amount="{{ $userDetail->course->fee*100 }}" 
                                       data-currency="INR"
                                       data-buttontext="Pay {{ $userDetail->course->fee }} INR"
                                       data-name="Neo Ayush"
                                       data-description="Rozerpay"
                                       data-image="https://instagram.fpat3-3.fna.fbcdn.net/v/t51.2885-19/318029955_864019648273986_578016024937764370_n.jpg?stp=dst-jpg_s320x320&_nc_ht=instagram.fpat3-3.fna.fbcdn.net&_nc_cat=106&_nc_ohc=uXwz7qzuBjoAX-YfK6g&edm=AOQ1c0wBAAAA&ccb=7-5&oh=00_AfCMHONFG07gsNWvJDZB9syPqUVxo7c2VEANvxfaGzPKLw&oe=6395217C&_nc_sid=8fd12b"
                                       data-prefill.name="name"
                                       data-prefill.email="email"
                                       data-theme.color="#F37254"></script>
                                 </form>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </table>
            </div>
        </div>
        @endif
    </div>
@endsection