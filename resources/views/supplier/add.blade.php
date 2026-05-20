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
        <form action="{{route('supplier.save')}}" method="POST">
            @csrf
            <h2>ID supplier : </h2>
            <input type="text" name="id_supplier" required>
            <div class="error" style="margin-top: 10px">
                @error("id_supplier")
                    {{$message}}
                @enderror
            </div>

            <h2>Nama : </h2>
            <input type="text" name="nama" required>
            <div class="error" style="margin-top: 10px">
                @error("nama")
                    {{$message}}
                @enderror
            </div>

            <h2>Alamat : </h2>
            <input type = "text" name="alamat" required>
        
            <h2>Kode Pos :</h2>
            <input type="text" name="kode_pos" required>
            <div class="error" style="margin-top: 10px">
                @error("id_pembeli")
                    {{$message}}
                @enderror
            </div>

            <h2>Kota :</h2>
            <input type="text" name="kota" required>

            <button type="submit" class="btn btn-primary" style="font-size:20px; margin:3% 0% 0% 0%">
                Save Data
            </button>
        </form>
    </div>
</div>
@endsection