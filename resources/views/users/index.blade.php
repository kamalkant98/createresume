@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<style>
  .table-responsive{
    overflow-x: unset;
  }
  .dropdown-demo{
    margin:0px;
  }
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
           .badge{
             margin-bottom:4px;
           }
  </style>
 
<div class="content">
@include('layouts.flash-messages')
@yield('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
             
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th>Username</th>
                      <th>Name </th>
                      <th>Email </th>
                      <th>Telephone </th>
                      <th>Creation date</th>
                      <th class="text-right"> Actions </th>
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
              </div>
            </div>
          </div>
        
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
            $(document.body).on('click','.permissonbtn',function(){
              var getid=$(this).attr('id');
             var getval= $('.dropdown-menu').find('.per'+getid+'').val();
               var arr= getval.split(',');
            
              // console.log(getval);
               
                $('.permissionform').find('input[type="checkbox"]').each(function(){
                  var getboxval=$(this).val();
                  if($.inArray(getboxval,arr) !== -1){
                    console.log('kk='+getboxval)
                   $(this).prop('checked',true);
                  }else{
                    console.log('jj='+getboxval)
                    $(this).removeAttr('checked',false);
                  }
                });
                  var link='{{asset("permisstions")}}/'+getid;
                  $('.permissionform').attr('action',''+link+''); 
            });
            
           /*  $('.permissonbtn').click(function(){
              
                   var getid=$(this).attr('id');
                  var link='{{asset("permisation")}}/'+getid;
                   $('.model').find('.permissionform').attr('action',''+link+'');
            });*/
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
         //   console.log(data.length);
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