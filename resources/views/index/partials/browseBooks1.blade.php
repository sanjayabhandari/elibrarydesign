<div class="row no-gutters">
    <div class="col-lg-12 mt-5 mb-5 text-center">
        <h5>
            <span style="font-size:30px; font-weight:bold;">Tired of Writing Notes <i class="far fa-tired"
                    style="color:red;"></i></span> <br>Check our Professional Notes Below!
        </h5>
        <hr class="type_4 mb-5">
    </div>
</div>

<div class="row no-gutters">

    <div class="col-lg-9 mt-2 pl-5 order-md-2 order-lg-2 order-xl-2">
        <div class="row no-gutters">

            @foreach($featuredcategory as $cat)
            <div class="col-lg-3 mt-4">
                <div class="card card3 container1">
                    <img class="card-img-top image1 image" src="
                {{asset('files/category/'.$cat->image)}}" alt="{{$cat->title}}">

                    <div class="overlay">
                        @foreach($cat->activeproducts as $bookindex=>$books)
                        @if($bookindex<8) <a href="/bookdetail/{{$books->id}}" class="icon" title="{{$books->title}}">
                            <button class="btn btn-primary btn3 shadow-lg">{{$books->title}} </button>
                            </a>
                            @endif
                            @endforeach
                            {{-- <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a> --}}
                    </div>
                </div>
                <div class="card-body card4">
                    <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                    <button class="btn btn2"><a href="subcategorybookdetail/{{$cat->id}}"
                            class="card-link text-white">Detail</a></button>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-3">
       <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class9.png" alt="class9">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>
         <div class="col-lg-3">
         <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class10.png" alt="class10">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>
         <div class="col-lg-3">
         <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class11.png" alt="class11">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>
     </div>
     <div class="row no-gutters mt-4">
     <div class="col-lg-3">
     <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class12.png" alt="class12">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>
         <div class="col-lg-3">
     <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class10-1.jpg" alt="class10-1">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>
         <div class="col-lg-3">
     <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class11-1.jpg" alt="class11-1">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>
         <div class="col-lg-3">
     <div class="card card3 container1">
                  <img class="card-img-top image1 image" src="assets/image/class12-1.jpg" alt="class12-1">
                  <div class="overlay">
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Maths</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">English</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Social Science</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Nepali</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Environment</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Computer</button>
                  </a>
                  <a href="#" class="icon" title="Maths">
                  <button class="btn btn-primary btn3 shadow-lg">Account</button>
                  </a>
                  </div>
            </div>
            <div class="card-body card4">
                <button class="btn btn2 "><a href="#" class="card-link text-white">Suscribe</a></button>
                <button class="btn btn2"><a href="#" class="card-link text-white">Detail</a></button>
            </div>
         </div>--}}
        </div>
    </div>
    <div class="col-lg-3">


        <h3 class="ml-3 text-center">Recent News</h3>
        <hr class="myline1">
        @foreach($blogs as $blogindex=>$blog)
        @if($blogindex<2) <div class="row no-gutters">
            <div class="col-lg-4 mt-4 pl-5">
                <img src="{{asset('file/'.$blog->image)}}" alt="news1" class="img-rounded img2">
            </div>
            <div class="col-lg-8 mt-2 pr-2 pl-5">
                <a href="#" class="text-dark">{{$blog->blog_title}}</a>

                <p> {{$blog->date}}</p>
                <hr>
                <p>{!! str_limit($blog->blog_description, $limit = 100, $end = '<a href="/blogdetail/'.$blog->id.'">
                        read more...</a>') !!}</p>
                    
            </div>
    </div>
    @endif
    @endforeach
    {{-- <div class="row no-gutters">
       <div class="col-lg-4 mt-3 pl-2">
       <img src="assets/image/news2.jpg" alt="news2" class="img-rounded img2">
       </div>
      <div class="col-lg-8 mt-2 pr-2 pl-4">
      <a href="#">IOE Entrance Notice 2073</a>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
      </div>
   </div>
   <div class="row no-gutters">
       <div class="col-lg-4 mt-4 pl-2">
       <img src="assets/image/news3.png" alt="news3" class="img-rounded img2">
       </div>
      <div class="col-lg-8 mt-2 pr-2 pl-4">
      <a href="#">HSEB Scholarship Examination Notice 2073</a>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem </p>
      </div>
   </div>
   <div class="row no-gutters">
       <div class="col-lg-4 mt-4 pl-2">
       <img src="assets/image/news4.jpg" alt="news4" class="img-rounded img2">
       </div>
      <div class="col-lg-8 mt-2 pr-2 pl-4">
      <a href="#">SEE result published with marks</a>
      <p>SEE result was out today and 2 lakhs students passed out. </p>
      </div>
   </div> --}}

</div>

</div>





<!--<div class="container mt-5">
  <div class="row no-gutters">
    <div class="col-lg-12 mt-5 mb-5 text-center">
      <h5>
        <span style="font-size:30px; font-weight:bold;">Tired of Writing Notes <i class="far fa-tired" style="color:red;"></i></span> <br>Check our Professional Notes Below!
      </h5>
      <hr class="type_4 mb-5">
    </div>
  </div>
    <div class="row no-gutters mt-3">
  <div class="col-lg-4">
<div class="card ml-5 card2 ">
  <img class="card-img-top image" src="assets/image/class8.jpg" alt="class8">
  <div class="middle">

  </div>

 <div class="card-body" style="padding:0;">
    <h5 class="card-title head" style="font-size:20px;"><b>Class 8 Notes</b></h5>
  </div>
  <div class="card-body" style="padding:0;">
    <hr class="ml-0" style="width:100px; height:3px; background-color:red;">
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Suscribe</a></button>
    <button class="btn-primary btn2 mt-3"><a href="#" class="card-link text-dark">Detail</a></button>
    <div class="stars" data-rating="3">
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
</div>
  </div>
</div>
 </div>

<div class="col-lg-4">
<div class="card ml-5 card2">
  <img class="card-img-top" src="assets/image/class9.png" alt="class9">
  <div class="card-img-overlay" style="height:20px;">
  <div class="stars ml-3" style="margin-top:14rem;" data-rating="3">
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
</div>
  </div>
  <div class="card-body" style="padding:0;">
    <h5 class="card-title text-center" style="font-size:20px;"><b>Class 9 Notes</b></h5>
  </div>
  <div class="card-body text-center" style="padding:0;">
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Suscribe</a></button>
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Detail</a></button>
  </div>
</div>
</div>

<div class="col-lg-4">
<div class="card ml-5 card2">
  <img class="card-img-top" src="assets/image/class10.jpg" alt="class10">
  <div class="card-img-overlay" style="height:20px;">
  <div class="stars ml-3" style="margin-top:14rem;" data-rating="3">
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
        <span class="star">&nbsp;</span>
</div>
  </div>
  <div class="card-body" style="padding:0;">
    <h5 class="card-title text-center" style="font-size:20px;"><b>Class 10 Notes</b></h5>
  </div>
  <div class="card-body text-center" style="padding:0;">
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Suscribe</a></button>
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Detail</a></button>
  </div>
</div>
 </div>
</div>

<div class="row no-gutters mt-5">
        <div class="col-lg-4">
<div class="card ml-5 card2">
  <img class="card-img-top" src="assets/image/class11.jpg" alt="class11">
  <div class="card-img-overlay" style="height:20px;">
  <div class="stars ml-3" style="margin-top:14rem; color:black" data-rating="3">
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
</div>
  </div>
  <div class="card-body" style="padding:0;">
    <h5 class="card-title text-center" style="font-size:20px;"><b>Class 11 Notes</b></h5>
  </div>
  <div class="card-body text-center" style="padding:0;">
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Suscribe</a></button>
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Detail</a></button>
  </div>
</div>
 </div>

<div class="col-lg-4">
<div class="card ml-5 card2">
  <img class="card-img-top c12" src="assets/image/class12.jpg" alt="class12">
  <div class="card-img-overlay" style="height:20px;">
  <div class="stars ml-3" style="margin-top:14rem; color:black" data-rating="3">
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
</div>
  </div>
  <div class="card-body" style="padding:0;">
    <h5 class="card-title text-center" style="font-size:20px;"><b>Class 12 Notes</b></h5>
  </div>
  <div class="card-body text-center" style="padding:0; color:black">
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Suscribe</a></button>
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Detail</a></button>
  </div>
</div>
</div>

<div class="col-lg-4">
<div class="card ml-5 card2">
  <img class="card-img-top c13" src="assets/image/bachelor.jpg" alt="bachelor">
  <div class="card-img-overlay" style="height:20px;">
  <div class="stars ml-3" style="margin-top:14rem; color:white" data-rating="3">
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
        <span class="star" style="color:goldenrod">&nbsp;</span>
</div>
  </div>
  <div class="card-body" style="padding:0;">
    <h5 class="card-title text-center" style="font-size:20px;"><b>Bachelor Notes</b></h5>
  </div>
  <div class="card-body text-center" style="padding:0;">
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Suscribe</a></button>
    <button class="btn-primary btn2"><a href="#" class="card-link text-dark">Detail</a></button>
  </div>
</div>
 </div>
</div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function(){
            let stars = document.querySelectorAll('.star');
            stars.forEach(function(star){
                star.addEventListener('click', setRating);
            });

            let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent('click'));
        });
        function setRating(ev){
            let span = ev.currentTarget;
            let stars = document.querySelectorAll('.star');
            let match = false;
            let num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove('rated');
                }else{
                    star.classList.add('rated');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector('.stars').setAttribute('data-rating', num);
        }

    </script>-->