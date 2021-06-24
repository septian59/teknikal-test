@extends('admin.template.default')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<div class="row">
    <div class="col-lg-12 ">
        <div class="card shadow mb-4">
            <div class="d-flex card-header py-3 justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary">Data Pemain</h5>
              <a href="{{route('player.create')}}" class="btn btn-primary my-3">Tambah Pemain</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="dataTables" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemain</th>
                            <th>Team</th>
                            <th>Posisi</th>
                            <th>Berat Badan</th>
                            <th>Nomor Punggung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </div>
          </div>

    </div>
</div>

    <form action="" method="post" id="deletePlayer">
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
                responsive: true,
                ajax: '{{ route('player.data') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'team'},
                    {data: 'position'},
                    {data: 'berat_badan'},
                    {data: 'nomor'},
                    {data: 'action'},
                ]
            })
        })
    </script>
@endpush