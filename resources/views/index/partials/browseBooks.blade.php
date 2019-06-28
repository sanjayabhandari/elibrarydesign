<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-lg-6">
            <h3 class="text-center pb-3 pt-2 mb-5">Read by trending category</h3>
            <div class="row no-gutters ml-5 pl-2">
                @foreach($trendingcat as $trending)

                <div class="col-lg-4">
                    <div class="card ml-2 card1 cardhov1" data-info="{{$trending}}">

                        <img class="card-img-top arts" src="{{asset('files/product/images/'.$trending->image)}}"
                            alt="arts">
                        <div class="card-body">
                            <h5 class="card-title liteart"><a href="#">{{$trending->title}}</a></h5>
                        </div>
                    </div>

                </div>
                @endforeach
                {{-- <div class="col-lg-4">
                    <div class="card card1 cardhov1">
                        <img class="card-img-top arts" src="assets/image/artsmusic.jpg" alt="artsmusic">
                        <div class="card-body">
                            <h5 class="card-title liteart"><a href="#">Arts and Music</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card1 cardhov2">
                        <img class="card-img-top arts" src="assets/image/biography.jpg" alt="biography">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Biographies</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters ml-3">
                <div class="col-lg-4">
                    <div class="card card1 cardhov3 ml-2">
                        <img class="card-img-top arts" src="assets/image/business.jpg" alt="business">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Business</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card1 cardhov4">
                        <img class="card-img-top arts" src="assets/image/kid.jpg" alt="kids">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Kids</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card1 cardhov5">
                        <img class="card-img-top arts" src="assets/image/cooking.jpg" alt="cooking">
                        <div class="card-body">
                            <h5 class="card-title"><a href="#">Cooking</a></h5>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
        <div class="col-lg-6 mt-4">
            {{-- <div id="carouselExampleSlidesOnly" class="carousel slide slider11" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid book" src="assets/image/book1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid book" src="assets/image/book1.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid book" src="assets/image/book3.jpg" alt="Third slide">
                    </div>
                </div>
            </div> --}}
            <div class="row no-gutters text-center">
                <div class="col-lg-6 col-md-6" id="previewtrending">

                    {{-- <div class="cardhidden1">
            <img class="artshover pt-5" src="assets/image/artsmusic.jpg" alt="arts2">
                    <h5 class="ml-4 mr-4"><a href="#" class="">Arts and Music</a>
                     <button class="btn">Add to Read List</button>
                </h5>
            </div>
            <div class="cardhidden2">
            <img class="artshover pt-5" src="assets/image/biography.jpg" alt="arts3">
                    <h5 class="ml-4 mr-4"><a href="#" class="">Biographies</a>
                    <div class="clear-fix"></div>
                     <button class="btn">Add to Read List</button>
                </h5>
            </div>
            <div class="cardhidden3">
            <img class="artshover pt-5" src="assets/image/business.jpg" alt="arts4">
                    <h5 class="ml-4 mr-4"><a href="#" class="">Business</a>
                    <div class="clear-fix"></div>
                     <button class="btn">Add to Read List</button>
                </h5>
            </div>
            <div class="cardhidden4">
            <img class="artshover pt-5" src="assets/image/kid.jpg" alt="arts5">
                    <h5 class="ml-4 mr-4"><a href="#" class="">Kids</a>
                    <div class="clear-fix"></div>
                     <button class="btn">Add to Read List</button>
                </h5>
            </div>
            <div class="cardhidden5">
            <img class="artshover pt-5" src="assets/image/cooking.jpg" alt="arts5">
                    <h5 class="ml-4 mr-4"><a href="#" class="">Cooking</a>
                    <div class="clear-fix"></div>
                     <button class="btn">Add to Read List</button>
                </h5>
            </div> --}}
                </div>
                <div class="col-lg-6 col-md-6 mt-5">
                    <div class="summary cardhidden mr-5 pr-4">
                        <h3><a href="#" class="">No Exit </a></h3>
                        <p> <span style="font-size:14px;">(Revised Edition 2019)</span><br>
                            <span style="color:#CF7C16;"><i class="far fa-star"></i><i class="far fa-star"></i><i
                                    class="far fa-star"></i><i class="far fa-star"></i><i
                                    class="far fa-star"></i></span>
                        </p>
                        <p class="ml-3 mr-2 text-justify">Jean-Paul Sartre, the great French existentialist, displays
                            his mastery of drama in NO EXIT, an unforgettable portrayal of hell. The play is a depiction
                            of the afterlife in which three deceased characters are punished by being locked into a room
                            together for all eternity.</p>
                    </div>
                    {{-- <div class="cardhidden1">
               <h3><a href="#" class="">Fahrenheit 451 </a></h3>
            <p> <span style="font-size:14px;">(Revised Edition 2019)</span><br>
               <span style="color:#CF7C16;"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
               </p>
               <p class="ml-3 mr-2 text-justify">Ray Bradbury, the great French existentialist, displays his mastery of drama in NO EXIT, an unforgettable portrayal of hell. The play is a depiction of the afterlife in which three deceased characters are punished by being locked into a room together for all eternity.</p>
            </div>
            <div class="cardhidden2">
               <h3><a href="#" class="">Mid Night </a></h3>
            <p> <span style="font-size:14px;">(Revised Edition 2019)</span><br>
               <span style="color:#CF7C16;"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
               </p>
               <p class="ml-3 mr-2 text-justify">Jean-Paul Sartre, the great French existentialist, displays his mastery of drama in NO EXIT, an unforgettable portrayal of hell. The play is a depiction of the afterlife in which three deceased characters are punished by being locked into a room together for all eternity.</p>
            </div>
            <div class="cardhidden3">
               <h3><a href="#" class="">Nickel Diamond </a></h3>
            <p> <span style="font-size:14px;">(Revised Edition 2019)</span><br>
               <span style="color:#CF7C16;"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
               </p>
               <p class="ml-3 mr-2 text-justify">Jean-Paul Sartre, the great French existentialist, displays his mastery of drama in NO EXIT, an unforgettable portrayal of hell. The play is a depiction of the afterlife in which three deceased characters are punished by being locked into a room together for all eternity.</p>
            </div>
            <div class="cardhidden4">
               <h3><a href="#" class="">harry Potter </a></h3>
            <p> <span style="font-size:14px;">(Revised Edition 2019)</span><br>
               <span style="color:#CF7C16;"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
               </p>
               <p class="ml-3 mr-2 text-justify">Jean-Paul Sartre, the great French existentialist, displays his mastery of drama in NO EXIT, an unforgettable portrayal of hell. The play is a depiction of the afterlife in which three deceased characters are punished by being locked into a room together for all eternity.</p>
            </div>
            <div class="cardhidden5">
               <h3><a href="#" class="">Wheat Belly </a></h3>
            <p> <span style="font-size:14px;">(Revised Edition 2019)</span><br>
               <span style="color:#CF7C16;"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>
               </p>
               <p class="ml-3 mr-2 text-justify">Jean-Paul Sartre, the great French existentialist, displays his mastery of drama in NO EXIT, an unforgettable portrayal of hell. The play is a depiction of the afterlife in which three deceased characters are punished by being locked into a room together for all eternity.</p>
            </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>
