@extends('admin/master')
@section('jha')
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <p class="fs-2">Manage {{$title}} Student</p>
                <hr>
            </div>
            <div class="col-3">
                <div class="btn-group">
                    <a href="{{route('admin.manage.student.active')}}" class="btn btn-danger">Active</a>
                    <a href="{{route('admin.manage.student.new')}}" class="btn btn-info">New</a>
                    <a href="{{route('admin.manage.student.passout')}}" class="btn btn-success">PassOut</a>
                </div>
            </div>
        </div>
                <table class="table table-hoverd table-bordered mt-3">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Contact</th>
                        <th>email</th>
                        <th>address</th>
                        <th>Apply Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->father_name}}</td>
                        <td>{{$student->contact}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->address}},{{$student->city}},({{$student->state}})</td>
                        <td>{{$student->created_at}}</td>
                        <td>
                            @if ($student->status !== "2")
                                <a href="{{route('admin.passout.student',["id"=>$student->id])}}" class="btn btn-danger btn-sm p-0"><i class="bi bi-trash"></i></a>
                            @endif
                            <a href="" class="btn btn-warning btn-sm p-0"><i class="bi bi-pen"></i></a>
                            <a href="" class="btn btn-info btn-sm p-0"><i class="bi bi-eye"></i></a>
                            @if ($student->status == 0)
                                <a href="{{route('admin.approve.student',["id"=>$student->id])}}" class="btn btn-success border border-1 btm-sm p-0"><i class="bi bi-check"></i></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
    </div>
@endsection