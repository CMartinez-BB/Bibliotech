@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
@endpush


<div class="swiper mySwiper py-10">
    <div class="swiper-wrapper">
        @foreach ($categorias as $categoria)
        <div class="mt-6 swiper-slide">
            <a href="{{ route('view.category', ['category' => $categoria->id]) }}"
                class="mb-1 text-xl font-medium text-gray-900 text-center flex flex-col items-center">
                @if (isset($icons[$categoria->id]))
                <div class="w-12 h-12">
                    <img src="{{ $icons[$categoria->id]['src'] }}" alt="{{ $icons[$categoria->id]['alt'] }}">
                </div>
                @endif
                {{ $categoria->categoria }}
            </a>
        </div>
        @endforeach
    </div>
</div>



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".mySwiper", {
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    centeredSlides: false,
                },
                768: {
                    slidesPerView: 3,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 4,
                    centeredSlides: true,
                },
            },
        });
    });
</script>
@endpush