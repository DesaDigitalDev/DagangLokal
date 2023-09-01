<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaksi') }}
        </h2>
    </x-slot>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="mt-3 table-responsive" style="text-align: center">
                <form class="row g-3 container" method="post"
                    action="{{ route('keuanganAdmin.update', $transactionHistory->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
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
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Akun</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>No. Transaksi</th>
                                <td>{{ $transactionHistory->transaction_no }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Transaksi</th>
                                <td>{{ $transactionType->name }}</td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td>{{ $bankAcc->bankName }} - {{ $bankAcc->name }} -
                                    {{ $bankAcc->account_no }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Transaksi</th>
                                <td>{{ $transactionHistory->amount }}</td>
                            </tr>
                            @if ($transactionHistory->transaction_type_id == 1)
                                <tr>
                                    <th style="vertical-align: top">Upload Gambar</th>
                                    <td style="align-items: center">
                                        <div class="d-flex">
                                            {{ csrf_field() }}
                                            @method('PUT')
                                            <input id="buktitf" name="buktitf"
                                                class="form-control shadow bg-white rounded" type="file">
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <th style="vertical-align: top">Bukti Transfer</th>
                                    <td>
                                        <div class="d-flex">
                                            <img src="{{ asset($transactionHistory->image) }}" class="img-thumbnail"
                                                style="width:350px" />
                                        </div>
                                    </td>
                                </tr>
                            @endif


                        </thead>
                    </table>
                    <x-primary-button style="width: 150px" type="submit">
                        {{ __('Simpan Data') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
