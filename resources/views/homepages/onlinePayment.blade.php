@extends('homepages/base')


@section('ayush')
    
    <div class="container ">
        <div class="row">
            <div class="col-lg-10 mt-3 mb-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" class="d-flex">
                            @csrf
                            <input type="text" class="form-control" name="contact" placeholder="enter your registered Contact no">
                            <input type="submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- @if ($payment)
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
                    @foreach ($payment as $pay)
                        <tr>
                            <td>{{ $pay->id }}</td>
                            <td>{{ $pay->student->name }}</td>
                            <td>{{ $pay->due_date }}</td>
                            <td>{{ $pay->amount }}</td>
                            <td>
                                @if ($pay->status == "due")
                                <form action="{{ route('makePayment') }}" method="post">
                                    <input type="hidden" value="{{ $pay->student->contact }}" name="contact">
                                     <input type="hidden" value="{{ $pay->id }}" name="pay_id"> 
                                     @csrf
                                     <input type="submit" class="btn btn-success" value="Pay">
                                 </form>
                                @else 
                                <a href="" class="btn btn-success disabled">Paid</a>
                                @endif
                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endif --}}
    </div>
@endsection