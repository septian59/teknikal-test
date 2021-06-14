@extends('admin.template.default')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ubah City</h3>
        </div>

        <div class="box-body">
            <form action="{{route('city.update', $city)}}" method="POST" autocomplete="off">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" placeholder="masukan nama kota" value="{{old('name') ?? $city->name}}">
                    @error('name')
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
@endsection

