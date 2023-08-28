<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Category') }}
        </h2>
    </x-slot>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}


            <div class="col-12 mt-4">
                <label for="name" class="form-label">Kategori Produk</label>
                <input type="text" id="name" name="name" type="number"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" id="description" required name="description"
                    class="form-control shadow bg-white rounded">
            </div>

            </div>
            <div class="col-12">
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>

                <a  class ='btn-dager'href="{{ route('barang.create') }}">
                    <span>Ke Halaman Tambah Barang</span>
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
