  <!-- Slider Section -->
  <section id="slider" class="slider section dark-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper init-swiper">

              <script type="application/json" class="swiper-config">
{
"loop": true,
"speed": 600,
"autoplay": {
"delay": 5000
},
"slidesPerView": "auto",
"centeredSlides": true,
"pagination": {
"el": ".swiper-pagination",
"type": "bullets",
"clickable": true
},
"navigation": {
"nextEl": ".swiper-button-next",
"prevEl": ".swiper-button-prev"
}
}
</script>

              <div class="swiper-wrapper">
                  @if ($worldNews)
                      @foreach ($worldNews->rssItems as $item) 
                          <div class="swiper-slide" style="background-image: url({{ $item->image_url ?? '' }});"  loading="lazy"
                              title="{{ $item->title }}">
                              <div class="content">
                                  <h2><a href="{{ route('news.show', ['news' => $item]) }}"> {{ $item->title }}</a></h2>
                                  <p> {{ $item->description }}.</p>
                              </div>
                          </div>
                      @endforeach
                  @endif
              </div>

              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>

              <div class="swiper-pagination"></div>
          </div>

      </div>

  </section><!-- /Slider Section -->
