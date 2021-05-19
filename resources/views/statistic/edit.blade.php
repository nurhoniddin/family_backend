@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><a class="" href="{{ route('statistic.index') }}"><i class="fa fa-arrow-left"></i></a></h5>
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											{!! $error !!}
										@endforeach
									</ul>
								</div>
							@endif
							<div class="row mt-3">
								<div class="col-lg-12">
									<form action="{{ route('statistic.update',$statistic->id) }}" method="post">
										@csrf
										@method('PATCH')
										<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#title_statistic_uz" role="tab" aria-controls="pills-home" aria-selected="true">sarlavha-statistika-uz</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#title_statistic_ru" role="tab" aria-controls="pills-profile" aria-selected="false">sarlavha-statistika-ru</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#text_statistic_uz" role="tab" aria-controls="pills-contact" aria-selected="false">matn-statistika-uz</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#text_statistic_ru" role="tab" aria-controls="pills-contact" aria-selected="false">matn-statistika-ru</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#title_marriages_uz" role="tab" aria-controls="pills-contact" aria-selected="false">Nikoh-qayt-etildi-uz</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#title_marriages_ru" role="tab" aria-controls="pills-contact" aria-selected="false">Nikoh-qayt-etildi-ru</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#title_born_uz" role="tab" aria-controls="pills-contact" aria-selected="false">Bola dunyoga keldi-uz</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#title_born_ru" role="tab" aria-controls="pills-contact" aria-selected="false">Bola dunyoga keldi-ru</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#title_happy_uz" role="tab" aria-controls="pills-contact" aria-selected="false">Baxtiyor oila-uz</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#title_happy_ru" role="tab" aria-controls="pills-contact" aria-selected="false">Baxtiyor oila-ru</a>
											</li>
										</ul>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="title_statistic_uz" role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Statistika</label>
													<input type="text" class="form-control" value="{{$statistic->title_statistic_uz}}" name="title_statistic_uz">
												</div>
											</div>
											<div class="tab-pane fade" id="title_statistic_ru"  role="tabpanel" aria-labelledby="pills-profile-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Statistika</label>
													<input type="text" class="form-control" value="{{$statistic->title_statistic_ru}}" name="title_statistic_ru">
												</div>
											</div>
											<div class="tab-pane fade" id="text_statistic_uz" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Statistika</label>
													<input type="text" class="form-control" value="{{$statistic->text_statistic_uz}}" maxlength="300" name="text_statistic_uz">
												</div>
											</div>
											<div class="tab-pane fade" id="text_statistic_ru" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Statistika</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->text_statistic_ru}}" name="text_statistic_ru">
												</div>
											</div>
											<div class="tab-pane fade" id="title_marriages_uz" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Nikoh-uz</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->title_marriages_uz}}" name="title_marriages_uz">
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Soni-uz</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->count_marriages_uz}}" name="count_marriages_uz">
												</div>
											</div>
											<div class="tab-pane fade" id="title_marriages_ru" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Nikoh-ru</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->title_marriages_ru}}" name="title_marriages_ru">
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Soni-ru</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->count_marriages_ru}}" name="count_marriages_ru">
												</div>
											</div>

											<div class="tab-pane fade" id="title_born_uz" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Bola-uz</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->title_born_uz}}" name="title_born_uz">
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Soni-uz</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->count_born_uz}}" name="count_born_uz">
												</div>
											</div>
											<div class="tab-pane fade" id="title_born_ru" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Bola-ru</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->title_born_ru}}" name="title_born_ru">
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">soni-ru</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->count_born_ru}}" name="count_born_ru">
												</div>
											</div>
											<div class="tab-pane fade" id="title_happy_uz" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Baxtiyor oila-uz</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->title_happy_uz}}" name="title_happy_uz">
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">Soni-uz</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->count_happy_uz}}"  name="count_happy_uz">
												</div>
											</div>
											<div class="tab-pane fade" id="title_happy_ru" role="tabpanel" aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="exampleInputEmail1">Baxtiyor oila-ru</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->title_happy_ru}}" name="title_happy_ru">
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">soni-ru</label>
													<input type="text" class="form-control" maxlength="300" value="{{$statistic->count_happy_ru}}" name="count_happy_ru">
												</div>
											</div>
											<button type="submit" class="btn btn-primary">Saqlash</button>
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

@endsection
