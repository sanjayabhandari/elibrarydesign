<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap.css')}}">
    {{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    @yield('styles')

    <style>
        body {
            margin: 0px;
            padding: 0px;
            padding-top: 72px;
            font-family: 'Roboto', sans-serif;
            /* position:relative;
            height:100%; */
        }

        nav {
            background: #070000;
            background: -webkit-linear-gradient(to right, #FC4D1B, #F9942B);
            background: linear-gradient(to right,#FC4D1B, #F9942B);
            height:75px;

        }
        
        .background {
            background: #070000;
            background: -webkit-linear-gradient(to right,#FC4D1B, #F9942B);
            background: linear-gradient(to right, #FC4D1B, #F9942B);
            /* position:absolute;
            bottom:0;
            width:100%; */
        }

        .logo {
            height: 72px;
        }

        #form1 {
            margin-left: 30px;
            width: 318px;
            border-radius: 0px;
        }

        .search1 {
            cursor: pointer;
        }

        .flag {
            height: 18px;
            margin-top: -8px;
        }

        .btn5 {
            margin-right: -31px;
            border-radius: 0px;
            background: transparent;
            border: 2px solid paleturquoise;
        }

        .btn6 {
            border-radius: 0px;
            border-radius: 0px;
            background-color: #BF540C;
            border: 2px solid paleturquoise;
        }

        #cat1 {
            margin-top: 7px;
            border: 1px solid brown;
            background: transparent;
            color: white;
            cursor: pointer;
        }
        a:hover{
            text-decoration: none;
        }
        li {
            float: left;
        }

        li a:hover,
        .dropdown:hover .dropbtn {
            background-color: red;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        @media only screen and (max-width: 600px) {
            #form1 {
                width: 150px;
            }
            nav{
                height:auto;
            }
        }.searchpopup{
            background:white;
            width:100%;
            heigth:100%;
            z-index:999;
            position:absolute;
            margin-top:50px;

        }
         @media only screen and (max-width: 900px) {
            #form1 {
                width: 150px;
            }
            nav{
                height:auto;
            }
        }.searchpopup{
            background:white;
            width:100%;
            heigth:100%;
            z-index:999;
            position:absolute;
            margin-top:50px;

        }
    </style>
</head>
</head>

<body>
    <div class="fixed">
        <nav class="navbar fixed-top navbar-expand-lg mb-5 pl-1">
            
            <a class="navbar-brand text-white mt-2" href="/" style="line-height:1;">
            <img src="{{asset('assets/image/gyan2.png')}}" alt="logo" class="img-fluid logo mt-2 pl-4 ml-5">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-align-justify text-white"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <form class="form-inline ml-5 mt-3" >
                        <div class="input-group ">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle btn5"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    All
                                </button>
                                {{-- {{$media}} --}}
                                <div class="dropdown-menu">
                                  @if(isset($media))
                                @foreach($media as $mediatype)
                                    <a class="dropdown-item" href="#">{{$mediatype->name}}</a>
                                 @endforeach  
                                 @endif
                                </div>
                                <input class="form-control my-0 py-1" id="form1" type="text" placeholder="Search"
                                
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn-secondary btn6"><i class="fas fa-search search1"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                    </form>
                    <div class="searchpopup" style="display:none" >


                    </div>
                </ul>
                <ul class="navbar-nav ml-5 mr-5 pr-2">
                <li class="nav-item  mt-2 ml-3 pr-3">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="dropdown mt-3 pr-3">

                        <a href="allcategory" class="dropbtn text-white d-inline-block">Categories <i
                                class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            @if(isset($category))
                            @foreach($category as $cat)
                            <a href="category-{{$cat->id}}">{{$cat->cat_name}}</a>
                            @endforeach
                            @endif
                            {{-- <a href="allcategory">Course Material</a>
                            <a href="allcategory">Teaching Material</a> --}}
                        </div>
                    </li>
                    <li class="dropdown mt-3 ml-3">
                        <a href="javascript:void(0)" class="dropbtn text-white d-inline-block">Level <i
                                class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a href="allcategory">Primary</a>
                            <a href="allcategory">Middle</a>
                            <a href="allcategory">Secondary</a>
                        </div>
                    </li>
                    <li class="nav-item  mt-2 ml-3">
                        <a class="nav-link text-white" href="#">Author</a>
                    </li>
                    <li class="dropdown mt-3 ml-3 mr-3">
                        @if(!auth()->check())

                        <a href="login" class="dropbtn text-white d-inline-block">Login <i
                                class="fas fa-caret-down"></i></a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="login">Login</a>
                            <a class="dropdown-item" href="register">Signup</a>
                        </div>
                        @else
                        <a href="login" class="dropbtn text-white d-inline-block">{{auth()->user()->name}} <i
                                class="fas fa-user-circle"></i></a>
                        <div class="dropdown-content">
                            <form method="POST" action="{{route('logout')}}">
                                {{csrf_field()}}
                                <button class="dropdown-item" type="submit" onclick="submit">Log out</button>
                            </form>

                        </div>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('content')
    @yield('content1')
    @yield('form')
    @yield('signup')
    @yield('category')
    @yield('subcategory')
    @yield('blog')
    @yield('search')
    @yield('news')

    <footer class="page-footer font-small unique-color-dark" >
        <!-- <div class="background mt-5">
            <div class="container">
               
                <div class="row no-gutters">
                   
                    <div class="col-md-6 col-lg-7 text-right text-md-right ml-auto">
                       
                        <a class="fb-ic" href="#">
                            <i class="fab fa-facebook-f text-white mr-4"> </i>
                        </a>
                       
                        <a class="tw-ic" href="#">
                            <i class="fab fa-twitter text-white mr-4"> </i>
                        </a>
                        
                        <a class="gplus-ic" href="#">
                            <i class="fab fa-google-plus-g text-white mr-4"> </i>
                        </a>
                        
                        <a class="li-ic" href="#">
                            <i class="fab fa-linkedin-in text-white mr-4"> </i>
                        </a>
                       
                        <a class="ins-ic" href="#">
                            <i class="fab fa-instagram text-white"> </i>
                        </a>
                    </div>
                   
                </div>
               
            </div>
        </div> -->
        <div class="background text-white mt-3">
            <!-- Footer Links -->
            <!-- <div class="container text-white text-md-left"> -->
                
            <div class="row no-gutters">
                
                <div class="col-lg-12 text-right mt-3 pr-5 mr-3">
                    
                <a class="fb-ic" href="#">
                            <i class="fab fa-facebook-f text-white mr-4"> </i>
                        </a>
                       
                        <a class="tw-ic" href="#">
                            <i class="fab fa-twitter text-white mr-4"> </i>
                        </a>
                        
                        <a class="gplus-ic" href="#">
                            <i class="fab fa-google-plus-g text-white mr-4"> </i>
                        </a>
                        
                        <a class="li-ic" href="#">
                            <i class="fab fa-linkedin-in text-white mr-4"> </i>
                        </a>
                       
                        <a class="ins-ic" href="#">
                            <i class="fab fa-instagram text-white mr-5"> </i>
                        </a>
                </div>
            </div>
                <!-- Grid row -->
                <div class="row no-gutters ml-5 pl-5">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase font-weight-bold">Support</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color:white">
                        <p>Kindly send us message<br>
                            support@e-library.com
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase font-weight-bold">Say Hello</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color:white">
                        <p>
                            <i class="fas fa-home mr-3"></i>Baneshwor, Kathmandu , Nepal
                        </p>
                        <p>
                            <i class="fas fa-phone mr-3"></i>+ 01 234 567 88
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Links</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color:white;">
                        <p>
                            <a href="#!" style="color:white;">Privacy Policy</a>
                        </p>
                        <p>
                            <a href="#!" style="color:white;">Terms and Condition</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 mt-5">
                        <!-- Content -->
                        <a href="#" class="text-white">About</a>
                        <div class="clear-fix"></div>
                        <a href="#" class="text-white">Feedback</a>
                        <div class="clear-fix"></div>
                        <a href="#" class="text-white">Help</a>
                    </div>
                    <!-- Grid column -->
                </div>
            </div>
            <!-- Grid row -->
        <!-- </div> -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 

        {{-- <script src="assets/jquery.js">
        </script> --}}
		

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"



            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">

        </script>  --}}
        <script src="{{asset('assets/bootstrap.js')}}">

        </script>
        <script src="assets/bootstrap.js">

        </script>

        <script>

function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}
$('#form1').keyup(delay(function (e) {

var search =$(this).val();
if(search.length>0)
{
    $.ajax({
   url:"/searchproduct",
   method:"GET",
   data:{search},
   dataType:'json',
   success:function(data)
   {
         productarray=[];
       datas =''
              if(data.length==0)
       {
           datas +='<h1>No data found';
    productarray.push(datas);
$('.searchpopup').html(productarray);
$('.searchpopup').show();
return;
       }
    
 $('.searchpopup').show();
     
     
       for(var i=0;i<data.length;i++)
       {
           if(data[i].products)
           {
           for(var j=0;j<data[i].products.length;j++)
           {
              if(j<=2) 
              {
           datas +=` <div class="row mt-2 ml-2"> 
           <div class="col-lg-3">

     <img src="/image/${data[i].products[j].files.length>0?data[i].products[j].files[0].fileformate:''}" alt="flag1"  class=" rounded-circle"  style="width:60px;height:60px;">
                
                     ${data[i].products[j].title}
                    </div>
                               <div class="col-lg-4 mt-2">
                               ${data[i].products[j].category.cat_name}
                    <hr>
                    ${data[i].products[j].author.author_name}

                    </div>
                    <div class="col-lg-3">
                    <a href="/bookdetail/${data[i].products[j].id}" class="btn btn-outline-dark  card-title mt-2">view</a>
                    </div>
                    </div>
                  
                    <hr>
                    
                    `
              }
           }
           }
           else{
               if(i<=1)
           {
                        datas +=`  
                        <div class="row mt-2 ml-2"> 
                        <div class="col-lg-3">
                   
                            <img src="image/${data[i].files.length>0?data[i].files[0].fileformate:''}" alt="flag1" class=" rounded-circle" style="width:60px;height:60px;">
                          
                       ${data[i].title}
                    </div>
                               <div class="col-lg-4 mt-2">
                     ${data[i].category.cat_name}
                    <hr>
                      ${data[i].author.author_name}
                    </div>
                    <div class="col-lg-3">
                     <a href="/bookdetail/${data[i].id}" class="btn btn-outline-dark card-title mt-2">view</a>
                     </div>
                    </div>
                    <hr>
                    `
           }
           }

       }
       datas +=`<div class="col-lg-12 text-center"><a href="searchresults/${search}" >View More</a><div>`
productarray.push(datas);
$('.searchpopup').html(productarray);
   }
  });
}
else{
 $('.searchpopup').hide();
}
}, 500));
$(".cardhov").mouseenter(function(){
   $('.slider11').hide();
  $('.cardhidden').show();
  $('.cardhidden5').hide();
  $('.cardhidden4').hide();
  $('.cardhidden3').hide();
  $('.cardhidden2').hide();
  $('.cardhidden1').hide();
});

var timeout;
$(".cardhov1").hover(
    function() {
      let info=$(this).data('info');
      let div=`    <div class="cardhidden">
                <img class="artshover pt-5" src="assets/image/arts.jpg" alt="arts1">
                    <h5 class="ml-4 mr-4"><a href="#" class="">Literature and Arts</a>
                     <button class="btn">Add to Read List</button>
                     </h5>
            </div>`

            $('#previewtrending').html(div)
    timeout = setTimeout(function(){
  $('.cardhidden').show();

        }, 500);
    },
    function(){
        clearTimeout(timeout);
        // do stuff when hover off
    }
)
$(".cardhov2").hover(
    function() {
        timeout = setTimeout(function(){
   $('.slider11').hide();
  $('.cardhidden2').show();
  $('.cardhidden5').hide();
  $('.cardhidden4').hide();
  $('.cardhidden3').hide();
  $('.cardhidden1').hide();
  $('.cardhidden').hide();
        }, 500);
    },
    function(){
        clearTimeout(timeout);
        // do stuff when hover off
    }
)

$(".cardhov3").hover(
    function() {
        timeout = setTimeout(function(){
         $('.slider11').hide();
  $('.cardhidden3').show();
  $('.cardhidden5').hide();
  $('.cardhidden4').hide();
  $('.cardhidden2').hide();
  $('.cardhidden1').hide();
  $('.cardhidden').hide();
        }, 500);
    },
    function(){
        clearTimeout(timeout);
        // do stuff when hover off
    }
)

$(".cardhov4").hover(
    function() {
        timeout = setTimeout(function(){
         $('.slider11').hide();
   $('.cardhidden5').hide();
  $('.cardhidden4').show();
  $('.cardhidden3').hide();
  $('.cardhidden2').hide();
  $('.cardhidden1').hide();
  $('.cardhidden').hide();
        }, 500);
    },
    function(){
        clearTimeout(timeout);
        // do stuff when hover off
    }
)

$(".cardhov5").hover(
    function() {
  timeout = setTimeout(function(){
  $('.slider11').hide();
  $('.cardhidden5').show();
  $('.cardhidden4').hide();
  $('.cardhidden3').hide();
  $('.cardhidden2').hide();
  $('.cardhidden1').hide();
  $('.cardhidden').hide();
        }, 500);
    },
    function(){
        clearTimeout(timeout);
        // do stuff when hover off
    }
)


$(".click1").click(function(){
   $(".hiding1").show();
   $('.hiding2').hide();
   $('.hiding3').hide();

});
$('.click2').click(function(){
   $('.hiding1').hide();
   $('.hiding3').hide();
$('.hiding2').show();
});
$('.click3').click(function(){
$('.hiding1').hide();
$('.hiding2').hide();
$('.hiding3').show();

});

$(document).ready(function(){

    var cards=document.querySelectorAll('.click1');
    if(!cards.length>0) return;
    
  var id= cards[0].getAttribute('data-id');

 getproduct(id);

  cards[0].setAttribute('id','testactive');
   //$('.clic1').attr('id','testactive')

   $('.clic1').attr('id','testactive');
   $('.buttonsummary').attr('id','buttonsummary');
   $('.active1').css('color','red');
   $('.active1').css('background','white');
});
$('.active2').click(function(){
$('.subcate1').hide();
});
$('.active1').click(function(){
$('.subcate1').show();
});
$('.active2').click(function(){
    $('.active1').css('color','black');
   $('.active1').css('background','transparent');
});
$('.active1').click(function(){
    $(this).css('color','black');
   $(this).css('background','white');
});
$('.buttonreview').click(function(){
    document.getElementById('buttonsummary').removeAttribute('id');

});








$('.click1').click(function(){

var id=$(this).data('id');
getproduct(id);

var check=document.querySelector('#testactive');
if(check===null)
{
   $(this).attr('id','testactive');
}
else{
   document.getElementById('testactive').removeAttribute('id');
   $(this).attr('id','testactive')
}

});$('.click2').click(function(){

var check=document.querySelector('#testactive');


if(check===null)
{
   $(this).attr('id','testactive');
}
else{
   document.getElementById('testactive').removeAttribute('id');
   $(this).attr('id','testactive')
}

});$('.click3').click(function(){

var check=document.querySelector('#testactive');


if(check===null)
{
   $(this).attr('id','testactive');
}
else{
   document.getElementById('testactive').removeAttribute('id');
   $(this).attr('id','testactive')
}

});
// $(".my-rating").starRating({
//   initialRating: 4,
//   strokeColor: '#894A00',
//   strokeWidth: 10,
//   starSize: 25
// });





function getproduct(id)
{
    
    $.ajax({
   url:"/showproductbycategory",
   method:"GET",
   data:{id},
   dataType:'json',
   success:function(data)
   {
       productarray=[];
       datas =''
       for(var i=0;i<data.length;i++)
       {
           datas +=`  <div class="col-lg-6">
                        <div class="card text-dark border-0">
                            <img src="image/${data[i].files.length>0?data[i].files[0].fileformate:''}" alt="flag1" class="img3 rounded-circle">
                           <a href="/bookdetail/${data[i].id}" class="btn btn-outline-dark btn3 card-title mt-2">${data[i].title}</a>
                        </div>
                    </div>`


       }
productarray.push(datas);
$('#categoryproduct').html(datas);


   }
  });
}

function viewdetail(id)
{
window.location.href="/bookdetail/"+id;
}



/*
    Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;
 
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});

function readbook(id)
{

    var token="{{csrf_token()}}"
    
    $.ajax({
   url:"/readbook",
   method:"POST",
   data:{id,'_token':token},
   dataType:'json',
   success:function(data)
   {

       if(data!=='nodata')
       {
 window.open('/image/'+ data);
       }
       else{
           alert('Please wait the file upload is in process');
       }
   }
    })
}
        </script>

</body>

</html>





</body>

</html>