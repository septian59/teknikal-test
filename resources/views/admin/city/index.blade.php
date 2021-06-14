@extends('admin.template.default')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data City</h3>
            <a href="{{route('city.create')}}" class="btn btn-primary my-3">Tambah City</a>
        </div>
        <div class="box-body">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table id="dataTables" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Kota</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
        
    </div>

    <form action="" method="post" id="deleteForm">
        @csrf
        @method('delete')
    <button type="submit" style="display: none">Delete</button>
    </form>

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('city.data') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'action'},
                ]
            })
        })
    </script>
@endpush