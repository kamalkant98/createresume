@extends('layouts.app',['activePage' => 'addcategory', 'titlePage' => __('addcategory')])


@section('content')
<style>
         option{
            color:black;
        } 
    </style>
<section class="content">
@include('layouts.flash-messages')
		@yield('content')
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Skill</h4>
            
            <form class="row subcategory" action="{{url('updateskill')}}/{{$data->id}}" method="post">
            @csrf
                <div class= col-md-6>
                <div class="form-group">
                        <label>SKILL</label>
                        <select class="form-control  {{ $errors->has('userskillname') ? ' is-invalid' :''}}" name="userskillname">
                            <option value="">select</option>
                            @foreach($allskills as $skill)
                                @if($data->skillname == $skill->skillname)
                                    <option  value="{{$skill->skillname}}" selected>{{$skill->skillname}}</option>
                                @else
                                    <option  value="{{$skill->skillname}}">{{$skill->skillname}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('userskillname') {{$message}}@enderror</div>
                    </div>
                    <div class="form-group ">
                        <label>skill in Persantage(%)</label>
                        <input type="number" min="1" max="100"  class="form-control {{ $errors->has('percentage') ? ' is-invalid' :''}}" placeholder="skill in %" name="percentage" value="{{$data->percentage}}">
                        <div class="invalid-feedback">@error('percentage') {{$message}}@enderror</div>
                    </div>
                    <button type="submit" class="btn btn-theme">Update Skill</button>
                
                </div>    
                
            </form>    
        </div>
    </div>
</section>
@endsection


