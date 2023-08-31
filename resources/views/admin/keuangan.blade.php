<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Keuangan') }}
        </h2>
    </x-slot>

    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('alert'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">

        <div class="card shadow mb-4">
            <div class="card-body">
                {{-- <x-primary-button class="ml-4" onclick="window.location='{{ route('keuangan.create') }}'">
                    {{ __('Tambah Data') }}
                </x-primary-button>
                <x-primary-button class="ml-4" onclick="window.location='{{ route('createBank') }}'">
                    {{ __('Tambah Data Bank') }}
                </x-primary-button> --}}
                <!-- tabel -->
                <div class="mt-3 table-responsive" style="text-align: center">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="min-width: 60px">No</th>
                                <th style="min-width: 200px">Status Transaksi</th>
                                <th style="min-width: 200px">Jenis Transaksi</th>
                                <th style="min-width: 200px">Bank Tujuan</th>
                                <th style="min-width: 200px">Tanggal</th>
                                <th style="min-width: 200px">jumlah</th>
                                <th style="min-width: 200px">Transaksi No.</th>
                                <th style="min-width: 165px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dtHistory as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->status_transaction == 0)
                                            <ion-icon name="timer" style="font-size: 25px"></ion-icon>
                                        @else
                                            <ion-icon name="checkmark" style="font-size: 25px"></ion-icon>
                                        @endif
                                    </td>
                                    <td> {{ $item->type_name }} </td>
                                    <td>{{ $item->bank_name }} - {{ $item->acc_name }} -
                                        {{ $item->acc_no }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($item->date_time)) }}</td>
                                    <td>Rp.{{ number_format($item->amount / 1, 2) }}</td>
                                    <td>{{ $item->transaction_no }}</td>
                                    <td>
                                        @if ($item->status_transaction == 1)
                                            <a hidden href="{{ route('keuanganAdmin.edit', $item->id) }}"
                                                class="btn btn-circle btn-sm btn-warning">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                        @else
                                            <a href="{{ route('keuanganAdmin.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fa fa-info-circle"></i> Detail
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
