<x-app-layout>
    <div class="container-fluid">
        <x-slot name="header">
            <div class="d-sm-flex align-items-center justify-content-left my-3 ms-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Dashboard') }}</h1>
            </div>                 
        </x-slot>
        
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2 bg-success">
                    <div class="card-body">
                        <div div class="row no-gutters align-items-center ">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Barang
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    23 pcs
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                    <div class="card-body">
                        <div div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sedang Diproses
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    23 pcs
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                    <div class="card-body">
                        <div div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Selesai
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    23 pcs
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-green">
                    <div class="card-body">
                        <div div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Saldo
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    23 pcs
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-float-whatsapp>
    </x-float-whatsapp>
</x-app-layout>
