@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><a class="" href="{{ route('setting.index') }}"><i
											class="fa fa-arrow-left"></i></a></h5>
							@if ($errors->any())
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									@foreach ($errors->all() as $error)
									<ul class="text-uppercase pt-1">
											{!! $error !!}
									</ul>
									@endforeach
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							@endif
							<div class="row mt-3">
								<div class="col-lg-12">
									<form action="{{ route('setting.update',$setting->id) }}" method="post">
										@csrf
										@method('PATCH')
										<div class="form-group">
											<label for="phone">Tel <i class="fa fa-phone"></i></label>
											<input type="text" name="phone" value="{{ $setting->phone }}" class="form-control" id="phone">
										</div>
										<div class="form-group">
											<label for="phone">Email <i class="fa fa-envelope"></i></label>
											<input type="text" name="email" value="{{ $setting->email }}" class="form-control" id="email">
										</div>
										<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
											<li class="nav-item" role="presentation">
												<a class="nav-link active" id="pills-home-tab"
												   data-toggle="pill" href="#pills-home" role="tab"
												   aria-controls="pills-home" aria-selected="true">Manzil Uz</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#pills-profile" role="tab"
												   aria-controls="pills-profile" aria-selected="false">Manzil Ru</a>
											</li>
										</ul>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="pills-home"
											     role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="form-group">
													<label for="address_uz">Manzil Uz</label>
													<input type="text" name="address_uz" value="{{ $setting->address_uz }}" class="form-control" id="address_uz">
												</div>

											</div>
											<div class="tab-pane fade" id="pills-profile" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="address_ru">Manzil Ru</label>
													<input type="text" name="address_ru" value="{{ $setting->address_ru }}" class="form-control" id="address_ru">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="work_day">Ish vaqti <i class="fa fa-clock-o" style="font-size: 17px"></i></label>
											<input type="text" name="work_day" value="{{ $setting->work_day }}" class="form-control" id="work_day">
										</div>
										<div class="form-group">
											<label for="instagram">Instagram link <i class="fa fa-instagram" style="font-size: 17px"></i></label>
											<input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control" id="instagram">
										</div>
										<div class="form-group">
											<label for="tik_tok">tik-tok link<i class="fa fa-music" style="font-size: 17px"></i></label>
											<input type="text" name="tik_tok" value="{{ $setting->tik_tok }}" class="form-control" id="tik_tok">
										</div>
										<div class="form-group">
											<label for="facebook">facebook link <i class="fa fa-facebook-official" style="font-size: 17px"></i></label>
											<input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control" id="facebook">
										</div>
										<div class="form-group">
											<label for="youtube">youtube link <i class="fa fa-youtube" style="font-size: 17px"></i></label>
											<input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control" id="youtube">
										</div>
										<div class="form-group">
											<label for="telegram">telegram link <i class="fa fa-telegram" style="font-size: 17px"></i></label>
											<input type="text" name="telegram" value="{{ $setting->telegram }}" class="form-control" id="telegram">
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
	</div>
	<!-- End container-fluid-->

	</div><!--End content-wrapper-->

@endsection
