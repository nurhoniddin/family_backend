@extends('layouts.app')

@section('content')

	<div class="clearfix"></div>
	<div class="content-wrapper">
		<div class="container-fluid">

			<div class="row mt-3">
				<div class="col-lg-12">
					<div class="card">
						@if(Session::has('success'))
							<p class="alert alert-success">{{ Session::get('success') }}</p>
						@endif
						@if(Session::has('error'))
							<p class="alert alert-danger">{{ Session::get('error') }}</p>
						@endif
						<div class="card-body">
							<h5 class="card-title"><a class="font-33" href="{{ route('statistic.create') }}"><i class="fa fa-plus-square"></i></a></h5>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Nikohlar soni</th>
										<th scope="col">Baxtiyor oila</th>
										<th scope="col">Ajrimlar</th>
										<th scope="col">30 yashgacha ayollar ajrim</th>
										<th width="100px" scope="col">Action</th>
									</tr>
									</thead>
									<tbody>
									@foreach($statistic as $sta)
										<tr>
											<th scope="row">{{ $sta->id }}</th>
											<td>{{ $sta->count_marriage_uz }}</td>
											<td>{{ $sta->count_happy_family_uz }}</td>
											<td>{{ $sta->count_divorce_uz }}</td>
											<td>{{ $sta->count_women_uz }}</td>
											<td>
												<form action="{{ route('statistic.destroy',$sta->id) }}" method="post">
													@csrf
													@method('DELETE')
													<a href="{{ route('statistic.edit',$sta->id) }}"><i class="fa fa-edit"></i></a>
													<a href="{{ route('statistic.show',$sta->id)  }}"><i class="fa fa-eye"></i></a>
													<button  type="submit" class="bg-transparent"><i class="fa fa-trash text-white"></i></button>
												</form>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<nav aria-label="Page navigation example">
							{{$statistic->links("pagination::bootstrap-4")}}
						</nav>
					</div>
				</div>
			</div>
			<!-- End container-fluid-->

		</div><!--End content-wrapper-->

@endsection
