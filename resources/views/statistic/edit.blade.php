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
											<li class="nav-item" role="presentation">
												<a class="nav-link active" id="pills-home-tab"
												   data-toggle="pill" href="#pills-home" role="tab"
												   aria-controls="pills-home" aria-selected="true">Nikoh UZ</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#pills-profile" role="tab"
												   aria-controls="pills-profile" aria-selected="false">Nikoh RU</a>
											</li>

											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#family" role="tab"
												   aria-controls="pills-profile" aria-selected="false">Baxtiyor oila uz</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#family-ru" role="tab"
												   aria-controls="pills-profile" aria-selected="false">Baxtiyor oila RU</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#divorces-uz" role="tab"
												   aria-controls="pills-profile" aria-selected="false">Ajrimlar uz</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#divorces-ru" role="tab"
												   aria-controls="pills-profile" aria-selected="false">Ajrimlar ru</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#divorces-women-uz" role="tab"
												   aria-controls="pills-profile" aria-selected="false">30-Yoshgacha-bo'lgan-Ayollar-o'rtasidagi-ajrimlar-soni-Uz</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link" id="pills-profile-tab"
												   data-toggle="pill" href="#divorces-women-ru" role="tab"
												   aria-controls="pills-profile" aria-selected="false">30-Yoshgacha-bo'lgan-Ayollar-o'rtasidagi-ajrimlar-soni-ru</a>
											</li>
										</ul>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="pills-home"
											     role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="form-group">
													<label for="name_uz">Nikohlar-soni</label>
													<input type="text" value="{{ $statistic->count_marriage_uz }}" class="form-control" id="name_uz" >
												</div>

											</div>
											<div class="tab-pane fade" id="pills-profile" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="name_ru">Nikohlar-soni</label>
													<input type="text" value="{{ $statistic->count_marriage_ru }}"  class="form-control" id="name_ru" >
												</div>

											</div>
											<div class="tab-pane fade" id="family" role="tabpanel"
											     aria-labelledby="pills-contact-tab">

												<div class="form-group">
													<label for="count_happy_family_uz">Baxtiyor-oila-soni</label>
													<input type="text" value="{{ $statistic->count_happy_family_uz }}" class="form-control" id="name_ru" >
												</div>

											</div>
											<div class="tab-pane fade" id="family-ru" role="tabpanel"
											     aria-labelledby="pills-contact-tab">
												<div class="form-group">
													<label for="count_happy_family_ru">Baxtiyor-oila-soni </label>
													<input type="text"  value="{{ $statistic->count_happy_family_ru }}"  class="form-control" id="name_ru" >
												</div>
											</div>

											<div class="tab-pane fade" id="divorces-uz" role="tabpanel"
											     aria-labelledby="pills-contact-tab">

												<div class="form-group">
													<label for="count_divorce_uz">ajrimlar-soni-uz</label>
													<input type="text"  value="{{ $statistic->count_divorce_uz }}" class="form-control" id="name_ru" >
												</div>
											</div>
											<div class="tab-pane fade" id="divorces-ru" role="tabpanel"
											     aria-labelledby="pills-contact-tab">

												<div class="form-group">
													<label for="count_divorce_ru">ajrimlar-soni-ru</label>
													<input type="text" value="{{ $statistic->count_divorce_ru }}" class="form-control" id="name_ru" >
												</div>
											</div>
											<div class="tab-pane fade" id="divorces-women-uz" role="tabpanel"
											     aria-labelledby="pills-contact-tab">

												<div class="form-group">
													<label for="name_ru">30 Yoshgacha bo'lgan Ayollar o'rtasidagi ajrimlar soni-uz</label>
													<input type="text" value="{{ $statistic->count_women_uz }}" name="count_women_uz" class="form-control" id="name_ru" >
												</div>
											</div>
											<div class="tab-pane fade" id="divorces-women-ru" role="tabpanel"
											     aria-labelledby="pills-contact-tab">

												<div class="form-group">
													<label for="count_women_ru">30 Yoshgacha bo'lgan Ayollar o'rtasidagi ajrimlar soni-ru</label>
													<input type="text" value="{{ $statistic->count_women_ru }}" class="form-control" id="name_ru" >
												</div>
											</div>

										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-light px-5"><i class="fa fa-save"></i> Saqlash</button>
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
