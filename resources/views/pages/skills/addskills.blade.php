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
            <h4 class="card-title">ADD SKILL</h4>
            <form class="row maincategory" action="{{url('addnewskill')}}" method="post" >
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ADD SKILLS</label>
                        <input type="text" class="form-control  {{ $errors->has('skillname') ? ' is-invalid' :''}}" name="skillname" placeholder="Add skills">
                        <div class="invalid-feedback">@error('skillname') {{$message}}@enderror</div>
                    </div>
                    
                    <button type="submit" class="btn btn-theme">Add Skill</button>
                </div>
                    
            </form><hr>
            <form class="row subcategory" action="{{url('userskills')}}" method="post">
            @csrf
                <div class= col-md-6>
                <div class="form-group">
                        <label>SKILL</label>
                        <select class="form-control  {{ $errors->has('userskillname') ? ' is-invalid' :''}}" name="userskillname">
                            <option value="">select</option>
                            @foreach($data as $skill)
                            <option value="{{$skill->skillname}}">{{$skill->skillname}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('userskillname') {{$message}}@enderror</div>
                    </div>
                    <div class="form-group ">
                        <label>skill in Persantage(%)</label>
                        <input type="text" class="form-control {{ $errors->has('percentage') ? ' is-invalid' :''}}" placeholder="skill in %" name="percentage">
                        <div class="invalid-feedback">@error('percentage') {{$message}}@enderror</div>
                    </div>
                    <button type="submit" class="btn btn-theme">Submit Skill</button>
                
                </div>    
                
            </form>    
        </div>
    </div>
</section>
@endsection


