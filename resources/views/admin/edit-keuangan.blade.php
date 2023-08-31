<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaksi') }}
        </h2>
    </x-slot>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mt-3 table-responsive" style="text-align: center">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <form class="row g-3 container" method="post"
                            action="{{ route('keuanganAdmin.update', $transactionHistory->id) }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <tr>
                                <th style="width: 220px; vertical-align: top">Progress</th>
                                <td><select id="statustransaksi" style="width: 200px" name="statustransaksi"
                                        class="custom-select shadow bg-white rounded">
                                        <option>Pilih...</option>
                                        @if ($status->status_transaction == 0)
                                            <option value="0" selected>On Proses</option>
                                            <option value="1">Selesai</option>
                                        @else
                                            <option value="0">On Proses</option>
                                            <option value="1" selected>Selesai</option>
                                        @endif
                                    </select>
                                    <x-primary-button type="submit">
                                        {{ __('Simpan Data') }}
                                    </x-primary-button>
                                </td>
                            </tr>
                        </form>
                        <tr>
                            <th>Jenis Transaksi</th>
                            <td>{{ $transactionType->name }}</td>
                        </tr>
                        <tr>
                            <th>Bank Tujuan</th>
                            <td>{{ $bankAcc->bankName }} - {{ $bankAcc->name }} -
                                {{ $bankAcc->account_no }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Transaksi</th>
                            <td>{{ $transactionHistory->amount }}</td>
                        </tr>
                        <tr>
                            <th>Foto Struk</th>
                            <td><img src="{{ asset($transactionHistory->image) }}" class="img-thumbnail"
                                    style="width:100px" /></td>
                        </tr>
                        {{-- <tr>
                            <th style="vertical-align: top">Gambar</th>
                            <td style="align-items: center">
                                <div class="d-flex">
                                    @foreach ($productPicture as $item)
                                        <img src="{{ asset('images/' . $item->link) }}" class="rounded"
                                            style="width: 350px">
                                    @endforeach
                                </div>
                            </td>
                        </tr> --}}
                    </thead>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
