<main>
    <section class="page-header bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">Our Team</h2>
                    <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                        <li class="list-inline-item"><a wire:navigate href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="list-inline-item">/ &nbsp; Our Team
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>


    <section class="section teams">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Questions You Have</p>
                        <h1>People Behind Us</h1>
                        <p class="mb-0">All the publishers and developers</p>
                    </div>
                </div>
            </div>
            <div class="row position-relative">

                    @if($members->isNotEmpty())
                        @foreach ($members as $member)
                        <div class="col-xl-3 col-lg-4 col-md-6 mt-4">
                            <x-team-carding :member="$member" />
                        </div>
                        @endforeach
                    @endif




            </div>
        </div>
    </section>
</main>
