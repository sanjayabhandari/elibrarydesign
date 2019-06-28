<div class="row no-gutters">
    <div class="col-lg-12 mt-5 text-center">
        <h5>
            <?php $total=0;?>
            @foreach($data as $dataindex=>$searchs)

            @if($searchs->activeproducts)

            <?php $total= count($searchs->activeproducts)
    ?>
            @else
            <?php $total= count($data)
          ?>
            @endif
            @endforeach

            {{$total}} Results for <b>" {{$search}}: "</b>
        </h5>
        <hr style="width:300px;">
    </div>
</div>

<div class="row no-gutters">
    <div class="col-lg-3 ml-5 pl-5">
        <h2> <u>Refine By</u></h2>
        <div class="card border-0" style="width: 18rem; margin-top: -12px;">
            <div class="card-body">
                <h5 class="card-title pl-2">Language</h5>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Nepali
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    English
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Hindi
                </p>
            </div>
        </div>
        <div class="card border-0" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title pl-2">Media Type</h5>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Audio
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Video
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Document
                </p>
                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Ebooks
                </p>
                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Magzines
                </p>
            </div>
        </div>
        <div class="card border-0" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title pl-2">Categories</h5>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Nepali Literature
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Emglish Literature
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Course Book
                </p>
                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Guide Book
                </p>
                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Question Bank
                </p>
            </div>
        </div>
        <div class="card border-0" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title pl-2">Publication</h5>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Ekta Publication
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Asmita Books
                </p>

                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Samiksha Publication
                </p>
                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Buddha Publication
                </p>
                <input type="checkbox" class="form-check-input myinput1" id="exampleCheck1">
                <p class="card-text ml-5">
                    Goodwill Publication
                </p>
            </div>
        </div>


    </div>
    <div class="col-lg-8 mt-2 ml-5">
        <hr>
        <span> </span>
        <span class="sort">
            <div class="dropdown">
                Sort By
                <button class="btn btn-secondary dropdown-toggle mybtn3" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Best Match
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item text-dark">Best Match</button>
                    <button class="dropdown-item text-dark">High Rated</button>
                </div>
            </div>
        </span>
        <hr>
        @foreach($data as $dataindex=>$search)

        @if($search->activeproducts)
        @foreach($search->activeproducts as $catproduct)
        <div class="row no-gutters mt-5">
            <div class="col-lg-2">

                <img src="{{asset('files/product/images/'.$catproduct->image)}}" alt="search1" class="img2">



            </div>
            <div class="col-lg-8 ml-3">
                <a href="#">{{$catproduct->title}}</a>
                <div class="clearfix"></div>
                <span><b>Edition:</b> 5th edition</span>
                <span class="pl-3"><b>Published Year:</b> {{$catproduct->py}}</span>
                <div class="clearfix"></div>
                <span style="color:orange;">
                    <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
                        class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
                        class="fa fa-star" aria-hidden="true"></i>
                </span>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <span style="color: #308800">All are free! Read it Today</span>
                <div class="clearfix"></div>
                <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
                @if(auth()->check())
                <button class="btn mt-3 ml-3" onclick="readbook({{$catproduct->id}})"><i class="fas fa-download"></i>
                    Download</button>
                @else
                <a href="/login" class="btn mt-3 ml-3"><i class="fas fa-download"></i>
                    Download</a>
                @endif
            </div>
        </div>
        @endforeach
        @else
        <div class="row no-gutters mt-5">
            <div class="col-lg-2">
                <img src="{{asset('files/product/images/'.$search->image)}}" alt="search1" class="img2">
            </div>
            <div class="col-lg-8 ml-3">
                <a href="#">{{$search->title}}</a>
                <div class="clearfix"></div>
                <span><b>Edition:</b> 5th edition</span>
                <span class="pl-3"><b>Published Year:</b> {{$search->py}}</span>
                <div class="clearfix"></div>
                <span style="color:orange;">
                    <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
                        class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i
                        class="fa fa-star" aria-hidden="true"></i>
                </span>
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <span style="color: #308800">All are free! Read it Today</span>
                <div class="clearfix"></div>
                <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
                @if(auth()->check())
                <button class="btn mt-3 ml-3" onclick="readbook({{$search->id}})"><i class="fas fa-download"></i>
                    Download</button>
                @else
                <a href="/login" class="btn mt-3 ml-3"><i class="fas fa-download"></i>
                    Download</a>
                @endif
            </div>
        </div>
        @endif
        @endforeach

        {{-- <div class="row no-gutters mt-5">
       <div class="col-lg-2">
           <img src="assets/image/search1.jpg" alt="search1" class="img2">
       </div>
       <div class="col-lg-8 ml-3">
         <a href="#">Hamro Nepali Book</a>
         <div class="clearfix"></div>
         <span><b>Edition:</b> 5th edition</span>
         <span class="pl-3"><b>Published Year:</b> 2018</span>
         <div class="clearfix"></div>
         <span style="color:orange;">
         <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
         </span>
         <div class="clearfix"></div>
          <div class="clearfix"></div>
         <span style="color: #308800">All are free! Read it Today</span>
         <div class="clearfix"></div>
         <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
         <button class="btn mt-3 ml-3"><i class="fas fa-download"></i> Download</button>
       </div>
   </div>

   <div class="row no-gutters mt-5">
       <div class="col-lg-2">
           <img src="assets/image/search1.jpg" alt="search1" class="img2">
       </div>
       <div class="col-lg-8 ml-3">
         <a href="#">Hamro Nepali Book</a>
         <div class="clearfix"></div>
         <span><b>Edition:</b> 5th edition</span>
         <span class="pl-3"><b>Published Year:</b> 2018</span>
         <div class="clearfix"></div>
         <span style="color:orange;">
         <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
         </span>
         <div class="clearfix"></div>
          <div class="clearfix"></div>
         <span style="color: #308800">All are free! Read it Today</span>
         <div class="clearfix"></div>
         <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
         <button class="btn mt-3 ml-3"><i class="fas fa-download"></i></span> Download</button>
       </div>
   </div>

   <div class="row no-gutters mt-5">
       <div class="col-lg-2">
           <img src="assets/image/search1.jpg" alt="search1" class="img2">
       </div>
       <div class="col-lg-8 ml-3">
         <a href="#">Hamro Nepali Book</a>
         <div class="clearfix"></div>
         <span><b>Edition:</b> 5th edition</span>
         <span class="pl-3"><b>Published Year:</b> 2018</span>
         <div class="clearfix"></div>
         <span style="color:orange;">
         <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
         </span>
         <div class="clearfix"></div>
          <div class="clearfix"></div>
         <span style="color: #308800">All are free! Read it Today</span>
         <div class="clearfix"></div>
         <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
         <button class="btn mt-3 ml-3"><i class="fas fa-download"></i> Download</button>
       </div>
   </div> 
    <div class="row no-gutters mt-5">
       <div class="col-lg-2">
           <img src="assets/image/search1.jpg" alt="search1" class="img2">
       </div>
       <div class="col-lg-8 ml-3">
         <a href="#">Hamro Nepali Book</a>
         <div class="clearfix"></div>
         <span><b>Edition:</b> 5th edition</span>
         <span class="pl-3"><b>Published Year:</b> 2018</span>
         <div class="clearfix"></div>
         <span style="color:orange;">
         <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
         </span>
         <div class="clearfix"></div>
          <div class="clearfix"></div>
         <span style="color: #308800">All are free! Read it Today</span>
         <div class="clearfix"></div>
         <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
         <button class="btn mt-3 ml-3"><i class="fas fa-download"></i> Download</button>
       </div>
   </div> 
    <div class="row no-gutters mt-5">
       <div class="col-lg-2">
           <img src="assets/image/search1.jpg" alt="search1" class="img2">
       </div>
       <div class="col-lg-8 ml-3">
         <a href="#">Hamro Nepali Book</a>
         <div class="clearfix"></div>
         <span><b>Edition:</b> 5th edition</span>
         <span class="pl-3"><b>Published Year:</b> 2018</span>
         <div class="clearfix"></div>
         <span style="color:orange;">
         <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
         </span>
         <div class="clearfix"></div>
          <div class="clearfix"></div>
         <span style="color: #308800">All are free! Read it Today</span>
         <div class="clearfix"></div>
         <button class="btn mt-3"> <i class="fas fa-cart-plus"></i> Add to wishlist</button>
         <button class="btn mt-3 ml-3"><i class="fas fa-download"></i> Download</button>
       </div>
   </div> --}}


    </div>

</div>