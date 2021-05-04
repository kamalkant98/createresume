@extends('layouts.app',['activePage' => 'productadd', 'titlePage' => __('productadd')])

@section('content')

<style>
        option{
            color:black;
        }
        .error1{
            width: 100%;
            margin-top: .25rem;
            font-size: .9rem;
            color: #dc3545;
        }
        .img{
                background-position-x: center;
				background-position-y: center;
				height: 100px;
				width: 100px;
				background-repeat: no-repeat;
				background-size: cover;
				border:solid 2px #436c6d;
				float: left;
                text-align: center;
                margin:10px;
        }
        .imgerror{
            background-position-x: center;
            background-position-y: center;
            height: 100px;
            width: 100px;
            color:red;
            background-repeat: no-repeat;
            background-size: cover;
            border:solid 2px red;
            float: left;
            text-align: center;
            margin:10px;
        }
        .docerror{
            font-size:40px;
            }
        .dec{
            line-height: 1.5em;
            min-height: 1em;
            max-height: 3em;
            overflow: hidden;
            white-space: normal;
            text-overflow: ellipsis;
        }
       
        .cross{
            position: relative;
            top: -20px;
            right: -47px;
            }
            .errorcross{
            position: relative;
            top: -29px;
            right: -29px;
            }
        
    </style>
 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<section class="content">
@include('layouts.flash-messages')
		@yield('content')
    <form action="{{url('create_product')}}" method="post" enctype="multipart/form-data" class="formdata">   
    @csrf
        <div class="row">
            
            <div class="form-group col-md-12">
                <label>Name</label>
                <input type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' :''}}" placeholder="name" name="name">
                <div class="invalid-feedback">@error('name') {{$message}}@enderror</div>
            </div> 
           
            <!--<div class="form-group col-md-6">
                <label>Phone number</label>
                <input type="text" class="form-control input-mask" data-mask="0000-00-0000" placeholder="eg: 0000-00-0000">
            </div> -->

            <div class="form-group col-md-6">
                <label>Main Category</label>
                <div class="select">
                    <select class="form-control {{ $errors->has('MainCategory') ? ' is-invalid' :''}}" name="MainCategory" >
                        <option value="">select</option>
                        @foreach($maincate as $k=>$v)
                             <option value="{{$v->id}}">{{$v->maincategoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="invalid-feedback">@error('MainCategory') {{$message}}@enderror</div>
            </div> 

            <div class="form-group col-md-6">
                <label>Sub Category</label>
                <div class="select">
                    <select class="form-control {{$errors->has('subCategory') ? 'is-invalid' :''}}" name="subCategory">
                        <option value="">sub category</option>
                        @foreach($subcate as $key=>$val)
                             <option value="{{$val->id}}">{{$val->subcategoryname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="invalid-feedback">@error('subCategory') {{$message}}@enderror</div>
            </div> 
            <div class="form-group col-md-3">
                <label>Price</label>
                <input type="text"  name="Price" class="form-control input-mask {{$errors->has('Price') ? 'is-invalid' :''}}" data-mask="000,000,000,000,000,00" placeholder="eg: 000.000.000.000.000,00">
                <div class="invalid-feedback">@error('Price') {{$message}}@enderror</div>
            </div>
            <div class="form-group col-md-3">
                <label>Discount</label>
                <input type="text" name="Discount" class="form-control input-mask  {{$errors->has('Discount') ? 'is-invalid' :''}}" data-mask="000,000,000,000,000,00" placeholder="eg: 000.000.000.000.000,00">
                <div class="invalid-feedback">@error('Discount') {{$message}}@enderror</div>
            </div>
            <div class="form-group col-md-3">
            <label>Cover Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input coverfiles {{ $errors->has('coverfiles') ? ' is-invalid' :''}}" id="coverfiles" name="coverfiles" >
                                <label class="custom-file-label" for="coverfiles">Cover Image</label>
                                <div class="invalid-feedback">@error('coverfiles') {{$message}}@enderror</div>
                            </div>
               
               <!-- <input type="file" name="coverfiles" class="form-control  coverfiles {{$errors->has('coverfiles') ? 'is-invalid' :''}}">
                <div class="invalid-feedback">@error('coverfiles') {{$message}}@enderror</div> -->
            </div>
            <div class="form-group col-md-3">
                <label>Side image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input sidefiles {{ $errors->has('imgs') ? ' is-invalid' :''}}" id="sidefiles" name="sidefiles[]" multiple >
                        <label class="custom-file-label" for="sidefiles">Side image</label>
                        <div class="invalid-feedback">@error('imgs') {{$message}}@enderror</div>
                    </div>

                <!--<input type="file" name="sidefiles[]" class="form-control  sidefiles  {{$errors->has('imgs') ? 'is-invalid' :''}}" multiple>
                <div class="invalid-feedback">@error('imgs') {{$message}}@enderror</div> -->
            </div>
            <div class="col-md-12 previewimage">
               
            </div>
            <div class="col-md-12">
                <h5 class="card-body__title">Description</h5>
                <div class="form-group">
                     <textarea class="form-control {{ $errors->has('Description') ? 'is-invalid' :''}}" id="summary-ckeditor" name="Description" id="summary-ckeditor"  data-min-length="10" placeholder="Start typing... (Min set to 10)"></textarea>
                    <div class="invalid-feedback">@error('Description') {{$message}}@enderror</div>
                </div>
            </div>
            
            
        </div>
        <button type="submit" class="btn btn-primary submitbtn">submit</button>
    </form>
</section>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<script>
 CKEDITOR.replace('summary-ckeditor');

    var k=0;
    $(document).ready(function(){
           

        $('.sidefiles').change(function(){
            var formData = new FormData($('.formdata')[0]);
            $.ajax({
                    url:"{{url('tmpimage')}}",
                    method:'POST',
                    data:formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.status == true){
                            if(data.data !==''){
                                var movefile= data.data.length;
									for(var j=0;j<movefile;j++){
										k++;
										$('.previewimage').append("<input type='hidden' name='imgs[]' class='imginput"+k+" imginput' id='imgsvalue"+k+"' value='"+data.data[j]+"'>");
                                        $('.previewimage').append('<div class="img img'+k+'" style="background-image:url(sidefiles/'+data.data[j]+');">   <button type="button" class="btn btn-theme-dark btn--icon cross " id="'+k+'" value="'+data.data[j]+'"><i class="zwicon-close"></i></button></div>')
									}
                                    $('.formdata').find('.sidefiles').val('');
                            }
                            if(data.orignalename !== ''){
                                var notallowfile = data.orignalename.length;
                                for(var i=0;i<notallowfile;i++){
                                    $('.previewimage').append('<div class="imgerror imgerror'+i+'"><i class="zwicon-document docerror"></i> <button type="button" class="btn btn-theme-dark btn--icon errorcross " id="'+i+'" ><i class="zwicon-close"></i></button> </br><p class="dec">'+data.orignalename[i]+' formet not allow </p></div>')

                                }
                            }
                        }
                    }    
            });
        });
        $(document.body).on('click', '.errorcross' ,function(){
            var getid=$(this).attr('id');
            $('.previewimage').find('.imgerror'+getid).remove();
            
        });
        $(document.body).on('click', '.cross' ,function(){
            var token= $('.formdata').find('[name="_token"]').val();
            var getid=$(this).attr('id');
            var getval=$(this).val();
       
           $.ajax({
                url:"{{url('deletesideimage')}}",
                    method:'POST',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{imgval:getval,imgid:getid},
                    success:function(data){
                      
                            if(data.status == true){
                               $('.previewimage').find('.imginput'+getid).remove()
                                $('.previewimage').find('.img'+getid).remove();
                            }
                    }
            });
            //$('.previewimage').find('.img'+getid).remove();
            //$('.previewimage').find('.imginput'+getid).remove();
        });
       
          
    });
</script>
@endsection