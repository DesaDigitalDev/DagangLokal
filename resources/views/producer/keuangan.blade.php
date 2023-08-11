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
                                        {{ $dtSaldo->balance }}
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
            {{-- <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-item-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penduduk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <x-primary-button class="ml-4" onclick="window.location='{{ route('keuangan.create') }}'">
                    {{ __('Tambah Data') }}
                </x-primary-button>
                <!-- tabel -->
                <div class="mt-3 table-responsive" style="text-align: center">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="min-width: 60px">No</th>
                                <th style="min-width: 200px">Jenis Transaksi</th>
                                <th style="min-width: 200px">Bank</th>
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
                                    <td> {{ $item->type_name }} </td>
                                    <td>{{ $item->bank_name }} - {{ $item->acc_name }} -
                                        {{ $item->acc_no }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->date_time)) }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->transaction_no }}</td>
                                    <td>
                                        <a href="{{ route('keuangan.edit', $item->id) }}"
                                            class="btn btn-circle btn-sm btn-warning">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('Hapus Data Keuangan ?')"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>Hapus
                                            </button>
                                        </form>
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
