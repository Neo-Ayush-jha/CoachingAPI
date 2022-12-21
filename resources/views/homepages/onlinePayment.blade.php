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
        @if (isset($userDetails))
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
                        @php
                            $i =1;
                        @endphp
                            @foreach ($userDetails as $userDetail)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $userDetail->user->name }}</td>
                                <td>{{ $userDetail->created_at }}</td>
                                <td>{{ $userDetail->course->fee }}</td>
                                <td>
                                    <form action="{{ route('callback') }}" class="class="btn btn-success bg-success @if($userDetail->status=='paid') disabled @endif" method="POST" >
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $userDetail->course->id }}">
                                        <input type="hidden" name="user_id" value="{{ $userDetail->user->id }}">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="rzp_test_JcTEYdlpexwZV0"
                                        data-amount="{{ $userDetail->course->fee*100 }}" 
                                        data-currency="INR"
                                        data-buttontext="Pay {{ $userDetail->course->fee }} INR"
                                        data-name="{{ $userDetail->user->name }}"
                                        data-description="Rozerpay"
                                        data-image="https://boomi.com/wp-content/uploads/cws-logo.png"
                                        data-prefill.name="name"
                                        data-prefill.email="{{ $userDetail->user->email }}"
                                        data-theme.color="red"></script>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                    </table>
                </div>
            </div>        
        @endif
    </div>
@endsection