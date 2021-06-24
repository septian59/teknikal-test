@extends('admin.template.default')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif


<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-3">
            <div class="d-flex card-header py-3 justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Data Team</h5>
                <h1></h1>
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
                        </tr>
                    </thead>
                </table>
            </div> 
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ route('teamPlayer.data', $team) }}',
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name'},
                    {data: 'team'},
                    {data: 'posisi'},
                    {data: 'berat_badan'},
                    {data: 'nomor'},
                    



                ]
            })
        })
    </script>
@endpush