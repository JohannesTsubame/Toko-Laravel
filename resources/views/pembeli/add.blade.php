@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    input, select {
        width: 100%;
        height: 4%;
        font-size: 90px;
    }

    textarea {
        width: 100%;
        height: 10%;
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
        height: 5%;
        font-size: 20px;
    }
</style>

@extends("menu")
@section("content")

<div class="card" style="width:50%; margin: 0 auto">
    <div class="card-body" style="height: fit-content;">
        <a href="{{ route('pembeli.index') }}">
            <i class="icon ion-ios-arrow-back" style="font-size:40px"></i>
        </a>
        <form class="form-grid" action="{{route('pembeli.save')}}" method="POST">
            @csrf
            <div class="form-group">
                <h2>ID Pembeli :</h2>
                <input type="text" name="id_pembeli" required>
                <div class="error" style="margin-top: 10px">
                    @error("id_pembeli")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <h2>Nama :</h2>
                <input type="text" name="nama" required>
                <div class="error" style="margin-top: 10px">
                    @error("nama")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <h2>Kelamin :</h2>
                <select name="jns_kelamin" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <h2>Kode Pos :</h2>
                <input type="text" name="kode_pos" required>
                <div class="error" style="margin-top: 10px">
                    @error("kode_pos")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <h2>Kota :</h2>
                <input type="text" name="kota" required>
            </div>

            <div class="form-group">
                <h2>Tanggal Lahir :</h2>
                <input type="date" name="tgl_lahir" required>
            </div>

            <div class="form-group full">
                <h2>Alamat :</h2>
                <textarea name="alamat" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="font-size:20px">Save Data</button>
        </form>
    </div>
</div>
@endsection