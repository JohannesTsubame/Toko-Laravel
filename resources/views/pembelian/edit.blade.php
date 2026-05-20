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
        <a href="{{ route('pembelian.index') }}">
            <i class="icon ion-ios-arrow-back" style="font-size:40px"></i>
        </a>
        <form action="{{route('pembelian.update', $pembelian->id_pembelian)}}" method="POST">
            @csrf
            @method("PUT")
            <h2>ID Pembelian : </h2>
            <input type="text" name="id_pembelian" required readonly value="{{old('id_pembelian', $pembelian->id_pembelian)}}">
            <br/>

            <h2>Nama Barang : </h2> 
            <select name="id_barang">
                @foreach ($barang as $b)
                    <option value="{{$b->id}}" {{old('id_barang', $pembelian->id_barang) == $b->id ? 'selected' : ''}}>
                        {{$b->nama}}
                    </option>
                @endforeach
            </select>
            <br/>

            <h2>Nama Supplier : </h2> 
            <select name="id_supplier">
                @foreach ($supplier as $s)
                    <option value="{{$s->id}}" {{old('id_supplier', $pembelian->id_supplier) == $s->id ? 'selected' : ''}}>
                        {{$s->nama}}
                    </option>
                @endforeach
            </select>
            <br/>

            <h2>Quantity :</h2>
            <input type="text" name="qty" required value="{{old('qty', $pembelian->qty)}}">
            <br/>

            <h2>Tanggal Pembelian :</h2>
            <input type="date" name="tgl" required value="{{old('tgl', $pembelian->tgl)}}">
            <br/>
            
            <button type="submit" class="btn btn-primary" style="font-size:20px; margin:3% 0% 0% 0%">
                Save Data
            </button>
        </form>
    </div>
</div>

@endsection