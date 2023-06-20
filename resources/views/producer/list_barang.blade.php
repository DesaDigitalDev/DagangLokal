<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Barang') }}
        </h2>
    </x-slot>
        
    <div class="card shadow mb-4">
        <div class="card-body">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
            <!-- tabel -->
            <div class="mt-3 table-responsive">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 60px">No</th>
                            <th style="min-width: 200px">NIK</th>
                            <th style="min-width: 200px">No KK</th>
                            <th style="min-width: 200px">Nama</th>
                            <th style="min-width: 165px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12345</td>
                            <td>124324</td>
                            <td>test</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="#" onclick="return confirm('Hapus Data Penduduk ?')" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="5">Data Penduduk Tidak Ditemukan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>