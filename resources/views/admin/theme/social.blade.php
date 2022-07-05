@extends('admin.includes.admin_design_v2')

@section('title') Social Settings - {{ config('app.name', 'Laravel') }} @endsection


@section('content')

	<!-- Page Wrapper -->
            <div class="page-wrapper">
			@include('admin.includes._message')
				<!-- Page Content -->
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<form method="post" action="{{route('socialUpdate',$social->id)}}">
								@csrf
								<h4 class="page-title">Social Settings</h4>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Facebook URL</label>
											<input class="form-control" type="url" name="facebook" value="{{$social->facebook}}">
										</div>

											<div class="col-sm-12">
										<div class="form-group">
											<label>Twitter Url</label>
											<input class="form-control" type="url" name="twitter" value="{{$social->twitter}}">
										</div>

											<div class="col-sm-12">
										<div class="form-group">
											<label>Google URL</label>
											<input class="form-control" type="url" name="google" value="{{$social->google}}">
										</div>

											<div class="col-sm-12">
										<div class="form-group">
											<label>Linkedin URL</label>
											<input class="form-control" type="url" name="linkedin" value="{{$social->linkedin}}">
										</div>

											<div class="col-sm-12">
										<div class="form-group">
											<label>Pinterest URL</label>
											<input class="form-control" type="url" name="pinterest" value="{{$social->pinterest}}">
										</div>
									</div>
							
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save &amp; update</button>
								</div>
							</form>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->
@endsection