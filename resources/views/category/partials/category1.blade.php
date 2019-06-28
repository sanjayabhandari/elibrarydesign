<div class="row no-gutters">
    <div class="col-lg-3 mt-5">
        <div class="card card5" style="width: 18rem;">
            <div class="card-body">

                <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                    <h5 class="card-title text-center ml-3" style="font-size:25px;">Browse By Category</h5>
                    @foreach($category as $catg)
                    <a class="card-text ml-3 nav-item nav-link border-0 {{$checkedcat->id===$catg->id?'active':''}}"
                        href="{{url('category-'.$catg->id)}}">
                        <i class="fas fa-book-reader mr-2"></i> {{$catg->cat_name}} {{$checkedcat->id===$catg->id}}
                    </a>
                    <div class="clearfix"></div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    @if($checkedcat->level==1)
    <div class="col-lg-8">
        @else
        <div class="col-lg-6">
            @endif
            <div class="tab-content" id="nav-tabContent">


                <div id="menu{{$checkedcat->id}}" class="tab-pane fade show active" role="tabpanel">
                    @if($checkedcat->level==1)
                    <div class="showcase ml-3">
                        <div class="row no-gutters mt-5">

                            @foreach($subcategory[0]->activeproducts as $index=>$books)
                            {{-- {{($index+1) % 6 ==0}} --}}
                            @if (($index+1) % 6==0)

                            <div class="row no-gutters mt-1 mr-5">
                                @endif
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">

                                        <img src="{{asset('files/product/images/'.$books->image)}}" class="aam aam1"
                                            onclick="viewdetail({{$books->id}})">
                                    </div>
                                </div>
                                {{-- @if (($index+1) % 6 == 0) 
</div>

@endif --}}
                                @endforeach
                                {{-- <div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa2.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa3.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa4.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa5.jpg" class="aam aam1">
</div>
</div> --}}


                                {{-- </div> --}}

                                {{-- <div class="row no-gutters">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa8.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa10.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa6.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa7.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa8.jpg" class="aam aam1">
</div>
</div>


</div>

<div class="row no-gutters">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa9.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa10.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa1.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa3.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa4.jpg" class="aam aam1">
</div>
</div>


</div>

<div class="row no-gutters">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa10.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa5.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa2.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa7.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa6.jpg" class="aam aam1">
</div>
</div>


</div>

</div>
</div>
<div id="menu13" class="tab-pane fade" role="tabpanel">
<div class="showcase ml-3">
<div class="row no-gutters mt-5">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa1.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa2.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa3.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa4.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa5.jpg" class="aam aam1">
</div>
</div>


</div>

<div class="row no-gutters">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa8.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa10.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa6.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa7.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa8.jpg" class="aam aam1">
</div>
</div>


</div>

<div class="row no-gutters">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa9.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa10.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa1.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa3.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa4.jpg" class="aam aam1">
</div>
</div>


</div>

<div class="row no-gutters">

<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa10.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa5.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa2.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa7.jpg" class="aam aam1">
</div>
</div>
<div class="col-lg-2">
<div class="card ca1 mt-5" style="width: 18rem;">
<img src="assets/image/laa6.jpg" class="aam aam1">
</div>
</div> --}}


                            </div>

                        </div>

                        @else
                        <div class="nav nav-tabs mt-5 border-0" id="nav-tab" role="tablist">

                            <!-- <h5 class="heading1">Primary Level</h5> -->

                            @foreach($subcategory as $subcat)
                            <a class="nav-item nav-link click1  cardhover1 border-0" data-id="{{$subcat->id}}"
                                data-toggle="tab" href="#menu1" role="tab" aria-controls="nav-home"
                                aria-selected="true">
                                <span class="card text-dark border-0">
                                    <img class="card-img img2 " src="assets/image/shape1.png" alt="Card image">
                                    <span class="card-img-overlay ">
                                        <h5 class="card-title active">{{$subcat->cat_name}}</h5>
                                    </span>
                                </span>
                            </a>
                            @endforeach

                        </div>
                        @endif


                    </div>
                    <div id="menu22" class="tab-pane fade " role="tabpanel">
                        <!-- <img class="card-img" src="assets/image/top.jpg" alt="top"> -->
                        <div class="showcase ml-3">
                            <div class="row no-gutters mt-5">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa1.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa2.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa3.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa4.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa5.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                            <div class="row no-gutters">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa8.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa10.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa6.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa7.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa8.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                            <div class="row no-gutters">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa9.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa10.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa1.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa3.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa4.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                            <div class="row no-gutters">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa10.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa5.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa2.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa7.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa6.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div id="menu13" class="tab-pane fade" role="tabpanel">
                        <div class="showcase ml-3">
                            <div class="row no-gutters mt-5">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa1.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa2.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa3.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa4.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa5.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                            <div class="row no-gutters">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa8.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa10.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa6.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa7.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa8.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                            <div class="row no-gutters">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa9.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa10.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa1.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa3.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa4.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                            <div class="row no-gutters">

                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa10.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa5.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa2.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa7.jpg" class="aam aam1">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card ca1 mt-5" style="width: 18rem;">
                                        <img src="assets/image/laa6.jpg" class="aam aam1">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div id="menu14" class="tab-pane fade" role="tabpanel">
                        <p>Hello3</p>
                    </div>
                    <div id="menu15" class="tab-pane fade" role="tabpanel">

                    </div>
                    <div id="menu16" class="tab-pane fade" role="tabpanel">

                    </div>
                    <div id="menu17" class="tab-pane fade" role="tabpanel">

                    </div>
                </div>
            </div>
            @if($checkedcat->level==0)
            <div class="col-lg-3 mt-4 pr-2 pl-1 subcate1">
                <div class="tab-content borders hiding1 mt-5" id="nav-tabContent">
                    <h5 class="heading">Subjects</h5>
                    <div class="tab-pane fade show active" id="menu1" role="tabpanel">
                        <div class="row no-gutters mt-3" id="categoryproduct">
                            {{-- <div class="col-lg-6">
  <div class="card text-dark border-0">
  <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
     <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
  </div>
  </div>   --}}
                            {{-- <div class="col-lg-6">
  <div class="card text-dark border-0">
  <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
     <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
  </div>
  </div>
  <div class="col-lg-6">
  <div class="card text-dark ">
  <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
     <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
  </div>
  </div>
  <div class="col-lg-6">
  <div class="card text-dark">
  <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
     <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
  </div>
  </div> --}}
                        </div>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="menu2" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu3" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu4" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content borders hiding2 mt-5" id="nav-tabContent">
                    <h5 class="heading3">Subjects</h5>
                    <div class="tab-pane fade show" id="menu5" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu6" name="menu6" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">EPH</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu7" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu8" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content borders hiding3 mt-5" id="nav-tabContent">
                    <h5 class="heading5">Subjects</h5>
                    <div class="tab-pane fade show" id="menu9" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu10" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu11" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="menu12" role="tabpanel">
                        <div class="row no-gutters mt-3">
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/pythagoras.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Maths</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/einstein.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Science</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/english1.jpg" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">English</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card text-dark">
                                    <img src="assets/image/flag1.png" alt="flag1" class="img3 rounded-circle">
                                    <button class="btn btn-outline-dark btn3 card-title mt-2">Nepali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>