@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
 <section class="content ">
        @include('layouts.flash-messages')
		@yield('content')
    <div class="card">
        
    <div class="card-body">
    <h4 class="card-title">Plans</h4><hr>
        <div class="row price-table price-table--basic">
        @foreach($plans as $plan)
            <div class="col-md-3">
                <div class="price-table__item">
                    <header class="price-table__header">
                        <div class="price-table__title">{{$plan->title}}</div>
                        <div class="price-table__desc">Pellentesque ornare lacinia venenatis vestibulum</div>
                    </header>
                    <div class="price-table__price">
                       ₹{{$plan->amount}}.00|
                       @if($plan->plan_duration_day !== null )
                            {{$plan->plan_duration_day}} <small>day</small>
                       @elseif($plan->plan_duration_week)
                            {{$plan->plan_duration_week}}<small> week</small>
                       @elseif($plan->plan_duration_month)
                          {{$plan->plan_duration_month}}  <small> month</small>
                       @elseif($plan->plan_duration_year)
                            {{$plan->plan_duration_year}}<small> year</small>
                        @endif    
                    </div>
                    <ul class="price-table__info">
                    <li>{!!$plan->description!!}</li>
                       <!--  <li>In dapibus ipsum sit amet leo</li>
                        <li>Vestibulum ut mauris tellus donec</li>
                        <li>Purna lectus venenatis felis nonsemper</li>
                        <li>Aliquam erat volutpat hasellus ultri</li> -->
                    </ul>
                    <a href="{{url('/select_plan')}}/{{$plan->id}}" class="price-table__action">Select Plan</a>
                </div>
            </div>
        @endforeach

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