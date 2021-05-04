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
    .rupee{
        font-size:60px;
    }
</style>
 
   <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<section class="content">
        @include('layouts.flash-messages')
        @yield('content')
    

<div class="card" >
        <div class="card-body text-center">
            
            <h4 class="card-title">Pay</h4>
            <hr>
            <div class="box text-center">
            <i class="zwicon-rupee-sign rupee">{{$userdata->subscription_amount}}</i></br>
            <h3>{{$userdata->subscription_plan}}</h3>
            <small>{{$userdata->email}}</small></br>
           
            </div>
            <button id="rzp-button1" class="btn btn-outline-primary">Pay</button> 
           
        </div>
    </div>
</section>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

    var options = {
    "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$userdata->subscription_amount}}" *100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "{{$userdata->name}}",
    "image": "https://www.cv-library.co.uk/downloads/cvl_blue_logo.jpg",
    "order_id":"{{$userdata->payment_id}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "{{url('pay')}}",
    "prefill": {
        "name": "{{$userdata->name}}",
        "email": "{{$userdata->email}}",
        "contact": "{{$userdata->telephone}}"
    },
    "theme": {
        "color": "#3f765ae3"
    }
};

var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

@endsection



