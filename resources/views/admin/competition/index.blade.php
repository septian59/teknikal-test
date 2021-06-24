@extends('admin.template.default')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<div class="row">
    <div class="col-lg-12 ">
        <div class="card shadow mb-4">
            <div class="d-flex card-header py-3 justify-content-between">
              <h5 class="m-0 font-weight-bold text-primary">Data Competition</h5>
              <a href="" class="btn btn-primary my-3">Tambah Kompetisi</a>
            </div>
            <div class="card-body">
                <table id="dataTables" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Team 1</th>
                            <th>Team 2</th>
                            <th>Skor Team 1</th>
                            <th>Skor Team 2</th>
                        </tr>
                    </thead>
                </table>
            </div>
          </div>

    </div>
</div>

    {{-- <form action="" method="post" id="deletePlayer">
        @csrf
        @method('delete')
    <button type="submit" style="display: none">Delete</button>
    </form> --}}

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('competition.data') }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'tanggal_tanding'},
                    {data: 'team_id1'},
                    {data: 'team_id2'},
                    {data: 'skor_team1'},
                    {data: 'skor_team2'},
                ]
            })
        })
    </script>
@endpush