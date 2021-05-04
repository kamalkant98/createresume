@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
    <!--Oh snap! <a href="#" class="alert-link">Change a few things up</a> and try submitting again.-->
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>

    Warning! Better check yourself, you're <a href="#" class="alert-link">not looking too good</a>.
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
<!--     Heads up! This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
 --></div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
<div class="modal fade" id="modal-default" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Alert</h5>
                    </div>
                    <div class="modal-body">
                       <strong> Are You Sure You Want Delete The Data.</strong>
                    </div>
                    <div class="modal-footer">
                        <a class="deletedata" href=""><button type="button" class="btn btn-outline-danger">Delete</button></a>
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <style>
        .permisson{
            width:100%;
        }
        .permisson ul {
            padding:0px;
        }
        .permisson ul li{
            display: flex;
        }
        .kk{
            width:100%
        }
        .demo-inline-wrapper{
            margin:0px;
        }
    </style>
       

    <div class="modal fade" id="modal-scrollable" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content "  style="background-color:#3c3c3c;">
                <div class="modal-header">
                    <h5 class="modal-title">Permissions</h5>
                </div>
                <div class="modal-body permisson">
                <form class="permissionform" action="" method="post" >
                    @csrf
                <h6> Products permissions </h6> <hr>
                        <ul>
                          
                            <li>
                            <div class="kk">Not Add product </div>
                            
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox"name="permission[]" class="toggle-switch__checkbox" value="addproduct">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Edit product</div> 
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="editproduct">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Delete product </div>
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="deleteproduct">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                                
                            </li>

                        </ul>
                        <hr> <h6> Abouts permissions</h6> <hr>
                        <ul>
                          
                            <li>
                            <div class="kk">Not Add Abouts</div>
                            
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="addabout">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Edit Abouts</div> 
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="editabout">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Delete Abouts </div>
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="deleteabout">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                                
                            </li>

                        </ul>
                        <hr> <h6>Testimonials permissions</h6> <hr>
                        <ul>
                          
                            <li>
                            <div class="kk">Not Add Testimonials </div>
                            
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="addtestimonials">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Edit Testimonials</div> 
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="edittestimonials">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Delete Testimonials </div>
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="deletetestimonials">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                                
                            </li>

                        </ul>
                        <hr> <h6>Services permissions</h6> <hr>
                        <ul>
                          
                            <li>
                            <div class="kk">Not Add Services </div>
                            
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="addservices">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Edit Services</div> 
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="editservices">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                            
                            </li>
                            <li>
                                <div class="kk">Not Delete Services </div>
                                
                                    <div class="demo-inline-wrapper">
                                        <div class="form-group">
                                            <div class="toggle-switch toggle-switch--green">
                                                <input type="checkbox" name="permission[]" class="toggle-switch__checkbox" value="deleteservices">
                                                <i class="toggle-switch__helper"></i>
                                            </div>
                                        </div>
                                    </div>
                                
                            </li>

                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-link">Save changes</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    </div></form>
                </div>
            </div>
        </div>