@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp 

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Jalla Service dashboard | {{$route}} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href=" {{ asset('frontend/assets/images/logo/Jalla_Logo-356x300.png') }}">

        <!-- select2 -->
        <link href="{{ asset('backend/dashb_assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">

        <!-- jquery.vectormap css -->
        <link href=" {{ asset('backend/dashb_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css ') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href=" {{ asset('backend/dashb_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href=" {{ asset('backend/dashb_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/dashb_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/dashb_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/dashb_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <!-- Select2 -->
        {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}>"> --}}
        {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}>"> --}}
    </head>

    <body data-topbar="dark">
        @php 
        function format_num2($number = '' , $decimal = ''){
            if(is_numeric($number)){
                $ex = explode(".",$number);
                $decLen = isset($ex[1]) ? strlen($ex[1]) : 0;
                if(is_numeric($decimal)){
                    return number_format($number,$decimal);
                }else{
                    return number_format($number,$decLen);
                }
            }else{
                return "Invalid Input";
            }
        } 
        @endphp
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        
        @yield('main_header')
        

        @yield('dash_main_content')

        <!-- Right Sidebar -->
       
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/dashb_assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/select2/js/select2.min.js') }}"></script>

        
        <!-- apexcharts -->
        <script src="{{ asset('backend/dashb_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('backend/dashb_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('backend/dashb_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        
        <!-- Responsive examples -->
        <script src="{{ asset('backend/dashb_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/dashb_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('backend/dashb_assets/js/pages/dashboard.init.js') }}"></script>

        <!-- Buttons examples -->
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/jszip/jszip.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src=" {{ asset('backend/dashb_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src=" {{ asset('backend/dashb_assets/js/pages/datatables.init.js') }}"></script>

        <!--tinymce js-->
        <script src=" {{ asset('backend/dashb_assets/libs/tinymce/tinymce.min.js') }}"></script>
        <!-- FORM EDITOR init js -->
        <script src=" {{ asset('backend/dashb_assets/js/pages/form-editor.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/dashb_assets/js/app.js') }}"></script>

     
        <!-- Select2 -->
        {{-- <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js')}}"></script> --}}

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        
        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>

        {{-- FROM OTHER THIRD PARTS --}}
        <script src="{{ asset('assets/dist/js/script.js') }}"></script>
        
        {{-- <script src=" {{ asset('backend/js/admin_scripts/users.js') }}"></script> --}}

        <!-- Add to Cart Product Modal -->
        <div class="modal fade bs-example-modal-xl" id="dataProcessModal" tabindex="-1" role="dialog" aria-labelledby="dataProcessModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataProcessModalTitle">Extra large modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="dataProcessModalSuccessMessage"></div>
                        <div class="row" id="dataProcessModalContent"></div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        {{-- <div class="modal fade" id="uni_modal" role='dialog' data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog  rounded-0 modal-md modal-dialog-centered" role="document">
              <div class="modal-content  rounded-0">
                <div class="modal-header  rounded-0">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body  rounded-0">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-flat btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                <button type="button" class="btn btn-sm btn-flat btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
              </div>
            </div>
        </div> --}}

        <div class="modal fade" id="uni_modal" data-bs-backdrop="static" data-bs-keyboard="false" 
            tabindex="-1" role="dialog" aria-labelledby="uni_modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uni_modalLabel">Static backdrop</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>I will not close if you click outside me. Don't even try to press escape key.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary waves-effect waves-light">Save</button> --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="uni_modal_right" role='dialog'>
            <div class="modal-dialog  rounded-0 modal-full-height  modal-md" role="document">
              <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="fa fa-arrow-right"></span>
                </button>
              </div>
              <div class="modal-body rounded-0">
              </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="viewer_modal" role='dialog'>
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content rounded-0">
                      <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                      <img src="" alt="">
              </div>
            </div>
        </div>

        <div class="modal fade" id="confirm_modal" role='dialog'>
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
              </div>
              <div class="modal-body">
                <div id="delete_content"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-flat btn-primary" id='confirm' onclick="">Continue</button>
                <button type="button" class="btn btn-sm btn-flat btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
        </div>


        <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch(type){
                    case 'info':
                        toastr.info(" {{Session::get('message') }} ");
                        break;

                    case 'success':
                        toastr.success(" {{Session::get('message') }} ");
                        break;

                    case 'warning':
                        toastr.warning(" {{Session::get('message') }} ");
                        break;

                    case 'error':
                        toastr.error(" {{Session::get('message') }} ");
                        break;
                }
            @endif
            
            function mainThamUrl(input) {
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#mainThmb').attr('src', e.target.result).width(120).height(120);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        {{-- <script>
            $(document).ready(function(){
            window.viewer_modal = function($src = ''){
                start_loader()
                var t = $src.split('.')
                t = t[1]
                if(t =='mp4'){
                var view = $("<video src='"+$src+"' controls autoplay></video>")
                }else{
                var view = $("<img src='"+$src+"' />")
                }
                $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
                $('#viewer_modal .modal-content').append(view)
                $('#viewer_modal').modal({
                        show:true,
                        backdrop:'static',
                        keyboard:false,
                        focus:true
                    })
                    end_loader()  
        
            }
            window.uni_modal = function($title = '' , $url='',$size=""){
                start_loader()
                $.ajax({
                    url:$url,
                    error:err=>{
                        console.log()
                        alert("An error occured")
                    },
                    success:function(resp){
                        if(resp){
                            $('#uni_modal .modal-title').html($title)
                            $('#uni_modal .modal-body').html(resp)
                            if($size != ''){
                                $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                            }else{
                                $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                            }
                            $('#uni_modal').modal({
                                show:true,
                                backdrop:'static',
                                keyboard:false,
                                focus:true
                            })
                            end_loader()
                        }
                    }
                })
            }
            window._conf = function($msg='',$func='',$params = []){
                    $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
                    $('#confirm_modal .modal-body').html($msg)
                    $('#confirm_modal').modal('show')
                }
            })
        </script> --}}

        {{-- usfull scrıpt --}}
        {{-- <script>
            function start_loader() {
                $('body').append('<div id="preloader"><div class="loader-holder"><div></div><div></div><div></div><div></div>')
            }
            
            function end_loader() {
                $('#preloader').fadeOut('fast', function() {
                    $('#preloader').remove();
                })
            }
            // function 
            window.alert_toast = function($msg = 'TEST', $bg = 'success', $pos = '') {
                var Toast = Swal.mixin({
                    toast: true,
                    position: $pos || 'top-end',
                    showConfirmButton: false,
                    timer: 5000
                });
                Toast.fire({
                    icon: $bg,
                    title: $msg
                })
            }
            
            $(document).ready(function() {
                // Login
                $('#login-frm').submit(function(e) {
                        e.preventDefault()
                        start_loader()
                        if ($('.err_msg').length > 0)
                            $('.err_msg').remove()
                        $.ajax({
                            url: _base_url_ + 'classes/Login.php?f=login',
                            method: 'POST',
                            data: $(this).serialize(),
                            error: err => {
                                console.log(err)
            
                            },
                            success: function(resp) {
                                if (resp) {
                                    resp = JSON.parse(resp)
                                    if (resp.status == 'success') {
                                        location.replace(_base_url_ + 'admin');
                                    } else if (resp.status == 'incorrect') {
                                        var _frm = $('#login-frm')
                                        var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                                        _frm.prepend(_msg)
                                        _frm.find('input').addClass('is-invalid')
                                        $('[name="username"]').focus()
                                    }
                                    end_loader()
                                }
                            }
                        })
                    })
                    //Establishment Login
                $('#flogin-frm').submit(function(e) {
                    e.preventDefault()
                    start_loader()
                    if ($('.err_msg').length > 0)
                        $('.err_msg').remove()
                    $.ajax({
                        url: _base_url_ + 'classes/Login.php?f=flogin',
                        method: 'POST',
                        data: $(this).serialize(),
                        error: err => {
                            console.log(err)
            
                        },
                        success: function(resp) {
                            if (resp) {
                                resp = JSON.parse(resp)
                                if (resp.status == 'success') {
                                    location.replace(_base_url_ + 'faculty');
                                } else if (resp.status == 'incorrect') {
                                    var _frm = $('#flogin-frm')
                                    var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                                    _frm.prepend(_msg)
                                    _frm.find('input').addClass('is-invalid')
                                    $('[name="username"]').focus()
                                }
                                end_loader()
                            }
                        }
                    })
                })
            
                //user login
                $('#slogin-frm').submit(function(e) {
                        e.preventDefault()
                        start_loader()
                        if ($('.err_msg').length > 0)
                            $('.err_msg').remove()
                        $.ajax({
                            url: _base_url_ + 'classes/Login.php?f=slogin',
                            method: 'POST',
                            data: $(this).serialize(),
                            error: err => {
                                console.log(err)
            
                            },
                            success: function(resp) {
                                if (resp) {
                                    resp = JSON.parse(resp)
                                    if (resp.status == 'success') {
                                        location.replace(_base_url_ + 'student');
                                    } else if (resp.status == 'incorrect') {
                                        var _frm = $('#slogin-frm')
                                        var _msg = "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>"
                                        _frm.prepend(_msg)
                                        _frm.find('input').addClass('is-invalid')
                                        $('[name="username"]').focus()
                                    }
                                    end_loader()
                                }
                            }
                        })
                    })
                    // System Info
                $('#system-frm').submit(function(e) {
                    e.preventDefault()
                    start_loader()
                    if ($('.err_msg').length > 0)
                        $('.err_msg').remove()
                    $.ajax({
                        url: _base_url_ + 'classes/SystemSettings.php?f=update_settings',
                        data: new FormData($(this)[0]),
                        cache: false,
                        contentType: false,
                        processData: false,
                        method: 'POST',
                        type: 'POST',
                        dataType: 'json',
                        success: function(resp) {
                            if (resp.status == 'success') {
                                // alert_toast("Data successfully saved",'success')
                                location.reload()
                            } else if (resp.status == 'failed' && !!resp.msg) {
                                $('#msg').html('<div class="alert alert-danger err_msg">' + resp.msg + '</div>')
                                $("html, body").animate({ scrollTop: 0 }, "fast");
                            } else {
                                $('#msg').html('<div class="alert alert-danger err_msg">An Error occured</div>')
                            }
                            end_loader()
                        }
                    })
                })
            })
        </script> --}}
        <script>
            uni_modal = function($title = '' , $cotent_body=''){
                $('.modal-title').html($title)
                $('.modal-body').html($cotent_body)
            }

            function submitForm(){
                $.ajax({
                    type: 'GET',
                    url: '/user/wishlist-remove/'+id,
                    dataType:'json',
                    success:function(data){
                        
                    }
                });
            }
        </script>

        
        

        @yield('page-script')
    </body>

</html>