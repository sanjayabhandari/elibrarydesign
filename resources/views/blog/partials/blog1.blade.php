<div class="row no-gutters mt-5">
    <div class="col-lg-3">
        <h3 class="ml-3">Other News</h3>
        <hr style="width:95%;">
        @foreach($relatedblog as $blogs)
        <div class="row no-gutters">
            <div class="col-lg-4 mt-4 pl-2">
                <img src="{{asset('files/blog/'.$blogs->image)}}" alt="news1" class="img-rounded img2">
            </div>
            <div class="col-lg-8 mt-2 pr-2 pl-4">
                <a href="#">{{$blogs->blog_title}}</a>
                <p>{!! str_limit($blogs->blog_description, $limit = 100, $end = '<a href="/blogdetail/'.$blogs->id.'">
                        read more...</a>') !!}</p>
            </div>
        </div>
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

    <div class="col-lg-8 ml-5">

        <h2>{{$blog->blog_title}}</h2>
        <hr>
        <span>{{$blog->date}}</span> <span class="pl-3">Author Name</span>

        <p class="pt-3">{!! str_limit($blog->blog_description, $limit = 460) !!}
        </p>
        <img src="{{asset('files/blog/'.$blog->image)}}" alt="school" class="school mt-3" style="max-width:600px;">
        <p class="pt-3">{!! substr($blog->blog_description,460); !!}</p>
    </div>
</div>