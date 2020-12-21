@extends('layouts.admin-app')

@section('content')

<div class="row">
	<div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-night-fade">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Usuarios registrados</div>
					<!-- <div class="widget-subheading">Last year expenses</div> -->
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>{{App\User::get()->count()}}</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-arielle-smile">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Operaciones realizadas</div>
					<!-- <div class="widget-subheading">Total Clients Profit</div> -->
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>{{App\Operation::get()->count()}}</span></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xl-4">
		<div class="card mb-3 widget-content bg-happy-green">
			<div class="widget-content-wrapper text-white">
				<div class="widget-content-left">
					<div class="widget-heading">Operaciones en cola</div>
					<!-- <div class="widget-subheading">People Interested</div> -->
				</div>
				<div class="widget-content-right">
					<div class="widget-numbers text-white"><span>{{App\Operation::whereStatus(App\Operation::INPROCESS)->get()->count()}}</span></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6 col-lg-3">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-primary border-primary card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Comisiones</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-success pr-2">
									<i class="fa fa-angle-up"></i>
								</span>
								{{App\Operation::whereStatus(App\Operation::COMPLETED)->get()->sum('comission')}}
								<small class="opacity-5 pl-1">S/</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection