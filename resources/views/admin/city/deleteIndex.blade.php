@extends('admin.template.default')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">City Recyle</h3>
           
        </div>
        <div class="box-body">
            <table id="dataTables" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        
    </div>

    <form action="" method="get" id="deletePermanen">
       
    <button type="submit" style="display: none">Delete</button>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('city.delete') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'actionDel'},
                    
                ]
            })
        })
    </script>
@endpush