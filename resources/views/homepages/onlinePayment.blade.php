@extends('homepages/base')
@section('ayush')
    <div class="container ">
        <div class="row">
            <div class="col-lg-10 mt-3 mb-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('onlinePayment') }}" method="get" class="d-flex">
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
                        {{-- @foreach ($userDetail as $pay) --}}
                            <tr>
                                <td>{{ $userDetail->id }}</td>
                                <td>{{ $userDetail->name }}</td>
                                <td>{{ $userDetail->created_at }}</td>
                                <td>{{ $userDetail->course->fee }}</td>
                                <td>
                                    <form action="{{ route('callback') }}" method="POST" >
                                        @csrf
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="rzp_test_ISOwomsQzcDDQt"
                                        data-amount="{{ $userDetail->course->fee*100 }}" 
                                        data-currency="INR"
                                        data-buttontext="Pay {{ $userDetail->course->fee }} INR"
                                        data-name="Neo Ayush"
                                        data-description="Rozerpay"
                                        data-image="https://boomi.com/wp-content/uploads/cws-logo.png"
                                        data-prefill.name="name"
                                        data-prefill.email="email"
                                        data-theme.color="red"></script>
                                    </form>
                                </td>
                            </tr>
                        {{-- @endforeach --}}
                    </table>
                </div>
            </div>              
        @else:
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                    <tr>
                        <td>{{ $userDetail->id }}</td>
                        <td>{{ $userDetail->name }}</td>
                        <td>{{ $userDetail->amount }}</td>
                        <td>
                            
                        </td>
                    </tr>
            </table>            
        @endif
    </div>
@endsection