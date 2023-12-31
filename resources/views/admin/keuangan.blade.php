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
                                <th style="min-width: 200px">Jenis Transaksi</th>
                                {{-- <th style="min-width: 200px">Status Transaksi</th> --}}
                                <th style="min-width: 200px">Bank Tujuan</th>
                                <th style="min-width: 200px">Tanggal</th>
                                <th style="min-width: 200px">Jumlah</th>
                                {{-- <th style="min-width: 200px">Transaksi No.</th> --}}
                                <th style="min-width: 200px">Foto Struk</th>
                                <th style="min-width: 165px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @foreach ($dtHistory as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>

                                    </td> --}}
                                    <td> {{ $item->type_name }}<br>
                                        @if ($item->status_transaction == 0)
                                            <ion-icon name="timer" style="font-size: 25px"></ion-icon>
                                        @else
                                            <ion-icon name="checkmark" style="font-size: 25px"></ion-icon>
                                        @endif
                                    </td>
                                    <td>{{ $item->bank_name }} - {{ $item->acc_name }} -
                                        {{ $item->acc_no }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($item->date_time)) }}</td>
                                    <td>Rp.{{ number_format($item->amount / 1, 2) }}</td>
                                    {{-- <td>{{ $item->transaction_no }}</td> --}}
                                    <td>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $count }}">
                                            <img src="{{ asset($item->image) }}"
                                                class="img-thumbnail {{ empty($item->image) ? 'd-none' : '' }}"
                                                style="width:100px" />
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $count }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content ">
                                                    <div class="modal-body">
                                                        <img src="{{ asset($item->image) }}"
                                                            class="img-thumbnail {{ empty($item->image) ? 'd-none' : '' }}" />
                                                    </div>
                                                    <div class="modal-footer" style="padding: 0px">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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
                                <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
