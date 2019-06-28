<!-- Top content -->
<div class="top-content mt-5 pt-5">


    <div class="container-fluid">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                @foreach($relatedproduct as $index=>$related)

                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 {{$index==0?'active':''}}">
                    <a href="/bookdetail/{{$related->id}}"> <img
                            src="{{asset('files/product/images/'.$related->image)}}"
                            class="img-fluid mx-auto d-block imageslider" alt="img1"> </a>
                </div>


                @endforeach
                {{-- <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                    <img src="{{asset('assets/image/nepali2.jpg')}}" class="img-fluid mx-auto d-block imageslider"
                alt="img2">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{{asset('assets/image/social2.jpg')}}" class="img-fluid mx-auto d-block imageslider"
                    alt="img3">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{{asset('assets/image/rhymes2.jpeg')}}" class="img-fluid mx-auto d-block imageslider"
                    alt="img4">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{{asset('assets/image/animal.jpg')}}" class="img-fluid mx-auto d-block imageslider"
                    alt="img5">
            </div>
            <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="{{asset('assets/image/plant.jpg')}}" class="img-fluid mx-auto d-block imageslider" alt="img6">
            </div> --}}
        </div>
        <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>