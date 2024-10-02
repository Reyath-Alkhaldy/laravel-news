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


                            @if ($worldNews)
                                @foreach ($worldNews->rssItems as $item)
                                    @if ($loop->index % 3 == 0)
                                        <div class="col-lg-4 border-start custom-border">
                                    @endif
                                    <div class="post-entry">
                                        <a href="{{ route('news.show', $item->id) }}"><img src="{{ $item->image_url }}"
                                                alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{ $worldNews->name }}</span>
                                            <span class="mx-1">•</span>
                                            <span>{{ $item->pub_date }}</span>
                                        </div>
                                        <h2><a href="{{ route('news.show', $item->id) }}">{{ $item->description }}</a></h2>
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
                                    @if ($trendings)
                                        @foreach ($trendings->categories as $category)
                                            <li>
                                                <a href="{{ route('news.show', $category->rssItems[0]) }}">
                                                    <span class="number">1</span>
                                                    <h3>{{ $item->title }}</h3>
                                                    <span class="author">{{$category->rssItems[0]->author}}</span>
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
                <h2>Sport</h2>
                <p><a href="categories.html">See All Sport</a></p>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row g-5">
                        @if ($sports)
                            @foreach ($sports->rssItems as $item)
                                @if ($loop->index % 3 == 0)
                                    <div class="col-lg-4 border-start custom-border">
                                @endif
                                <div class="post-list">
                                    <a href="{{ route('news.show', $item->id) }}l"><img src="{{ $item->image_url }}" alt=""
                                            class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">{{ $sports->name }}</span> <span
                                            class="mx-1">•</span> <span>{{ $item->pub_date }}</span></div>
                                    <h2><a href="{{ route('news.show', $item->id) }}"> {{ $item->description }}</a></h2>
                                </div>
                                @if (($loop->index + 1) % 3 == 0 || $loop->last)
                    </div>
                    @endif
                    @endforeach
                    @endif
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

            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="row g-5">
                        @if ($business)
                            @foreach ($business->rssItems as $item)
                                @if ($loop->index % 3 == 0)
                                    <div class="col-lg-4 border-start custom-border">
                                @endif
                                <div class="post-list">
                                    <a href="{{ route('news.show', $item->id) }}"><img src="{{ $item->image_url }}" alt=""
                                            class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">{{ $business->name }}</span> <span
                                            class="mx-1">•</span> <span>{{ $item->pub_date }}</span></div>
                                    <h2><a href="{{ route('news.show', $item->id) }}"> {{ $item->description }}</a></h2>
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
                                    <a href="{{ route('news.show', $item->id) }}"><img src="{{ $item->image_url }}" alt=""
                                            class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">{{ $technology->name }}</span> <span
                                            class="mx-1">•</span> <span>{{ $item->pub_date }}</span></div>
                                    <h2><a href="{{ route('news.show', $item->id) }}"> {{ $item->description }}</a></h2>
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
