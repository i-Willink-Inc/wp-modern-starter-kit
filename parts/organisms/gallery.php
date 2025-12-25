<?php
/**
 * Organism: Gallery
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'       => '',
    'description' => '',
    'images'      => [], // [ ['url' => '', 'alt' => '', 'caption' => ''], ... ]
    'columns'     => 3,  // 2, 3, 4
    'gap'         => 'md', // sm, md, lg
    'lightbox'    => true,
    'variant'     => 'grid', // grid, masonry
    'class'       => '',
];
$args = wp_parse_args( $args, $defaults );

$gallery_id = 'gallery-' . wp_unique_id();

$columns_classes = [
    2 => 'grid-cols-1 sm:grid-cols-2',
    3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
];

$gap_classes = [
    'sm' => 'gap-2',
    'md' => 'gap-4',
    'lg' => 'gap-6',
];

$grid_classes = implode( ' ', [
    'grid',
    $columns_classes[ $args['columns'] ] ?? $columns_classes[3],
    $gap_classes[ $args['gap'] ] ?? $gap_classes['md'],
] );
?>

<div class="<?php echo esc_attr( $args['class'] ); ?>" id="<?php echo esc_attr( $gallery_id ); ?>">
    <?php if ( $args['title'] || $args['description'] ) : ?>
        <div class="text-center mb-8">
            <?php if ( $args['title'] ) : ?>
                <h2 class="text-3xl font-bold text-gray-900 mb-4"><?php echo esc_html( $args['title'] ); ?></h2>
            <?php endif; ?>
            <?php if ( $args['description'] ) : ?>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo esc_html( $args['description'] ); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr( $grid_classes ); ?>">
        <?php foreach ( $args['images'] as $index => $image ) : ?>
            <div class="group relative overflow-hidden rounded-xl bg-gray-100 aspect-square">
                <img 
                    src="<?php echo esc_url( $image['url'] ?? '' ); ?>"
                    alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>"
                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                    loading="lazy"
                >
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center">
                    <?php if ( $args['lightbox'] ) : ?>
                        <button 
                            type="button"
                            class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-3 bg-white/90 rounded-full text-gray-900 hover:bg-white"
                            onclick="openLightbox('<?php echo esc_attr( $gallery_id ); ?>', <?php echo esc_attr( $index ); ?>)"
                            aria-label="画像を拡大"
                        >
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </button>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $image['caption'] ) ) : ?>
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm"><?php echo esc_html( $image['caption'] ); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php if ( $args['lightbox'] && ! empty( $args['images'] ) ) : ?>
<!-- Lightbox -->
<div 
    id="<?php echo esc_attr( $gallery_id ); ?>-lightbox" 
    class="fixed inset-0 z-50 hidden bg-black/90 flex items-center justify-center"
    onclick="closeLightbox('<?php echo esc_attr( $gallery_id ); ?>')"
>
    <button 
        type="button"
        class="absolute top-4 right-4 p-2 text-white/80 hover:text-white transition-colors"
        onclick="closeLightbox('<?php echo esc_attr( $gallery_id ); ?>')"
        aria-label="閉じる"
    >
        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    
    <button 
        type="button"
        class="absolute left-4 top-1/2 -translate-y-1/2 p-2 text-white/80 hover:text-white transition-colors"
        onclick="event.stopPropagation(); navigateLightbox('<?php echo esc_attr( $gallery_id ); ?>', -1)"
        aria-label="前の画像"
    >
        <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    
    <button 
        type="button"
        class="absolute right-4 top-1/2 -translate-y-1/2 p-2 text-white/80 hover:text-white transition-colors"
        onclick="event.stopPropagation(); navigateLightbox('<?php echo esc_attr( $gallery_id ); ?>', 1)"
        aria-label="次の画像"
    >
        <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
    
    <img 
        id="<?php echo esc_attr( $gallery_id ); ?>-lightbox-img"
        src="" 
        alt=""
        class="max-h-[90vh] max-w-[90vw] object-contain"
        onclick="event.stopPropagation()"
    >
</div>

<script>
(function() {
    const galleryId = '<?php echo esc_js( $gallery_id ); ?>';
    const images = <?php echo wp_json_encode( array_map( function( $img ) {
        return [ 'url' => $img['url'] ?? '', 'alt' => $img['alt'] ?? '' ];
    }, $args['images'] ) ); ?>;
    let currentIndex = 0;

    window.openLightbox = function(id, index) {
        if (id !== galleryId) return;
        currentIndex = index;
        const lightbox = document.getElementById(id + '-lightbox');
        const img = document.getElementById(id + '-lightbox-img');
        img.src = images[index].url;
        img.alt = images[index].alt;
        lightbox.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeLightbox = function(id) {
        if (id !== galleryId) return;
        const lightbox = document.getElementById(id + '-lightbox');
        lightbox.classList.add('hidden');
        document.body.style.overflow = '';
    };

    window.navigateLightbox = function(id, direction) {
        if (id !== galleryId) return;
        currentIndex = (currentIndex + direction + images.length) % images.length;
        const img = document.getElementById(id + '-lightbox-img');
        img.src = images[currentIndex].url;
        img.alt = images[currentIndex].alt;
    };
})();
</script>
<?php endif; ?>
