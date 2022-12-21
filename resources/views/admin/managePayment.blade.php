@extends('admin/master')
@section('jha')
    <div class="row">
        <div class="col-8">
            <h2>Manage Payment</h2>
        </div>
        <div class="col-4">
            <div class="btn-group">
                <a href="" class="btn btn-success">Paid</a>
                <a href="" class="btn btn-danger">Due</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="btn btn-success mt-3">Payment lest</h2>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Amount</th>
                    <th>Payment Contact Number</th>
                    <th>Pay through</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($due_payment as $due)
                    <tr>
                        <td>{{$due->id}}</td>
                        <td>{{$due->user->name}}</td>
                        <td>{{$due->course->title}}</td>
                        <td>{{$due->amount}}</td>
                        <td>{{$due->payment_contact_number}}</td>
                        <td>{{$due->wallet}}</td>
                        <td>{{$due->dateOfPayment}}</td>
                        {{-- <td><span class="badge bg-danger rounded-pill">{{$due->status}}</span></td> --}}
                        <td><span class="badge bg-danger rounded-pill">{{$due->status}}</span></td>
                        <td><a href="" class="btn btn-success @if($due->status=='paid') disabled @endif">Pay</a></td>                   
                        {{-- <td><a href="{{route('admin.make.cashpayment',['user_id'=>$due->std_id,'id'=>$due->id])}}" class="btn btn-success @if($due->status=='paid') disabled @endif">Pay</a></td>                    --}}
                     </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection