<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('StoreBank') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12 mt-4">
                <label for="namaBank" class="form-label">Nama Bank</label>
                <select id="namaBank" required id="namaBank" name="namaBank"
                    class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @foreach ($bankType as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamarekening" class="form-label">Nama Pemilik Rekening</label>
                <input required type="text" id="pemilikRekening" name="pemilikRekening"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="noRekening" class="form-label">No Rekening</label>
                <input type="text" id="noRekening" name="noRekening" class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="BankType" class="form-label">Tipe Bank</label>
                <select id="BankType" required id="BankType" name="BankType"
                    class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    <option value="pribadi">Pribadi</option>
                    <option value="bisnis">Bisnis</option>
                </select>
            </div>
            <div class="col-12">
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
