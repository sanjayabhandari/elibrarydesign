<div class="row no-gutters">
    <div class="col-lg-3 mt-5">
        <div class="card border-0 pl-4 " style="width: 18rem;">

            <img class="card-img-top" src="{{asset('files/product/images/'.$product[0]->image)}}" alt="subjects">
            <div class="card-body p-0">
                <p class="text-center">File size: 20.4mb</p>

                <ul class="nav nav-tabs border-0">
                    <li class="active"><a data-toggle="tab" href="#home"
                            class="btn btn-outline buttonsummary mybtn1">Details</a></li>
                    @if(auth()->check())
                    <li><a data-toggle="tab" href="#menu1" class="btn btn-outline ml-3 mb-3 buttonreview mybtn1"
                            style="width:153px;">Leave Your Review</a>

                        @else
                    <li><a href="/login" class="btn btn-outline ml-3 mb-3 buttonreview mybtn1"
                            style="width:153px;">Leave Your Review</a>
                        @endif</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mt-3">
        <h5 class="align-middle mt-5 pt-3">{{$product[0]->title}}</h5>
        <!-- <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div> -->
        <span style="color:orange"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="far fa-star"></i></span>
        <div class="clearfix"></div>
        <p class="pr-5 text-justify text1 pt-3">
            {!!$product[0]->description!!}
        </p>
        @if(auth()->check())
        <button class="btn btn-primary mybtn2" onclick="readbook({{$product[0]->id}})">
            Read....
        </button>
        @else
        <a href="/login" class="btn btn-primary mybtn2">Read....</a>
        @endif

    </div>
    <div class="col-lg-3 mt-5">
        <div class="card card5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Browse By Category</h5>
                @foreach($category as $catg)
                <a class="card-text text-danger ml-3" href="/category-{{$catg->id}}">
                    <i class="fas fa-book-reader mr-2"></i>{{$catg->cat_name}}
                </a>
                @endforeach
                {{-- <div class="clearfix"></div>
                <a class="card-text text-dark ml-3" href="allcategory#menu6">
                    <i class="fas fa-book mr-2"></i> Literature and Arts
                </a>
                <div class="clearfix"></div>
                <a class="card-text text-dark ml-3" href="#">
                    <i class="fas fa-newspaper mr-2"></i> Newspapers and Magazines
                </a>
                <div class="clearfix"></div>
                <a class="card-text text-dark ml-3" href="#">
                    <i class="far fa-newspaper mr-2"></i> Dictionary
                </a>
                <div class="clearfix"></div>
                <a class="card-text text-dark ml-3" href="#">
                    <i class="fas fa-chalkboard mr-2"></i> Teaching Material
                </a>
                <div class="clearfix"></div>
                <a class="card-text text-dark ml-3" href="#">
                    <i class="fas fa-paint-brush mr-2"></i> Arts and Music
                </a>
                <div class="clearfix"></div>
                <a class="card-text text-dark ml-3" href="#">
                    <i class="fas fa-flask mr-2"></i> Other
                </a> --}}
            </div>
        </div>
    </div>
</div>

<div class="row no-gutters mt-3">
    <div class="col-lg-6">
        <div class="tab-content">
            <div id="home" class="tab-pane fade show active ml-5">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Author</th>
                            <td>{{$product[0]->author->author_name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Publication</th>
                            <td>{{$product[0]->publisher->pub_name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Editor</th>
                            <td>{{$product[0]->editor}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Published Date</th>
                            <td>{{$product[0]->py}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Revised Date</th>
                            <td>{{$product[0]->revised_date}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Revised Edition</th>
                            <td>{{$product[0]->revised_edition}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="menu1" class="tab-pane fade ml-5">
                <h4 class="rateandreview">Rate & Review</h4>
                <p>
                    <i class="fas fa-user i6 mt-3"></i>
                </p>
                @if(auth()->check())
                <span class="tx1"><b>{{auth()->user()->name}}</b></span>
                @endif
                <p>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>

                </p> @if(auth()->check())
                <form action="{{route('review.store')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="product_id" value="{{$product[0]->id}}">
                    <input type="text" name="review" class="mt-3 border-top-0 border-left-0 border-right-0 input1"
                        style="border:2px solid blue;"
                        placeholder="Share details of your own experience reading this book.">
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-outline text-center mt-4 buttonpost">Post</button>
                </form>
                @endif
            </div>
        </div>

    </div>
    <div class="col-lg-6" style="margin-top:-30px">
        <h2>Most Relevant Reviews</h2>

        <div class="row no-gutters mt-2 pr-5">
            @if(count($product[0]->activereviews)>0)
            @foreach($product[0]->activereviews as $reviews)
            <div class="col-lg-1">
                <i class="fas fa-user i6 mt-3"></i>
            </div>
            <div class="col-lg-11">
                <p class="pb-0 mb-0">{{$reviews->user->name}}</p>
                @if($reviews->rating!==null)
                <span style="color:orange"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                        class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span>
                @endif
                <hr>
                <div class="clearfix"></div>
                <p>{{$reviews->review}}</p>
            </div>
            @endforeach
            @else
            <div class="col-lg-4">
                <h4 class="text-center">No reviews</h4>
            </div>
            @endif
            {{-- <div class="col-lg-1">
      <i class="fas fa-user i6 mt-3"></i>
      </div>
      <div class="col-lg-11">
      <p class="pb-0 mb-0">Raju Thapa</p>
      <span style="color:orange"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i><i class="far fa-star"></i></span>
      <div class="clearfix"></div>
      <p>Nice Book. Little improvement in some content is needed. Some minor errors were seen in the book. Rest are fine. Great work.</p>
      </div>
      <div class="col-lg-1">
      <i class="fas fa-user i6 mt-3"></i>
      </div>
      <div class="col-lg-11">
      <p class="pb-0 mb-0">Sanjay Bhandari</p>
      <span style="color:orange"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span>
      <div class="clearfix"></div>
      <p>Excellent! Nice book and very supportive for study.</p>
      </div> --}}
        </div>
    </div>
</div>
<div class="row no-gutters text-center mt-5">
    <div class="col-lg-12">
        <div style="width: 100%; height: 31px; border-bottom: 1px solid black; text-align: center">
            <span style="font-size: 40px; background-color: #F3F5F6; padding: 0 10px;">
                Related Books
            </span>
        </div>
        <h4 class="text-center"></h4>
    </div>

</div>