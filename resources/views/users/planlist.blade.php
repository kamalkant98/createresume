@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
 <section class="content ">
        @include('layouts.flash-messages')
		@yield('content')
    <div class="card">
        
        <div class="card-body">
               <div class="row">
                   
                    <h4 class="card-title col-md-10">Skill list</h4>
                    <div class="col-md-2"> <button class="btn btn-theme-dark btn--icon-text"><i class="zwicon-arrow-left"></i> Back</button></div>
                     <div class="col-md-12">
                        <table class="table table-hover mb-0 small">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Plan title</th>
                                    <th>Amount</th>
                                    <th>Time duration</th>
                                    <th>Description</th>
                                    <th>Create_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($plans as $plan)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <td>{{$plan->title}}</td>
                                    <td>{{$plan->amount}}</td>
                                    <td>
                                        @if($plan->plan_duration_day !== null)
                                            {{$plan->plan_duration_day}} days
                                        @elseif($plan->plan_duration_week !== null)
                                            {{$plan->plan_duration_week}} weeks
                                        @elseif($plan->plan_duration_month !== null)
                                            {{$plan->plan_duration_month}} months
                                        @elseif($plan->plan_duration_year !== null)
                                            {{$plan->plan_duration_year}} year
                                        @endif
                                    </td>
                                    <td>{!!$plan->description!!}</td>
                                    <td>{{  date('d F,Y', strtotime($plan->created_at))}}</td>
                                    <td>
                                    <a href="{{url('editplan/'.$plan->id)}}"><button type="button" class="btn btn-theme-dark">Edit</button></a>
                                    <button class="btn btn-theme-dark deletebtn" id="{{$plan->id}}" data-toggle="modal" data-target="#modal-default">Delete</button>
                                    <!--<a href="{{url('deletemaincategory/'.$plan->id)}}"><button type="submit" class="btn btn-theme-dark">Delete</button></a> --></td>
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
                  var link='{{asset("deleteplan")}}/'+getid;
                    $('.modal').find('.deletedata').attr('href',''+link+'');
            });
        });
    </script>
    @endsection