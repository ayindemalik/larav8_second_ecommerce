@extends('admin.admin_master') <!-- Remaning part will be taken from admin_master file -->
@section('admin_main_content') <!-- REplace this code with the section named admin_main_content in admin_master  -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">

        <div class="row">

        <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Profile</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Extra</li>
								<li class="breadcrumb-item active" aria-current="page">Profile</li>
                                <a href=" {{ route('admin.edit_profile') }}"><button type="button" class="btn btn-rounded btn-success mb-5 float-right">Success</button></a>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		  <div class="row">
			  <div class="col-12 col-lg-5 col-xl-4">

              <!-- /.box -->
				 <div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
					  <h3 class="widget-user-username">Admin Name : {{ $adminData->name }}</h3>
					  <h6 class="widget-user-desc">Admin Email : {{ $adminData->name }}</h6>
                      
					</div>
					<div class="widget-user-image">
					  <img class="rounded-circle" src=" {{ !empty($adminData->profile_photo_path) ?  
                                    url('uploads/admin_images/'.$adminData->profile_photo_path) : url('uploads/no_image.jpg') }} "
                       alt="User Avatar">
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>
				  
				  
				  <!-- Profile Image -->
				  <div class="box">
					<div class="box-body box-profile">            
					  <div class="row">
						<div class="col-12">
							<div>
								<p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
								<p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
								<p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
							</div>
						</div>
						<div class="col-12">
							<div class="pb-15">						
								<p class="mb-10">Social Profile</p>
								<div class="user-social-acount">
									<button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
									<button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
									<button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div>
								<div class="map-box">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen=""></iframe>
								</div>
							</div>
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>

				  
			  </div>
			  <div class="col-12 col-lg-7 col-xl-8">
				
			  <div class="nav-tabs-custom box-profile">
				<ul class="nav nav-tabs">
				  <li><a class="active" href="#usertimeline" data-toggle="tab">Timeline</a></li>
				  <li><a href="#activity" data-toggle="tab">Activity</a></li>
				  <li><a href="#settings" data-toggle="tab">Settings</a></li>
				</ul>

				<div class="tab-content">

				 <div class="active tab-pane" id="usertimeline">
					<div class="publisher publisher-multi bg-white b-1 mb-30">
					  <textarea class="publisher-input auto-expand" rows="4" placeholder="Write something"></textarea>
					  <div class="flexbox">
						<div class="gap-items">
						  <span class="publisher-btn file-group">
							<i class="fa fa-image file-browser"></i>
							<input type="file">
						  </span>
						  <a class="publisher-btn" href="#"><i class="fa fa-map-marker"></i></a>
						  <a class="publisher-btn" href="#"><i class="fa fa-smile-o"></i></a>
						</div>

						<button class="btn btn-sm btn-bold btn-primary">Post</button>
					  </div>
					</div> 

				  </div>    
				  <!-- /.tab-pane -->

				  <div class="tab-pane" id="activity">			

					<div class="box p-15">				
					<!-- Post -->
					<div class="post">
					  <div class="user-block">
						<img class="img-bordered-sm rounded-circle" src="../images/user1-128x128.jpg" alt="user image">
							<span class="username">
							  <a href="#">Brayden</a>
							  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
							</span>
						<span class="description">5 minutes ago</span>
					  </div>
					  <!-- /.user-block -->
					  <div class="activitytimeline">
						  <p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
						  </p>
						  <ul class="list-inline">
							<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
							<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
							</li>
							<li class="pull-right">
							  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
								(5)</a></li>
						  </ul>
						  <form class="form-element">
							  <input class="form-control input-sm" type="text" placeholder="Type a comment">
						 </form>
					  </div>
					</div>
					<!-- /.post -->

					<!-- Post -->
					<div class="post">
					  <div class="user-block">
						<img class="img-bordered-sm rounded-circle" src="../images/user6-128x128.jpg" alt="user image">
							<span class="username">
							  <a href="#">Evan</a>
							  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
							</span>
						<span class="description">5 minutes ago</span>
					  </div>
					  <!-- /.user-block -->
					  <div class="activitytimeline">
						  <div class="row mb-20">
							<div class="col-sm-6">
							  <img class="img-fluid" src="../images/photo1.png" alt="Photo">
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
							  <div class="row">
								<div class="col-sm-6">
								  <img class="img-fluid" src="../images/photo2.png" alt="Photo">
								  <br><br>
								  <img class="img-fluid" src="../images/photo3.jpg" alt="Photo">
								</div>
								<!-- /.col -->
								<div class="col-sm-6">
								  <img class="img-fluid" src="../images/photo4.jpg" alt="Photo">
								  <br><br>
								  <img class="img-fluid" src="../images/photo1.png" alt="Photo">
								</div>
								<!-- /.col -->
							  </div>
							  <!-- /.row -->
							</div>
							<!-- /.col -->
						  </div>
						  <!-- /.row -->

						  <ul class="list-inline">
							<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
							<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
							</li>
							<li class="pull-right">
							  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
								(5)</a></li>
						  </ul>

						  <form class="form-element">
							  <input class="form-control input-sm" type="text" placeholder="Type a comment">
						 </form>
						</div>
					</div>
					<!-- /.post -->

					<!-- Post -->
					<div class="post clearfix">
					  <div class="user-block">
						<img class="img-bordered-sm rounded-circle" src="../images/user7-128x128.jpg" alt="user image">
							<span class="username">
							  <a href="#">Nicholas</a>
							  <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
							</span>
						<span class="description">5 minutes ago</span>
					  </div>
					  <!-- /.user-block -->
						<div class="activitytimeline">
						  <p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
						  </p>

						  <form class="form-horizontal form-element">
							<div class="form-group row no-gutters">
							  <div class="col-sm-9">
								<input class="form-control input-sm" placeholder="Response">
							  </div>
							  <div class="col-sm-3">
								<button type="submit" class="btn btn-rounded btn-danger pull-right btn-block btn-sm">Send</button>
							  </div>
							</div>
						  </form>
						</div>
					</div>
					<!-- /.post -->
				   </div>

				  </div>
				  <!-- /.tab-pane -->

				  <div class="tab-pane" id="settings">		

					<div class="box p-15">		
						<form class="form-horizontal form-element col-12">
						  <div class="form-group row">
							<label for="inputName" class="col-sm-2 control-label">Name</label>

							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputName" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputEmail" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputEmail" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputPhone" class="col-sm-2 control-label">Phone</label>

							<div class="col-sm-10">
							  <input type="tel" class="form-control" id="inputPhone" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputExperience" class="col-sm-2 control-label">Experience</label>

							<div class="col-sm-10">
							  <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
							</div>
						  </div>
						  <div class="form-group row">
							<label for="inputSkills" class="col-sm-2 control-label">Skills</label>

							<div class="col-sm-10">
							  <input type="text" class="form-control" id="inputSkills" placeholder="">
							</div>
						  </div>
						  <div class="form-group row">
							<div class="ml-auto col-sm-10">
							  <div class="checkbox">
								<input type="checkbox" id="basic_checkbox_1" checked="">
								<label for="basic_checkbox_1"> I agree to the</label>
								  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
							  </div>
							</div>
						  </div>
						  <div class="form-group row">
							<div class="ml-auto col-sm-10">
							  <button type="submit" class="btn btn-rounded btn-success">Submit</button>
							</div>
						  </div>
						</form>
					</div>			  
				  </div>
				  <!-- /.tab-pane -->
				</div>
				<!-- /.tab-content -->
			  </div>
			  <!-- /.nav-tabs-custom -->
			</div>			  
		  </div>
		  <!-- /.row -->

		</section>
		<!-- /.content -->
	  </div>
                    
        </div>

    </section>
    <!-- /.content -->
    </div>
@endsection