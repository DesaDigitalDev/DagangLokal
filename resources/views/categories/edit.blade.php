<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot> --}}
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('categories.update', $categories->id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="col-12 mt-4">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" id="name" name="name" value="{{ $categories->name }}"
                    class="form-control shadow bg-white rounded">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea type="text" id="description" name="description" class="form-control shadow bg-white rounded">{{ $categories->description }}</textarea>
            </div>
            <div class="col-12">
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
