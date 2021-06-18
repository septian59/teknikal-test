@extends('admin.template.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Tambah Team</h5>
            </div>
            
            <div class="card-body">
                <form action="{{route('team.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Team</label>
                        <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" placeholder="masukan nama kota" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Logo">Logo Team</label>
                        <input type="file" name="logo" id="logo" class="form-control" >
                        @error('logo')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="tahun">Tahun Berdiri</label>
                        <input type="number" name="tahun" id="tahun" class="form-control @error ('tahun') is-invalid @enderror" placeholder="masukan tahun berdiri" value="{{old('tahun')}}">
                        @error('tahun')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="5" class="form-control @error ('alamat') is-invalid @enderror" placeholder="masukan alamat">{{old('alamat')}}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="city">Pilih Kota Asal</label>
                        <select name="city" id="city" class="form-control select2">
                            <option disabled selected>Pilih Satu city !!</option>
                            @foreach ($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <div class="mt-2 text-danger">
                            @error('city')
                            {{$message}}
                        @enderror
                        </div>
                    
    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tambah</button>
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

