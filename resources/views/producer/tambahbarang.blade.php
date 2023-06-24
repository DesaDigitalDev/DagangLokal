<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('simpan-barang') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">Gudang</label>
                <input type="text" id="gudang" value="0" name="gudang"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">Stock</label>
                <input type="text" id="stock" value="0" name="stock"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama perusahaan</label>
                <input type="text" id="vendor" required name="vendor"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama Produk</label>
                <input type="text" id="name" required name="name"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Kategori</label>
                <select id="category" name="category" required class="form-select shadow bg-white rounded">
                    <option selected>Pilih...</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Harga Produk</label>
                <input type="text" id="price required" name="price" type="number"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">BPOM No. (Optional)</label>
                <input type="text" id="bpom" required name="bpom"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Berat Produk</label>
                <input type="text" id="weight" required name="weight"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12">
                <label for="inputdeskripsiproduk" class="form-label">Deskripsi Produk (Manfaat,Keunggulan produk,
                    dll)</label>
                <textarea type="text" id="desc" required name="desc" class="form-control shadow bg-white rounded"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Foto Produk</label>
                <input id="productPic" required name="productPic[]" multiple
                    class="form-control shadow bg-white rounded" type="file" multiple>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Foto Resi (Sample minimal 2)</label>
                <input id="productPack" required name="productPack[]" multiple
                    class="form-control shadow bg-white rounded" type="file" multiple>
            </div>
            <div class="col-12">
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
