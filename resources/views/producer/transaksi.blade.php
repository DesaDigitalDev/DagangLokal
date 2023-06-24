<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('simpan-transaksi') }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Tipe Transaksi</label>
                <select id="inputState" required id="tipeTransaksi" name="tipeTransaksi"
                    class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @foreach ($transactionType as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Akun Bank</label>
                <select id="inputState" required id="akunBank" name="akunBank"
                    class="form-select shadow bg-white rounded">
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
                <input required type="text" id="jumTransaksi" name="jumTransaksi"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">no transaksi</label>
                <input type="text" id="noTransaksi" name="noTransaksi" value="1"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12">
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
