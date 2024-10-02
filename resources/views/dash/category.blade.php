<x-layout>

    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{ $categoryName ?? 'Categories' }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('news.index') }}">Home</a></li>
                    <li class="current">{{ $categoryName ?? 'Categories' }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-12">

                <!-- Blog Posts Section -->
                <section id="blog-posts" class="blog-posts section">

                    <div class="container">
                        <div class="row gy-4">

                            @foreach ($rssItems as $item)
                                <div class="col-lg-4">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ $item->image_url ?? '' }}" class="img-fluid" alt="">
                                            <span class="post-date">{{ $item->pub_date }}</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title"> {{ $item->title }}</h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span
                                                        class="ps-2">{{ $item->author }}</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                                </div>
                                            </div>

                                            <p>
                                                {{ $item->description }}
                                            </p>

                                            <hr>

                                            <a href="{{ route('news.show', $item->id) }}"
                                                class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @endforeach
                        </div>
                    </div>

                </section><!-- /Blog Posts Section -->

                <!-- Blog Pagination Section -->
                <section id="blog-pagination" class="blog-pagination section">

                    {{ $rssItems->links() }}
                </section><!-- /Blog Pagination Section -->

            </div>

            {{-- <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    <!-- Blog Author Widget 2 -->
                    <div class="blog-author-widget-2 widget-item">

                        <div class="d-flex flex-column align-items-center">
                            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0"
                                alt="">
                            <h4> {{$item->author}}</h4>
                            <div class="social-links">
                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
                            </div>

                            <p>
                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium.
                                Quas
                                repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut
                                unde
                                voluptas.
                            </p>

                        </div>
                    </div><!--/Blog Author Widget 2 -->

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div><!--/Search Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Recent Posts</h3>

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                    </div><!--/Recent Posts Widget -->

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            <li><a href="#">App</a></li>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Mac</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Office</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Studio</a></li>
                            <li><a href="#">Smart</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>

                    </div><!--/Tags Widget -->

                </div>

            </div> --}}

        </div>
    </div>


</x-layout>
