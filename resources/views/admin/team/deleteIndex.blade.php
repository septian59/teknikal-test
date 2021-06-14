@extends('admin.template.default')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Recyle Team</h3>
            <a href="{{route('team.create')}}" class="btn btn-primary my-3">Tambah Team</a>
        </div>
        <div class="box-body">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <table id="dataTables" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Team</th>
                        <th>Logo</th>
                        <th>Tahun Berdiri</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Aksi</th>
                       
                    </tr>
                </thead>
            </table>
        </div>
        
    </div>

    <form action="" method="get" id="cityPermanen">
        
    <button type="submit" style="display: none">Delete</button>
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('team.delete') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'logo_url'},
                    {data: 'tahun_berdiri'},
                    {data: 'alamat_team'},
                    {data: 'city'},
                    {data: 'actionDel'},



                ]
            })
        })
    </script>
@endpush