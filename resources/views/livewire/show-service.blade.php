<main>

<section class="page-header bg-tertiary">
	<div class="container">
		<div class="row">
			<div class="col-8 mx-auto text-center">
				<h2 class="mb-3 text-capitalize">{{$service->name}}</h2>
				<ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
					<li class="list-inline-item"><a wire:navigate href="{{route('home')}}">Home</a>
					</li>
					<li class="list-inline-item">/ &nbsp; <a wire:navigate href="{{route('servicesPage')}}">Services</a>
					</li>
					<li class="list-inline-item">/ &nbsp; {{$service->name}}
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="section-sm">
	<div class="container">
		<div class="row g-5">

			<div class="col-lg-12 text-center">
				<div class="content">

                    <h2 class="mb-3">Release Date: {{ \Carbon\Carbon::parse($service->release_date)->format('Y M d') }}</h2>

                    <img src="{{ asset($service->image_path) }}" alt="" class="image-fluid">
                    <br>
                    <div class="content text-center">

                        {!!$service->description!!}
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
</main>
