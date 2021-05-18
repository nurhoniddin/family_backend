@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<h5 class="card-title"><a class="" href="{{ route('category.index') }}"><i class="fa fa-arrow-left"></i></a>
				</h5>

				<div class="col-lg-12">
					<div class="row ">
						<div class="col-md-6">
							<strong style="text-transform: uppercase">Nikohlar soni</strong>
							<hr>
							{{ $statistic->count_marriage_uz }}
							<hr>
							<strong style="text-transform: uppercase">Baxtiyor oila</strong>
							<hr>
							{{ $statistic->count_happy_family_uz }}
						</div>
						<div class="col-md-6">
							<strong style="text-transform: uppercase">Ajrimlar</strong>
							<hr>
							{{ $statistic->count_divorce_uz }}
						</div>
						<br>
						<div class="col-md-6">
							<strong style="text-transform: uppercase">30 yashgacha ayollar ajrim</strong>
							<hr>
							{{ $statistic->count_women_uz }}
						</div>
					</div>
				</div>


			</div>
			<!-- End container-fluid-->

		</div><!--End content-wrapper-->

@endsection
