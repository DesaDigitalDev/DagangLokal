<div class="wrapper edge mx-auto mt-3" style="background-color: rgba(255, 255, 255, 0.794);">
    <div class="comment">
        <div class="row">
            <div class="col">
                <div class="comment-detail mb-2">
                    <div class="user-detail">
                        <img src="/../assets/img/dish1.jpg" alt="">
                    </div>
                    <div class="user-rate">
                        <div class="user-name">
                            <p class="mb-1"> {{ $comment->name }} <span class="mb-1"> - {{ $comment->formatted_created_at }} </span></p>
                        </div>
                        <div class="user-ratingvalue">  
                            @for($i = 1; $i <= $comment->rating_value; $i++)
                                <i class="fas fa-star rated"></i>
                            @endfor
                            @for($j = $comment->rating_value+1; $j <= 5; $j++ )
                                    <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="comment-detail col-12">
                    <div class="user-comment"> 
                        <p> {{ $comment->comment }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>