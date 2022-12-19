@extends('admin/master')
@section('jha')
    <div class="flex gap-2">
        <div class="w-4/5 h-screen">
            <table class=" ">
                <div class="flex justify-between px-4 items-center mt-3">
                    <h2 class="text-2xl font-bold font-sans">Manage Placements</h2>
                    <a href="{{ route('placement.create') }}"
                        class="btn btn-success">Add New Placements</a>
                </div>
                <div class="px-3 mt-4">
                    <table class="table">
                        <tr>
                            <th class="border border-slate-400">S.No.</th>
                            <th class="border border-slate-400">Name</th>
                            <th class="border border-slate-400">Position</th>
                            <th class="border border-slate-400">Company Name</th>
                            <th class="border border-slate-400">Action</th>
                        </tr>
                        @foreach ($placement as $key => $item)
                            <tr>
                                <td class="border border-slate-400 p-1">{{ $key+1}}</td>
                                <td class="border border-slate-400 p-1">{{ $item->name }}</td>
                                <td class="border border-slate-400 p-1">{{ $item->position}}</td>
                                <td class="border border-slate-400 p-1">{{ $item->company_name}}</td>
                                <td class="border border-slate-400 p-1 flex gap-3">
                                    <a href="{{route('placement.edit',$item)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('placement.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </table>
        </div>
    </div>
@endsection