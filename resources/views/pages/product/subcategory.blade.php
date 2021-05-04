@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')
 <section class="content ">
    <div class="card">
                           
            <div class="card-body">
               
                <div class="row">
                    <div class="col-md-12">
                    <h4 class="card-title">SubCategories List of ( {{$maincat->maincategoryname}} ) category</h4>
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subcategory Name</th>
                                    <th>create_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($subcat as $k=>$v)
                                <tr>
                                    <th>{{$i++}}</th>
                                    <td>{{$v->subcategoryname}}</td>
                                    <td>{{date('d F,Y', strtotime($v->created_at))}}</td>
                                    <td><button type="submit" class="btn btn-theme">button</button></td>
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
    @endsection