@extends('admin/master')
@section('jha')
    <div class="row">
        <div class="col-8">
            <h2>Manage Payment</h2>
        </div>
        <div class="col-4">
            <div class="btn-group">
                <a href="{{route('admin.manage.payment.paid')}}" class="btn btn-success">Paid</a>
                <a href="{{route('admin.manage.payment.due')}}" class="btn btn-danger">Due</a>
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
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($payment as $due)
                    <tr>
                        <td>{{$due->id}}</td>
                        <td>{{$due->user->name}}</td>
                        <td>{{$due->amount}}</td>
                        <td>{{$due->due_date}}</td>
                        <td><span class="badge bg-danger rounded-pill">{{$due->status}}</span></td>
                        <td><a href="{{route('admin.make.cashpayment',['std_id'=>$due->student_id,'id'=>$due->id])}}" class="btn btn-success @if($due->status=='paid') disabled @endif">Pay</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection