@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
       <style>
           .ajax-loading{
           
           }
           .loader {
            border: 7px solid #2c1d1d87;
            border-radius: 50%;
            border-top: 7px solid #fbfbfb;
            width: 40px;
            height: 40px;
            margin-left:10px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
            }
           </style>

    <section class="content ">
        @include('layouts.flash-messages')
		@yield('content')
    <div class="card">
   
            <div class="card-body">
                <h4 class="card-title">Product List</h4>
                <table class="table table-sm table-hover mb-0">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>image</th>
                            <th>Description</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody id="results">
                       
                    </tbody>
                  
                </table>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2 ajax-loading"><div class="loader"></div></div>
                    <div class="col-md-5"></div>


                </div>
               <!-- <div class="ajax-loading"><div class="loader"></div></div>-->
            </div>
        </div>
    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.deletebtn').click(function(){
                var getid=$(this).attr('id');
                var link='{{asset("deleteservices")}}/'+getid;
                $('.modal').find('.deletedata').attr('href',''+link+'');
        });
    });

     var page = 1;
    load_more(page);
    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
            page++; //page number increment
            load_more(page); //load content   
        }
    });

function load_more(page){
  $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            beforeSend: function()
            {
                $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
               $('.ajax-loading').html("No more records!");
                return;
            }
            $('.ajax-loading').hide(); //hide loading animation once data is received
            $("#results").append(data); //append data into #results element          
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('No response from server');
        });
 }
</script>
@endsection