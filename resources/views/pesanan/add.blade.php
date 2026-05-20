@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    input, select {
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
    <div class="card-body" style="height: fit-content; padding-bottom: 0px">
        <a href="{{ route('pesanan.index') }}">
            <i class="icon ion-ios-arrow-back" style="font-size:40px"></i>
        </a>
        <form action="{{route('pesanan.save')}}" method="POST">
            @csrf
            <h2>ID Pesanan : </h2>
            <input type="text" name="id_pesanan" required>
            <br/>

            <h2>Nama Barang :</h2>
            <select name="id_barang" required>
                <option value="">- - SELECT - -</option>
                @foreach($barang as $b)
                <option value="{{ $b->id }}">
                    {{ $b->nama }}
                </option>
                @endforeach
            </select>
            <br/>      

            <h2>Nama Pembeli :</h2>
            <select name="id_pembeli" required>
                <option value="">- - SELECT - -</option>
                @foreach($pembeli as $p)
                <option value="{{ $p->id }}">
                    {{ $p->nama }}
                </option>
                @endforeach
            </select>
            <br />

            <h2>Quantity :</h2>
            <input type="number" name="qty" required>
            <br/>

            <h2>Tanggal Pesanan :</h2>
            <input type="date" name="tgl_pesan" required>
            <br/>
            
            <button type="submit" class="btn btn-primary" style="font-size:20px; margin:3% 0% 0% 0%">
                Save Data
            </button>
        </form>
    </div>
</div>

@endsection