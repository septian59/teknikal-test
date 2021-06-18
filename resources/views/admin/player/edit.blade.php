@extends('admin.template.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">
                    Edit Pemain
                </h5>
            </div>
            <div class="card-body">
                <form action="{{route('player.update', $player)}}" method="POST" autocomplete="off" >
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Nama Pemain</label>
                        <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" placeholder="masukan nama pemain" value="{{old('name') ?? $player->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    
    
                    <div class="form-group">
                        <label for="team">Pilih Team</label>
                        <select name="team" id="team" class="form-control select2">
                            <option disabled selected>Pilih Satu team !!</option>
                            @foreach ($teams as $team)
                                <option {{$team->id == $player->team_id ? 'selected' : ""}} value="{{$team->id}}">{{$team->name}}</option>
                            @endforeach
                        </select>
                        <div class="mt-2 text-danger">
                            @error('team')
                            {{$message}}
                        @enderror
                        </div>
    
                    <div class="form-group">
                        <label for="position">Pilih Posisi</label>
                        <select name="position" id="position" class="form-control select2">
                            <option disabled selected>Pilih Satu position !!</option>
                            @foreach ($positions as $position)
                                <option {{$position->id == $player->position_id ? 'selected' : ""}} value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>
                        <div class="mt-2 text-danger">
                            @error('position')
                            {{$message}}
                        @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="berat">Berat Badan</label>
                            <input type="number" step="any" name="berat" id="berat" class="form-control @error ('berat') is-invalid @enderror" placeholder="masukan berat badan" value="{{old('berat') ?? $player->berat_badan}}">
                            @error('berat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Punggung</label>
                            <input type="number" name="nomor" id="nomor" class="form-control @error ('nomor') is-invalid @enderror" placeholder="masukan nomor punggung" value="{{old('nomor') ?? $player->nomor}}">
                            @error('nomor')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
        $('.select2').select2();
        });
    </script>
@endpush

