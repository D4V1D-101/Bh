<main>

<section class="page-header bg-tertiary">
	<div class="container">
		<div class="row">
			<div class="col-8 mx-auto text-center">
				<h2 class="mb-3 text-capitalize">{{ $page->title}}</h2>
				<ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
					<li class="list-inline-item"><a wire:navigate href="{{ route('home') }}">Home</a>
					</li>
					<li class="list-inline-item">/ &nbsp; {{ $page->title}}
					</li>
				</ul>
			</div>
		</div>
	</div>

</section>
<section class="section">
	<div class="container">
        @if ($page->image!="")
		<div class="row justify-content-center align-items-center bg-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
                    {!! $page->content !!}


				</div>
			</div>
			<div class="col-lg-4 mt-5 mt-lg-0  bg-center">
            <img loading="lazy" decoding="async" src="{{$page->image}}" alt="">
			</div>
		</div>
        @else
        <div class="row justify-content-center align-items-center text-center">
			<div class="col-lg-12">
				<div class="section-title">
                    {!! $page->content !!}
				</div>
			</div>
        </div>
        @endif
	</div>
</section>
</main>
