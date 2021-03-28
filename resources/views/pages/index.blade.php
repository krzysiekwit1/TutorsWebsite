@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/pages/index.css') }}" />
<script src="https://kit.fontawesome.com/8130db2d78.js" crossorigin="anonymous"></script>
@endsection
@section('content')
<div style="" class="filter-container container">
    <div class="row">
        <div class="filter-navbar d-flex flex-row">
            <select name="sortBy" id="sortBy">
                <option value="none">sort</option>
                <option value="priceasc">from lowest price</option>
                <option value="pricedesc">from highest price</option>
            </select>
            <select name="filterByLanguage" id="filterByLanguage">
                <option value="none">Language</option>
                <option value="Arabic">Arabic</option>
                <option value="Bulgarian">Bulgarian</option>
                <option value="Cambodian">Cambodian</option>
                <option value="Chinese">Chinese</option>
                <option value="Croatian">Croatian</option>
                <option value="Czech">Czech</option>
                <option value="Danish">Danish</option>
                <option value="English">English</option>
                <option value="Estonian">Estonian</option>
                <option value="French">French</option>
                <option value="Georgian">Georgian</option>
                <option value="German">German</option>
                <option value="Greek">Greek</option>
                <option value="Hungarian">Hungarian</option>
                <option value="Icelandic">Icelandic</option>
                <option value="Irish">Irish</option>
                <option value="Italian">Italian</option>
                <option value="Japanese">Japanese</option>
                <option value="Korean">Korean</option>
                <option value="Latvian">Latvian</option>
                <option value="Lithuanian">Lithuanian</option>
                <option value="Mongolian">Mongolian</option>
                <option value="Norwegian">Norwegian</option>
                <option value="Polish">Polish</option>
                <option value="Portuguese">Portuguese</option>
                <option value="Romanian">Romanian</option>
                <option value="Russian">Russian</option>
                <option value="Serbian">Serbian</option>
                <option value="Slovak">Slovak</option>
                <option value="Spanish">Spanish</option>
                <option value="Swedish">Swedish</option>
                <option value="Thai">Thai</option>
                <option value="Turkish">Turkish</option>
                <option value="Ukrainian">Ukrainian</option>
                <option value="Vietnamese">Vietnamese</option>
            </select>
            <select name="filterByLocation" id="filterByLocation">
                <option value="none">Country</option>
                <option value="Arabia">Arabia</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Cambodia">Cambodia</option>
                <option value="China">China</option>
                <option value="Croatia">Croatia</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="England">England</option>
                <option value="Estonia">Estonia</option>
                <option value="France">France</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Greece">Greece</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Ireland">Ireland</option>
                <option value="Italy">Italy</option>
                <option value="Japan">Japan</option>
                <option value="Korea">Korea</option>
                <option value="Latvia">Latvia</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Norway">Norway</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Serbia">Serbia</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Spain">Spain</option>
                <option value="Sweden">Sweden</option>
                <option value="Thailand">Thailand</option>
                <option value="Turkey">Turkey</option>
                <option value="Ukraine">Ukraine</option>
                <option value="Vietnam">Vietnam</option>
            </select>
            <input style="margin-top:5px;" placeholder="City" type="text" id="filterByCity">
            <input style="margin-left:5px;margin-top:5px;" placeholder="Find" type="text" id="filterByName">
        </div>
    </div>
</div>
<button id="addedToContactsButton" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"
    hidden></button>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p style="text-align:center;">Successfully added Tutor to Contacts,</p>
                <p style="text-align:center;">Open Chat and send a message.</p>
            </div>
        </div>

    </div>
</div>
@include('errorMessage')
<!--<img src="https://britz.mcmaster.ca/images/nouserimage.gif/image" alt="">
 -->

@if (count($adverts) >= 1)
<div class="container">
    @foreach ($adverts as $advert)
    <div class="advert row">
        <!-- advert photo left section -->
        <div class="col-md-3 col-xl-3">
            <img class="img-fluid" style="width:100%;height:100%" src="{{asset('/'.$advert->avatar)}}" alt="">

        </div>

        <!-- Advert middle section -->
        <div class="col-md-6 col-xl-6">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <span class="align-middle name">{{$advert->name}}</span>
                    <span class="align-middle nativ">nativ</span>

                    <span class="nativ-language">{{$advert->nativ_language_1}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->nativ_language_1.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />

                    @if ($advert->nativ_language_2!=NULL)
                    <span class="nativ-language">{{$advert->nativ_language_2}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->nativ_language_2.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->country!=NULL)
                    <span style="margin-right:5px;margin-left:5px;" class="align-middle nativ">location</span>
                    <img src="{{ url('storage/flagsIcons/planet-earth.png') }}" alt="" title="" class="align-middle"
                        style="height:17px;width:20px;" />
                    <span class="nativ-language">{{$advert->country}}</span>
                    @if($advert->city!=NULL)
                    <span class="nativ-language">{{$advert->city}}</span>
                    @endif
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <span class="teaches">teaches</span>
                    <span class="language">{{$advert->language_1}}</span>
                    <span class="language">{{$advert->language_level_1}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_1.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @if ($advert->language_2!=NULL)
                    <span class="language">{{$advert->language_2}}</span>
                    <span class="language">{{$advert->language_level_2}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_2.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->language_3!=NULL)
                    <span class="language">{{$advert->language_3}}</span>
                    <span class="language">{{$advert->language_level_3}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_3.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->language_4!=NULL)
                    <span class="language">{{$advert->language_4}}</span>
                    <span class="language">{{$advert->language_level_4}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_4.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->language_5!=NULL)
                    <span class="language">{{$advert->language_5}}</span>
                    <span class="language">{{$advert->language_level_5}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_5.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="description-container col-md-12 col-xl-12">
                    <span class="description">{{$advert->description}}</span>
                </div>
            </div>
        </div>
        <!-- advert price and button right section -->
        <div class="col-md-3 col-xl-3">
            <div class="row">
                <span class="price-span">Price:</span>
                <span class="price">{{$advert->price}}/lesson </span>

            </div>
            <div style="vertical-align: center;" class="row">
                <a href="#">
                    <button id="{{$advert->user_id}}" class="button-contact">Contact</button>
                </a>
                <a href="http://localhost:8000/adverts/{{$advert->user_id}}">
                    <button class="button-profile">Profile</button>
                </a>
            </div>
            <div class="row">
                <div class="rating col-xl-12 col-md-12">
                    <div style="" class="rating-title col-md-12 col-xl-12">
                        Rating
                    </div>
                    <a href="http://localhost:8000/adverts/{{$advert->user_id}}">
                        <i style="margin-left:1vw;display: none;" class="rating-star far fa-star"></i>
                    </a>
                    <a href="http://localhost:8000/adverts/{{$advert->user_id}}">
                        <i style="display: none;" class="rating-star far fa-star"></i>
                    </a>
                    <a href="http://localhost:8000/adverts/{{$advert->user_id}}">
                        <i style="display: none;" class="rating-star far fa-star"></i>
                    </a>
                    <a href="http://localhost:8000/adverts/{{$advert->user_id}}">
                        <i style="display: none;" class="rating-star far fa-star"></i>
                    </a>
                    <a href="http://localhost:8000/adverts/{{$advert->user_id}}">
                        <i style="display: none;" class="rating-star far fa-star"></i>
                    </a>
                    <div class="row">
                        <div style="margin-left:2.5vw !important;" id="" class="loading-dual-ring">
                        </div>
                        <div id="" class="loading-dual-ring"></div>
                        <div id="" class="loading-dual-ring"></div>
                        <div id="" class="loading-dual-ring"></div>
                        <div id="" class="loading-dual-ring"></div>
                    </div>
                    <input class="userIdHolder" type="text" value="{{$advert->user_id}}" hidden>
                </div>
            </div>


        </div>

    </div>

    @endforeach
</div>
<div style="margin-top:15px;" class="d-flex justify-content-center"> {{ $adverts->links() }}
</div>
@else
<p>there is no adverts</p>
@endif
<input id="filterArray0" type="text" hidden value="{{$filterArray[0]}}">
<input id="filterArray1" type="text" hidden value="{{$filterArray[1]}}">
<input id="filterArray2" type="text" hidden value="{{$filterArray[2]}}">
<input id="filterArray3" type="text" hidden value="{{$filterArray[3]}}">
<script src="{{asset('js/jqueryUi/external/jquery/jquery.js')}}"></script>
<script src="{{asset('js/jqueryUi/jquery-ui.min.js')}}"></script>
<script>
    var filterArray0 = $('#filterArray0').val();
    var filterArray1 = $('#filterArray1').val();
    var filterArray2 = $('#filterArray2').val();
    var filterArray3 = $('#filterArray3').val();
    console.log(filterArray0);
    $('#sortBy option[value='+filterArray0+']').attr("selected",true);
    $('#filterByLanguage option[value='+filterArray1+']').attr("selected",true);
    $('#filterByLocation option[value='+filterArray2+']').attr("selected",true);
    $("#filterByCity").val(''+filterArray3+'');



    $("select#sortBy,select#filterByLanguage,select#filterByLocation,input#filterByCity").change(function(){
    var sortBy = $('select#sortBy').val();
    var filterLanguage = $("select#filterByLanguage").val();
    var filterLocation = $("select#filterByLocation").val();
    var filterCity = $("#filterByCity").val();
    console.log(sortBy)
    console.log(filterLanguage);
    console.log(filterLocation);
    console.log(filterCity);
    if(filterCity=="filter by city"){
        filterCity = "none";
    }
    var url = "http://localhost:8000/"+"filter/"+sortBy+"/"+filterLanguage+"/"+filterLocation+"/"+filterCity;
    console.log(url);
    window.location = url;

})


    $( document ).ready(function() {
        $( ".rating" ).each(function( index ) {
        var userId = $(this).find(".userIdHolder").val();
        var parentElementThis = this;
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        var data ='';
                var data ={
                'userId': userId
                };
                $.ajax({
                type: "POST",
                url: '/getrating',
                data:data ,
                success: function(data){
                    console.log(data);

                    if(data.result > 0 && data.result <= 1){
                        $(parentElementThis).find(".loading-dual-ring").css('display','none');
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(0)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find(".rating-title").text("Rating: " + data.result);                  
                            }else if(data.result > 1 && data.result <= 2){
                        $(parentElementThis).find(".loading-dual-ring").css('display','none');
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(0)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(1)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find(".rating-title").text("Rating: " + data.result);                   
                            }else if(data.result >= 2 && data.result < 3){
                        $(parentElementThis).find(".loading-dual-ring").css('display','none');
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(0)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(1)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find(".rating-title").text("Rating: " + data.result);                  
                            }else if(data.result >= 3 && data.result < 4){
                        $(parentElementThis).find(".loading-dual-ring").css('display','none');
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(0)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(1)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(2)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find(".rating-title").text("Rating: " + data.result);

                            }else if(data.result >= 4 && data.result < 5){
                        $(parentElementThis).find(".loading-dual-ring").css('display','none');
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(0)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(1)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(2)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(3)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find(".rating-title").text("Rating: " + data.result);
                    }else if(data.result == 5){
                    $(parentElementThis).find(".loading-dual-ring").css('display','none');
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(0)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(1)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(2)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(3)").addClass( "fas" );
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find("i:eq(4)").addClass( "fas" );
                        $(parentElementThis).find(".rating-title").text("Rating: " + data.result);
                    }else if( data.result == 'noData'){
                        $(parentElementThis).find(".loading-dual-ring").css('display','none');  
                        $(parentElementThis).find("i:eq(0)").css('display','inline');
                        $(parentElementThis).find("i:eq(1)").css('display','inline');
                        $(parentElementThis).find("i:eq(2)").css('display','inline');
                        $(parentElementThis).find("i:eq(3)").css('display','inline');
                        $(parentElementThis).find("i:eq(4)").css('display','inline');
                        $(parentElementThis).find(".rating-title").text("Rating: " + 'No Rating');
                    }
                },
                error:function(data){
                console.log(data);
                },
                });
        console.log('twoja stara');
        console.log(userId);
        });

    });
</script>
<script>
    $(".button-contact").click(function(id){
        function successFunc(){
            $('#addedToContactsButton').click();
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var data ='';
        var id = $(this).attr("id");
        console.log(id);
        var data ={
        'userId': id
        };
    $.ajax({
    type: "POST",
    url: '/makeContact',
    data:data ,
    success: function(data){
        if(data.result=='success'){
        console.log(data);
        successFunc();
    }else if(data.result=='contactExists'){
        alert('This tutor is in your contact list');
    }else if (data.result=="AuthIdSameAsContactTo"){
        alert("You can't add yourself to contact list")
    };
    },
    error:function(data){
        if(data.result=="contactExists"){
            alert('This tutor is in your contact list');
        }else{
            console.log('error Contact to adminstration')
        }
    },
    });
    });
</script>
@endsection