<?php
/**
 * Organism: Carousel
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'id'           => '',
    'slides'       => [], // [ ['image' => '', 'title' => '', 'description' => '', 'url' => ''], ... ]
    'autoplay'     => false,
    'interval'     => 5000,
    'show_arrows'  => true,
    'show_dots'    => true,
    'aspect_ratio' => '16/9', // 16/9, 4/3, 1/1, auto
    'class'        => '',
];
$args = wp_parse_args( $args, $defaults );

$carousel_id = $args['id'] ?: 'carousel-' . wp_unique_id();
$slides_count = count( $args['slides'] );

$aspect_classes = [
    '16/9' => 'aspect-video',
    '4/3'  => 'aspect-[4/3]',
    '1/1'  => 'aspect-square',
    'auto' => '',
];
$aspect_class = $aspect_classes[ $args['aspect_ratio'] ] ?? $aspect_classes['16/9'];
?>

<div 
    id="<?php echo esc_attr( $carousel_id ); ?>"
    class="relative overflow-hidden rounded-xl <?php echo esc_attr( $args['class'] ); ?>"
    data-autoplay="<?php echo $args['autoplay'] ? 'true' : 'false'; ?>"
    data-interval="<?php echo esc_attr( $args['interval'] ); ?>"
>
    <!-- Slides Container -->
    <div class="relative <?php echo esc_attr( $aspect_class ); ?>">
        <div class="flex transition-transform duration-500 ease-out h-full" id="<?php echo esc_attr( $carousel_id ); ?>-track">
            <?php foreach ( $args['slides'] as $index => $slide ) : ?>
                <div class="w-full flex-shrink-0 relative" data-slide="<?php echo esc_attr( $index ); ?>">
                    <?php if ( ! empty( $slide['image'] ) ) : ?>
                        <img 
                            src="<?php echo esc_url( $slide['image'] ); ?>"
                            alt="<?php echo esc_attr( $slide['title'] ?? '' ); ?>"
                            class="w-full h-full object-cover"
                            loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>"
                        >
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $slide['title'] ) || ! empty( $slide['description'] ) ) : ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex items-end">
                            <div class="p-6 md:p-8 text-white">
                                <?php if ( ! empty( $slide['title'] ) ) : ?>
                                    <h3 class="text-xl md:text-2xl font-bold mb-2">
                                        <?php if ( ! empty( $slide['url'] ) ) : ?>
                                            <a href="<?php echo esc_url( $slide['url'] ); ?>" class="hover:underline">
                                                <?php echo esc_html( $slide['title'] ); ?>
                                            </a>
                                        <?php else : ?>
                                            <?php echo esc_html( $slide['title'] ); ?>
                                        <?php endif; ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if ( ! empty( $slide['description'] ) ) : ?>
                                    <p class="text-sm md:text-base text-white/90">
                                        <?php echo esc_html( $slide['description'] ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php if ( $args['show_arrows'] && $slides_count > 1 ) : ?>
        <!-- Previous Button -->
        <button 
            type="button"
            class="absolute left-4 top-1/2 -translate-y-1/2 p-2 bg-white/80 hover:bg-white rounded-full shadow-lg transition-colors z-10"
            onclick="carouselPrev('<?php echo esc_attr( $carousel_id ); ?>')"
            aria-label="前へ"
        >
            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <!-- Next Button -->
        <button 
            type="button"
            class="absolute right-4 top-1/2 -translate-y-1/2 p-2 bg-white/80 hover:bg-white rounded-full shadow-lg transition-colors z-10"
            onclick="carouselNext('<?php echo esc_attr( $carousel_id ); ?>')"
            aria-label="次へ"
        >
            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    <?php endif; ?>
    
    <?php if ( $args['show_dots'] && $slides_count > 1 ) : ?>
        <!-- Dots -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10">
            <?php for ( $i = 0; $i < $slides_count; $i++ ) : ?>
                <button 
                    type="button"
                    class="w-2.5 h-2.5 rounded-full transition-colors <?php echo $i === 0 ? 'bg-white' : 'bg-white/50'; ?>"
                    onclick="carouselGoTo('<?php echo esc_attr( $carousel_id ); ?>', <?php echo esc_attr( $i ); ?>)"
                    aria-label="スライド <?php echo esc_attr( $i + 1 ); ?>"
                    data-dot="<?php echo esc_attr( $i ); ?>"
                ></button>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

<script>
(function() {
    const carouselId = '<?php echo esc_js( $carousel_id ); ?>';
    const carousel = document.getElementById(carouselId);
    const track = document.getElementById(carouselId + '-track');
    const slidesCount = <?php echo esc_js( $slides_count ); ?>;
    let currentIndex = 0;
    
    window['carousel_' + carouselId] = { currentIndex: 0, slidesCount: slidesCount };
    
    // Auto-play
    if (carousel.dataset.autoplay === 'true') {
        const interval = parseInt(carousel.dataset.interval) || 5000;
        setInterval(() => carouselNext(carouselId), interval);
    }
})();

function carouselGoTo(id, index) {
    const carousel = document.getElementById(id);
    const track = document.getElementById(id + '-track');
    const data = window['carousel_' + id];
    
    if (!data) return;
    
    data.currentIndex = index;
    track.style.transform = `translateX(-${index * 100}%)`;
    
    // Update dots
    carousel.querySelectorAll('[data-dot]').forEach((dot, i) => {
        dot.classList.toggle('bg-white', i === index);
        dot.classList.toggle('bg-white/50', i !== index);
    });
}

function carouselNext(id) {
    const data = window['carousel_' + id];
    if (!data) return;
    const nextIndex = (data.currentIndex + 1) % data.slidesCount;
    carouselGoTo(id, nextIndex);
}

function carouselPrev(id) {
    const data = window['carousel_' + id];
    if (!data) return;
    const prevIndex = (data.currentIndex - 1 + data.slidesCount) % data.slidesCount;
    carouselGoTo(id, prevIndex);
}
</script>
