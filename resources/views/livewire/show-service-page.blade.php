<main>
    <section class="page-header bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">Our Games</h2>
                    <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                        <li class="list-inline-item"><a wire:navigate href="{{route('home')}}">Home</a>
                        </li>
                        <li class="list-inline-item">/ &nbsp; <a href="services.html">Games</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">

            @if($services->isNotEmpty())
            @php
            $x=1;
            @endphp

            @foreach ( $services as $service)

                <div class="icon-box-item text-center col-lg-4 col-md-6 mb-4 ">
                   <x-service-page-card :service="$service" />
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
</main>
