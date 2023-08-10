            <div class="col-12 col-sm-12 col-md-4 col-lg-2">
                <div div class="card">
                    <img src="assets/img/dish1.jpg" class="card-img-top" width="75" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                        <div class="stars mb-2">
                            <i class="fa fa-solid fa-star rated"></i>      
                            <i class="fa fa-solid fa-star rated"></i>    
                            <i class="fa fa-solid fa-star"></i>   
                            <i class="fa fa-solid fa-star"></i>  
                            <i class="fa fa-solid fa-star"></i>              
                        </div>
                        <div class="pricing mb-2">
                            <div class="pricing-price">
                                <h1>Potensi Jual</h1>
                                <p>Rp. {{ $item['unit_price'] }}</p>
                            </div>
                            <div class="pricing-margin">
                                <h1>Margin</h1>
                                <p>50%</p>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <ul class="title">
                                <li><i class="fa fa-coins mr-2"></i></i>Margin</li>
                                <li><i class="fa fa-coins mr-2"></i>Minimum Jual</li>
                                <li><i class="fa fa-coins mr-2"></i>HPP Jual</li>
                            </ul>
                            <ul class="value">
                                <li>80.000</li>
                                <li>69.000</li>
                                <li>14.500</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-around mt-3">
                        <a href="#" class="btn btn-product">
                            <span>Lihat</span>    
                        </a>
                            
                    </div>
                </div>
            </div>
