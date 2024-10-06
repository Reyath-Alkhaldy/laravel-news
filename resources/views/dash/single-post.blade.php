<x-layout title="{{ $rssItem->title }}">

    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">{{ $rssItem->title }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('news.index') }}">Home</a></li>
                        <li class="current">{{ $rssItem->category->name }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">

                                <div class="post-img">
                                    <img src="{{ $rssItem->image_url }}" alt="{{ $rssItem->title }}" loading="lazy"
                                        class="img-fluid">
                                </div>

                                <h2 class="title">{{ $rssItem->title }}</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-details.html">John Doe</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-details.html"><time
                                                    datetime="{{ $rssItem->pub_date }}">{{ $rssItem->pub_date }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                href="blog-details.html">12 Comments</a></li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    <p>
                                        {!! $rssItem->description !!}
                                    </p>

                                    {{-- <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt=""> --}}

                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a href="#">Business</a></li>
                                    </ul>

                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">Tips</a></li>
                                        <li><a href="#">Marketing</a></li>
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">
                        <!-- Tags Widget -->
                        {{-- <div class="tags-widget widget-item">

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

                        </div><!--/Tags Widget --> --}}

                    </div>

                </div>

            </div>
        </div>

    </main>
</x-layout>
