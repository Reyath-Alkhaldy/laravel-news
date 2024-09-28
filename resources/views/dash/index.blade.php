{{-- @extends('dash.layouts.layout') --}}
{{-- @section('main') --}}
{{-- @endsection --}}
<x-layout>
    {{-- <x-slot:hello>
        <h1>hello</h1>
    </x-slot:hello> --}}
    @include('dash.layouts.sidebar')
    <!-- Trending Category Section -->
    <section id="trending-category" class="trending-category section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="row g-5">


                            @if ($worldNews->rssItems)
                                @foreach ($worldNews->rssItems as $item)
                                    @if ($loop->index % 3 == 0)
                                        <div class="col-lg-4 border-start custom-border">
                                    @endif
                                    <div class="post-entry">
                                        <a href="blog-details.html"><img src="{{ $item->image_url }}" alt=""
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $worldNews->name }}</span>
                                            <span class="mx-1">•</span>
                                            <span>{{ $item->pub_date }}</span>
                                        </div>
                                        <h2><a href="blog-details.html">{{ $item->content }}</a></h2>
                                    </div>
                                    @if (($loop->index + 1) % 3 == 0 || $loop->last)
                        </div>
                        @endif
                        @endforeach
                        @endif

                        <!-- Trending Section -->
                        <div class="col-lg-4">
                            <div class="trending">
                                <h3>Trending</h3>
                                <ul class="trending-post">
                                    @if ($trendings && $trendings->trendings)
                                        @foreach ($trendings->trendings as $item)
                                            <li>
                                                <a href="blog-details.html">
                                                    <span class="number">1</span>
                                                    <h3>{{ $item->title }}</h3>
                                                    <span class="author">Jane Cooper</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                </ul>
                            </div>

                        </div> <!-- End Trending Section -->
                    </div>
                </div>

            </div> <!-- End .row -->
        </div>

        </div>

    </section><!-- /Trending Category Section -->

    <!-- Culture Category Section -->
    <section id="culture-category" class="culture-category section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-title-container d-flex align-items-center justify-content-between">
                <h2>Culture</h2>
                <p><a href="categories.html">See All Culture</a></p>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-md-9">

                    <div class="d-lg-flex post-entry">
                        <a href="blog-details.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                            <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                                <span>Jul 5th '22</span>
                            </div>
                            <h3><a href="blog-details.html">What is the son of Football Coach John Gruden, Deuce
                                    Gruden doing Now?</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat
                                exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error
                                deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?
                            </p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Wade Warren</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="post-list border-bottom">
                                <a href="blog-details.html"><img src="assets/img/post-landscape-1.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">11 Work From Home Part-Time Jobs
                                        You Can Do Now</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>

                            <div class="post-list">
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">5 Great Startup Tips for Female
                                        Founders</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="post-list">
                                <a href="blog-details.html"><img src="assets/img/post-landscape-2.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay
                                        Focused During Video Calls?</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay Focused
                                During Video Calls?</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="blog-details.html">17 Pictures of Medium Length Hair in Layers
                                That Will Inspire Your New Haircut</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="blog-details.html">9 Half-up/half-down Hairstyles for Long and
                                Medium Hair</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="blog-details.html">Life Insurance And Pregnancy: A Working
                                Mom’s Guide</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="blog-details.html">The Best Homemade Masks for Face (keep the
                                Pimples Away)</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>

                    <div class="post-list border-bottom">
                        <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span>
                            <span>Jul 5th '22</span>
                        </div>
                        <h2 class="mb-2"><a href="blog-details.html">10 Life-Changing Hacks Every Working Mom
                                Should Know</a></h2>
                        <span class="author mb-3 d-block">Jenny Wilson</span>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Culture Category Section -->

    <!-- Business Category Section -->
    <section id="business-category" class="business-category section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-title-container d-flex align-items-center justify-content-between">
                <h2>Business</h2>
                <p><a href="categories.html">See All Business</a></p>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">

                {{-- <div class="col-md-9 order-md-2">

                    <div class="d-lg-flex post-entry">
                        <a href="blog-details.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                            <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
                        </a>
                        <div>
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">•</span>
                                <span>Jul 5th '22</span>
                            </div>
                            <h3><a href="blog-details.html">What is the son of Football Coach John Gruden, Deuce
                                    Gruden doing Now?</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat
                                exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error
                                deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?
                            </p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/person-4.jpg" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Wade Warren</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="post-list border-bottom">
                                <a href="blog-details.html"><img src="assets/img/post-landscape-5.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span
                                        class="mx-1">•</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">11 Work From Home Part-Time Jobs
                                        You Can Do Now</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>

                            <div class="post-list">
                                <div class="post-meta"><span class="date">Business</span> <span
                                        class="mx-1">•</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">5 Great Startup Tips for Female
                                        Founders</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="post-list">
                                <a href="blog-details.html"><img src="assets/img/post-landscape-7.jpg" alt=""
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">Business</span> <span
                                        class="mx-1">•</span>
                                    <span>Jul 5th '22</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay
                                        Focused During Video Calls?</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                                <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row-md-3">
                    @if ($business->rssItems)
                        @foreach ($business->rssItems as $item)
                            <div class="post-list border-bottom">
                                <div class="post-meta"><span class="date">{{ $business->name }}</span> <span
                                        class="mx-1">•</span>
                                    <span> {{ $item->pub_date }}</span>
                                </div>
                                <h2 class="mb-2"><a href="blog-details.html">{{ $item->title }}</a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>

    </section><!-- /Business Category Section -->

    <!-- Lifestyle Category Section -->
    <section id="lifestyle-category" class="lifestyle-category section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <div class="section-title-container d-flex align-items-center justify-content-between">
                <h2>Technology</h2>
                <p><a href="categories.html">See All Technology</a></p>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row g-5">
                        @if ($technology)
                            @foreach ($technology->rssItems as $item)
                                @if ($loop->index % 3 == 0)
                                    <div class="col-lg-4 border-start custom-border">
                                @endif
                                <div class="post-list">
                                    <a href="blog-details.html"><img src="{{ $item->image_url }}" alt=""
                                            class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">{{ $technology->name }}</span> <span
                                            class="mx-1">•</span> <span>{{ $item->pub_date }}</span></div>
                                    <h2><a href="blog-details.html"> {{ $item->content }}</a></h2>
                                </div>
                                @if (($loop->index + 1) % 3 == 0 || $loop->last)
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>

        </div>

        </div>

    </section><!-- /Lifestyle Category Section -->
</x-layout>
