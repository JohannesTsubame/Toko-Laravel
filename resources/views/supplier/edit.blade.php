@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    input {
        width: 100%;
        height: 5%;
        font-size: 90px;
    }

    form {
        justify-content: center;
        font-size: 20px;
    }

    form * {
        margin-top: 10px;
    }

    .card-body *{
        margin-top: 1%;
    }

    button {
        width: 100%;
        height: 7%;
        font-size: 20px;
    }
</style>

@extends("menu")
@section("content")

<div class="card" style="width:50%; margin: 0 auto">
    <div class="card-body" style="height: 100%; padding-bottom: 0px">
        <a href="{{ route('supplier.index') }}">
            <i class="icon ion-ios-arrow-back" style="font-size:40px"></i>
        </a>
        <form action="{{route('supplier.update', $supplier->id)}}" method="POST">
            @csrf
            @method("PUT")
            <h2>ID Supplier : </h2>
            <input type="text" name="id_supplier" required readonly value="{{old('id_supplier', $supplier->id_supplier)}}">
            <div class="error" style="margin-top: 10px">
                @error("id_supplier")
                    {{$message}}
                @enderror
            </div>

            <h2>Nama : </h2>
            <input type="text" name="nama" required value="{{old('nama', $supplier->nama)}}">
            <div class="error" style="margin-top: 10px">
                @error("nama")
                    {{$message}}
                @enderror
            </div>

            <h2>Alamat : </h2>
            <input type = "text" name="alamat" required value="{{old('alamat', $supplier->alamat)}}">
            <div class="error" style="margin-top: 10px">
                @error("alamat")
                    {{$message}}
                @enderror
            </div>

            <h2>Kode Pos :</h2>
            <input type="text" name="kode_pos" required value="{{old('kode_pos', $supplier->kode_pos)}}">
            <div class="error" style="margin-top: 10px">
                @error("kode_pos")
                    {{$message}}
                @enderror
            </div>

            <h2>Kota :</h2>
            <input type="text" name="kota" required value="{{old('kota', $supplier->kota)}}">
            <div class="error" style="margin-top: 10px">
                @error("kota")
                    {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="font-size:20px; margin:3% 0% 0% 0%">
                Save Data
            </button>
        </form>
    </div>
</div>

@endsection