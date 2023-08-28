<div class="col-12 col-sm-6 col-md-3 col-lg-2 g-2">
    <div div class="card card-clicked" data-card-id="{{ $item->id }}" style="cursor: pointer">
        <img src="/../assets/img/dish1.jpg"  class="card-img-top" alt="...">
        <div class="card-body">
            <div class="card-title">{{ $item->name }}</div>
            @php
                $formattedRating = number_format($item->rating_value);
            @endphp
            <div class="stars mb-2 mt-2">
                @for($i = 1; $i <= 5; $i++)
                    @if($formattedRating >= $i)
                        <i class="fas fa-star rated"></i>
                    @else
                        <i class="fas fa-star"></i>
                    @endif
                @endfor
            </div>
            <div class="pricing mb-2">
                <div class="pricing-price">
                    <h1>Potensi Jual</h1>
                    <p>Rp. {{ $item->unit_price }}</p>
                </div>
                <div class="pricing-margin">
                    <h1>Margin</h1>
                    <p>50%</p>
                </div>
            </div>
            <div class="pricing-detail">
                <ul class="title">
                    <li><i class="fa fa-coins mr-2"></i>Margin</li>
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
    </div>
</div>