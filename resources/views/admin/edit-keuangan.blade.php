<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaksi') }}
        </h2>
    </x-slot>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post"
            action="{{ route('keuanganAdmin.update', $transactionHistory->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="col-12 mt-4">
                <label for="statustransaksi" class="form-label">Status Transaksi</label>
                <select id="statustransaksi" name="statustransaksi" class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @if ($status->status_transaction == 0)
                        <option value="0" selected>On Proses</option>
                        <option value="1">Selesai</option>
                    @else
                        <option value="0">On Proses</option>
                        <option value="1" selected>Selesai</option>
                    @endif
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Tipe Transaksi</label>
                <select disabled id="inputState" id="tipeTransaksi" name="tipeTransaksi"
                    class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @foreach ($transactionType as $item)
                        <option value="{{ $item->id }}"
                            {{ $item->id == $transactionHistory->transaction_type_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Akun Bank</label>
                <select disabled id="inputState" id="akunBank" name="akunBank"
                    class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @foreach ($bankAcc as $item)
                        <option
                            value="{{ $item->id }}"{{ $item->id == $transactionHistory->bank_account_id ? 'selected' : '' }}>
                            {{ $item->bankName }} - {{ $item->name }} -
                            {{ $item->account_no }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Jumlah Transaksi</label>
                <input disabled type="text" id="jumTransaksi" value="{{ $transactionHistory->amount }}"
                    name="jumTransaksi" class="form-control shadow bg-white rounded">
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
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
