<x-app-layout>
    <div class="container-fluid">
        <x-slot name="header">
            <div class="d-sm-flex align-items-center justify-content-left my-3 ms-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
            </div>                 
        </x-slot>
        
        <div class="row row-cols-1 row-cols-md-3 row-cols-sm-6 g-2">
            <x-product-card/>
            <x-product-card/>
            <x-product-card/>
            <x-product-card/>
        </div>

        <x-float-whatsapp/>
</x-app-layout>
