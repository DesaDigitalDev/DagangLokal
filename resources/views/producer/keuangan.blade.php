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
        <div class="row my-3">
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-item-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Anda</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if (is_null($dtSaldo))
                                        0
                                    @elseif (!is_null($dtSaldo))
                                        Rp.{{ number_format($dtSaldo->balance / 1, 2) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-item-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Transaksi
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dtTrxUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-item-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Withdraw
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp.{{ number_format($dtTrxUserTotal / 1, 2) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <x-primary-button class="ml-4" onclick="window.location='{{ route('keuangan.create') }}'">
                    {{ __('Withdraw') }}
                </x-primary-button>
                <x-primary-button class="ml-4" onclick="window.location='{{ route('createBank') }}'">
                    {{ __('Tambah Data Bank') }}
                </x-primary-button>
                <!-- tabel -->
                <div class="mt-3 table-responsive" style="text-align: center">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="min-width: 60px">No</th>
                                <th style="min-width: 200px">Status Transaksi</th>
                                <th style="min-width: 200px">Jenis Transaksi</th>
                                <th style="min-width: 200px">Bank Tujuan</th>
                                <th style="min-width: 200px">Tanggal Transasksi</th>
                                <th style="min-width: 200px">Jumlah</th>
                                <th style="min-width: 200px">Transaksi No.</th>
                                <th style="min-width: 200px">Foto Resi</th>
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
                                    <td>{{ $item->image }}</td>
                                    <td>
                                        {{-- <a href="{{ route('keuangan.edit', $item->id) }}"
                                            class="btn btn-circle btn-sm btn-warning">
                                            <i class="fa fa-edit"></i> Edit
                                        </a> --}}
                                        @if ($item->status_transaction == 1)
                                            <form hidden action="{{ route('keuangan.destroy', $item->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Hapus Data Keuangan ?')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>Batalkan
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Transaksi ?')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>Batalkan
                                                </button>
                                            </form>
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
