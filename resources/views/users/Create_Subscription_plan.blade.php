@extends('layouts.app',['activePage' => 'addtestimonials', 'titlePage' => __('addtestimonials')])


@section('content')
<style>
        option{
        color:black;
    } 
    .testimonialimage{
        width:70px;
        height:70px;
    }
</style>
@php
    if(isset($plan)){
        
        $id= $plan->id;
   
    } else{
         $id='';
        
    }
   @endphp   
   <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<section class="content">
        @include('layouts.flash-messages')
        @yield('content')
    

<div class="card">
        <div class="card-body">
            @if(!empty($id))
            <h4 class="card-title">Update About</h4><hr>
            <form class="row aboits'" action="{{url('update_plan')}}" method="post"  enctype="multipart/form-data">
            @else
            <h4 class="card-title">Subscription plan</h4>
            <hr>
            <form class="row aboits'" action="{{url('add_Subscription_plan')}}" method="post"  >
            @endif 
            @csrf
                <input type="hidden" name="planid" value="{{ $plan->id ?? ''}}">
               
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control  {{ $errors->has('title') ? ' is-invalid' :''}}" name="title" placeholder="Title" value='{{$plan->title ?? ""}}'>
                        <div class="invalid-feedback">@error('title') {{$message}}@enderror</div>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control input-mask {{ $errors->has('Amount') ? ' is-invalid' :''}}"  name="Amount" data-mask="000,000,000,000,000,00" placeholder="eg: 000,000,000,000,000,00" value="{{$plan->amount ?? ''}}">
                                
                        <div class="invalid-feedback">@error('Amount') {{$message}}@enderror</div>
                    </div>
                 </div>
             
                 <div class="col-md-3">
                    <div class="form-group">
                        <label>Plan Duration Day</label>
                        <input type="number" class="form-control  {{ $errors->has('Plan_Duration_day') ? ' is-invalid' :''}}" name="Plan_Duration_day" placeholder="Title" value='{{$plan->plan_duration_day ?? ""}}'>
                        <div class="invalid-feedback">@error('Plan_Duration_day') {{$message}}@enderror</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Plan Duration Week</label>
                        <input type="number" class="form-control  {{ $errors->has('Plan_Duration_week') ? ' is-invalid' :''}}" name="Plan_Duration_week" placeholder="Title" value='{{$plan->plan_duration_week ?? ""}}'>
                        <div class="invalid-feedback">@error('Plan_Duration_week') {{$message}}@enderror</div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Plan Duration Month</label>
                        <input type="number" class="form-control  {{ $errors->has('Plan_Duration_month') ? ' is-invalid' :''}}" name="Plan_Duration_month" placeholder="Title" value='{{$plan->plan_duration_month ?? ""}}'>
                        <div class="invalid-feedback">@error('Plan_Duration_month') {{$message}}@enderror</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Plan Duration Year</label>
                        <input type="number" class="form-control  {{ $errors->has('Plan_Duration_year') ? ' is-invalid' :''}}" name="Plan_Duration_year" placeholder="Title" value='{{$plan->plan_duration_year ?? ""}}'>
                        <div class="invalid-feedback">@error('Plan_Duration_year') {{$message}}@enderror</div>
                    </div>
                </div>
               
                   
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control {{ $errors->has('Description') ? 'is-invalid' :''}}" id="summary-ckeditor" name="Description">{{$plan->description ?? ""}}</textarea>
                        <div class="invalid-feedback">@error('Description') {{$message}}@enderror</div>
                        <br>
                        @if(!empty($id))
                        <button type="submit" class="btn btn-theme">Update Plan</button>
                        @else
                        <button type="submit" class="btn btn-theme">Add Plan</button>
                        @endif
                    </div>
            </form>
               
        </div>
    </div>
</section>
<script>
CKEDITOR.replace('summary-ckeditor');
</script>
@endsection



