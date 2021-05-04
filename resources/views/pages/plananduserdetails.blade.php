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
 
   <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<section class="content">
        @include('layouts.flash-messages')
        @yield('content')
    

<div class="card" onLoad="codeAddress()">
        <div class="card-body">
            
            <h4 class="card-title">User details</h4>
            <hr>
            <form class="row aboits'" action="{{url('payment')}}" method="post"  >
        
               @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' :''}}" name="name" placeholder="name" value='{{$user->name}}'>
                        <div class="invalid-feedback">@error('title') {{$message}}@enderror</div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control  {{ $errors->has('email') ? ' is-invalid' :''}}" name="email" placeholder="email" value='{{$user->email}}'>
                        <div class="invalid-feedback">@error('email') {{$message}}@enderror</div>
                    </div>

                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="tel" class="form-control  {{ $errors->has('telephone') ? ' is-invalid' :''}}" name="telephone" placeholder="telephone" value='{{$user->telephone}}'>
                        <div class="invalid-feedback">@error('telephone') {{$message}}@enderror</div>
                    </div>

                    <div class="form-group">
                        <label>Plan name</label>
                        <input type="text" class="form-control  {{ $errors->has('planname') ? ' is-invalid' :''}}" name="planname" placeholder="plan name" value='{{$plan->title}}'>
                        <div class="invalid-feedback">@error('planname') {{$message}}@enderror</div>
                    </div>
                    
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control  {{ $errors->has('amount') ? ' is-invalid' :''}}" name="amount" placeholder="amount" value='{{$plan->amount}}'>
                        <div class="invalid-feedback">@error('amount') {{$message}}@enderror</div>
                    </div>
                   
                 </div>
                    <div class="col-md-12">
                    
                    <button type="submit" class="btn btn-theme form-control" >Next</button>
                   
                    </div>
                </div>     
                    
            </form> 
           
             <!-- <button id="rzp-button1" >Pay</button>  -->
        </div>
    </div>
</section>

@endsection



