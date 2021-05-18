@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><a class="" href="{{ route('question.index') }}"><i
											class="fa fa-arrow-left"></i></a></h5>
							@if ($errors->any())
								<div class="alert alert-danger  ">
									<ul>
										@foreach ($errors->all() as $error)
											<span class="text-uppercase">{!! $error !!}</span>
										@endforeach
									</ul>
								</div>
							@endif
							<div class="row mt-3">
								<div class="col-lg-12">
									<form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label for="logo">Logo</label>
											<input type="file" name="image"  class="form-control">
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-light px-5"><i class="fa fa-save"></i>
												Saqlash
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div><!--End Row-->
				</div>
			</div>
		</div>
	</div>
	<!-- End container-fluid--><!--End content-wrapper-->

@endsection
