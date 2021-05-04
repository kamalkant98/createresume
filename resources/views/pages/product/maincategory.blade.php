@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
 <section class="content ">
        @include('layouts.flash-messages')
		@yield('content')
    <div class="card">
        
        <div class="card-body">
               <div class="row">
                   
                    <h4 class="card-title col-md-10">MainCategories List</h4>
                    <div class="col-md-2"> <button class="btn btn-theme-dark btn--icon-text"><i class="zwicon-arrow-left"></i> Back</button></div>
                     <div class="col-md-12">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Maincategory Name</th>
                                    <th>create_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($maincat as $main)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <td>{{$main->maincategoryname}}</td>
                                    <td>{{  date('d F,Y', strtotime($main->created_at))}}</td>
                                    <td><a href="{{url('viewsubcategory/'.$main->id)}}"><button type="submit" class="btn btn-theme-dark">View</button></a>
                                    <button class="btn btn-theme-dark deletebtn" id="{{$main->id}}" data-toggle="modal" data-target="#modal-default">Delete</button>
                                    <!--<a href="{{url('deletemaincategory/'.$main->id)}}"><button type="submit" class="btn btn-theme-dark">Delete</button></a> --></td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2 ajax-loading"><div class="loader"></div></div>
                    <div class="col-md-5"></div>


                </div>
               <div class="ajax-loading"><div class="loader"></div></div>-->
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.deletebtn').click(function(){
                    var getid=$(this).attr('id');
                  var link='{{asset("deletemaincategory")}}/'+getid;
                    $('.modal').find('.deletedata').attr('href',''+link+'');
            });
        });
    </script>
    @endsection