<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/style.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Tambah Data Barang Produsen</title>
</head>

<body>
    <h1 class="container">Tambah Barang</h1>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('simpan-transaksi') }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Tipe Transaksi</label>
                <select id="inputState" id="tipeTransaksi" name="tipeTransaksi"
                    class="form-select shadow bg-white rounded">
                    <option selected>Pilih...</option>
                    @foreach ($transactionType as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Akun Bank</label>
                <select id="inputState" id="akunBank" name="akunBank" class="form-select shadow bg-white rounded">
                    <option selected>Pilih...</option>
                    @foreach ($bankAcc as $item)
                        <option value="{{ $item->id }}">{{ $item->bankName }} - {{ $item->bankAccName }} -
                            {{ $item->ac }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputState" class="form-label">Saldo Anda</label>
                <select id="inputState" id="saldo" name="saldo" class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @foreach ($userBalance as $item)
                        <option value="{{ $item->id }}" selected>{{ $item->balance }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Jumlah Transaksi</label>
                <input type="text" id="jumTransaksi" name="jumTransaksi"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">user</label>
                <input type="text" id="user" name="user" value="1"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">no transaksi</label>
                <input type="text" id="noTransaksi" name="noTransaksi" value="1"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-3 shadow rounded">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>
