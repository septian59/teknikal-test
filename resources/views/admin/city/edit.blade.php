@extends('admin.template.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Ubah City</h5>
    </div>

    <div class="card-body">
        <form action="{{route('city.update', $city)}}" method="POST" autocomplete="off">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" placeholder="masukan nama kota..." value="{{old('name') ?? $city->name}}">
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
</div>
</div>

    
@endsection

