@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
 <section class="content ">
        @include('layouts.flash-messages')
		@yield('content')

    <div class="card">
        
        <div class="card-body">
              
                   
               <header class="content__title">
               
               <h1>social lisnk list</h1>

               <div class="actions">
            
                
               </div>
           </header> 
                   <div class="row">
                     <div class="col-md-12">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Http link</th>
                                    <th>Create_at</th>
                                    <th class="text-center">Permissons</th>
                                    <th class="text-center">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="results">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($data as $link)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <td>{{$link->social_name}}</td>
                                    <td>{{$link->social_link}}</td>
                                    <td class="text-center">{{  date('d F,Y', strtotime($link->created_at))}}</td>
                                    <td>
                                        <div class="demo-inline-wrapper">
                                            <div class="form-group">
                                                <div class="toggle-switch toggle-switch--blue">
                                                    @if($link->permissions == 1)
                                                    <input type="checkbox" class="toggle-switch__checkbox socialpermisson" checked value="1" id="{{$link->id}}">
                                                    @else
                                                        <input type="checkbox" class="toggle-switch__checkbox socialpermisson" value="0" id="{{$link->id}}">
                                                    @endif
                                                    <i class="toggle-switch__helper"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td ><a href="{{$link->social_link}}"><button type="button" class="btn btn-theme-dark">View</button></a>
                                    <a href="{{url('editskill/'.$link->id)}}"><button type="button" class="btn btn-theme-dark">Edit</button></a>
                                    <button class="btn btn-theme-dark deletebtn" id="{{$link->id}}" data-toggle="modal" data-target="#modal-default">Delete</button>
                                    <!--<a href="{{url('deletemaincategory/'.$link->id)}}"><button type="submit" class="btn btn-theme-dark">Delete</button></a> --></td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.deletebtn').click(function(){
                    var getid=$(this).attr('id');
                  var link='{{asset("deleteskill")}}/'+getid;
                    $('.modal').find('.deletedata').attr('href',''+link+'');
            });

            $('.socialpermisson').change(function(){
                var getval= $(this).attr('id');
               if($(this).val() == 1){
                   var permission = 0;
               }else{
                var permission = 1;
               }
             

            });
        });
    </script>
    @endsection