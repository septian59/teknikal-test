@extends('admin.template.default')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

<div class="row">
    <div class="col-lg-12 ">
        <div class="card shadow mb-4">
            <div class="d-flex card-header py-3 justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary">Data Team</h5>
              <a href="{{route('team.create')}}" class="btn btn-primary my-3">Tambah Team</a>
            </div>
            <div class="card-body">
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

    </div>
</div>
   
    <form action="" method="post" id="deleteTeam">
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
                ajax: '{{ route('team.data') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'logo_url'},
                    {data: 'tahun_berdiri'},
                    {data: 'alamat_team'},
                    {data: 'city'},
                    {data: 'action'},



                ]
            })
        })
    </script>
@endpush