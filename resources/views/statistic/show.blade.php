@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<h5 class="card-title"><a class="" href="{{ route('statistic.index') }}"><i class="fa fa-arrow-left"></i></a>
				</h5>

				<div class="col-lg-12">
					<div class="row ">
						<div class="col-md-6">
							<strong style="text-transform: uppercase">Nikohlar soni</strong>
							<hr>
							{{ $statistic->count_marriages_uz }}
							<hr>
							<strong style="text-transform: uppercase">Baxtiyor oila</strong>
							<hr>
							{{ $statistic->count_happy_uz }}
						</div>
						<div class="col-md-6">
							<strong style="text-transform: uppercase">Bola dunyoga keldi</strong>
							<hr>
							{{ $statistic->count_born_uz }}
						</div>
						<br>
						<hr>
						<div class="col-md-6">
							<strong style="text-transform: uppercase">Yil</strong>
							<hr>
							{{ $statistic->title_statistic_uz}}
						</div>
					</div>
				</div>


			</div>
			<!-- End container-fluid-->

		</div><!--End content-wrapper-->

@endsection
