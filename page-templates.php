<?php
/**
 * Template Name: Templates Showcase
 *
 * Template showcase page with live previews and source code examples.
 *
 * @package WP_Modern_Starter_Kit
 */

get_header();

// Template sections data
$template_sections = [
    'hero' => [
        'title' => __( 'Hero Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Eye-catching hero sections for landing pages and marketing sites.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'Hero Centered',
                'slug' => 'hero-centered',
                'description' => __( 'Simple centered hero with heading, description, and CTA buttons.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Hero Split',
                'slug' => 'hero-split',
                'description' => __( 'Split layout with content on left and image on right.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Hero Background Image',
                'slug' => 'hero-background',
                'description' => __( 'Full-width hero with background image overlay.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
    'features' => [
        'title' => __( 'Feature Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Showcase your product features with various layouts.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'Features Grid',
                'slug' => 'features-grid',
                'description' => __( '3-column grid with icons and descriptions.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Features Alternating',
                'slug' => 'features-alternating',
                'description' => __( 'Alternating image and text sections.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Features Centered',
                'slug' => 'features-centered',
                'description' => __( 'Centered layout with large icons.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
    'cta' => [
        'title' => __( 'CTA Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Call-to-action sections to drive conversions.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'CTA Simple',
                'slug' => 'cta-simple',
                'description' => __( 'Simple centered CTA with buttons.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'CTA with Background',
                'slug' => 'cta-background',
                'description' => __( 'CTA with gradient or image background.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'CTA with Form',
                'slug' => 'cta-form',
                'description' => __( 'CTA with inline email signup form.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
    'testimonials' => [
        'title' => __( 'Testimonial Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Display customer testimonials and reviews.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'Testimonials Cards',
                'slug' => 'testimonials-cards',
                'description' => __( 'Grid of testimonial cards with avatars.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Testimonial Quote',
                'slug' => 'testimonial-quote',
                'description' => __( 'Large centered quote with attribution.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
    'pricing' => [
        'title' => __( 'Pricing Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Pricing tables and plan comparison.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'Pricing Cards',
                'slug' => 'pricing-cards',
                'description' => __( '3-column pricing cards with features.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Pricing Comparison',
                'slug' => 'pricing-comparison',
                'description' => __( 'Detailed feature comparison table.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
    'faq' => [
        'title' => __( 'FAQ Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Frequently asked questions layouts.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'FAQ Accordion',
                'slug' => 'faq-accordion',
                'description' => __( 'Expandable accordion FAQ.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'FAQ Two Column',
                'slug' => 'faq-two-column',
                'description' => __( 'Two-column Q&A layout.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
    'contact' => [
        'title' => __( 'Contact Sections', 'wp-modern-starter-kit' ),
        'description' => __( 'Contact forms and information sections.', 'wp-modern-starter-kit' ),
        'templates' => [
            [
                'name' => 'Contact Split',
                'slug' => 'contact-split',
                'description' => __( 'Form on left, info on right.', 'wp-modern-starter-kit' ),
            ],
            [
                'name' => 'Contact Centered',
                'slug' => 'contact-centered',
                'description' => __( 'Centered form with info cards.', 'wp-modern-starter-kit' ),
            ],
        ],
    ],
];

// Full page templates
$page_templates = [
    [
        'name' => 'Landing Page',
        'slug' => 'landing-page',
        'description' => __( 'Complete landing page for product or service launch.', 'wp-modern-starter-kit' ),
        'preview_image' => 'landing-preview.png',
    ],
    [
        'name' => 'Corporate Site',
        'slug' => 'corporate',
        'description' => __( 'Professional corporate website template.', 'wp-modern-starter-kit' ),
        'preview_image' => 'corporate-preview.png',
    ],
    [
        'name' => 'SaaS Product',
        'slug' => 'saas',
        'description' => __( 'SaaS product marketing page with features and pricing.', 'wp-modern-starter-kit' ),
        'preview_image' => 'saas-preview.png',
    ],
    [
        'name' => 'Portfolio',
        'slug' => 'portfolio',
        'description' => __( 'Creative portfolio for designers and developers.', 'wp-modern-starter-kit' ),
        'preview_image' => 'portfolio-preview.png',
    ],
];
?>

<main id="primary" class="site-main flex-grow bg-gray-50">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">
                <?php esc_html_e( 'Template Showcase', 'wp-modern-starter-kit' ); ?>
            </h1>
            <p class="text-lg text-gray-600 max-w-3xl">
                <?php esc_html_e( 'Ready-to-use templates for rapid website development. Each template includes live preview and source code.', 'wp-modern-starter-kit' ); ?>
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar Navigation -->
            <aside class="hidden lg:block lg:w-64 flex-shrink-0">
                <nav class="sticky top-24 space-y-1">
                    <h2 class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <?php esc_html_e( 'Sections', 'wp-modern-starter-kit' ); ?>
                    </h2>
                    <?php foreach ( $template_sections as $key => $section ) : ?>
                        <a href="#<?php echo esc_attr( $key ); ?>" 
                           class="block px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <?php echo esc_html( $section['title'] ); ?>
                        </a>
                    <?php endforeach; ?>
                    
                    <h2 class="px-3 py-2 mt-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <?php esc_html_e( 'Full Pages', 'wp-modern-starter-kit' ); ?>
                    </h2>
                    <a href="#page-templates" 
                       class="block px-3 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-100 rounded-lg transition-colors">
                        <?php esc_html_e( 'Page Templates', 'wp-modern-starter-kit' ); ?>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 min-w-0 space-y-16">
                
                <?php foreach ( $template_sections as $key => $section ) : ?>
                    <section id="<?php echo esc_attr( $key ); ?>">
                        <div class="border-b border-gray-200 pb-4 mb-8">
                            <h2 class="text-2xl font-bold text-gray-900">
                                <?php echo esc_html( $section['title'] ); ?>
                            </h2>
                            <p class="mt-2 text-gray-600">
                                <?php echo esc_html( $section['description'] ); ?>
                            </p>
                        </div>

                        <div class="space-y-12">
                            <?php foreach ( $section['templates'] as $template ) : ?>
                                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" id="template-<?php echo esc_attr( $template['slug'] ); ?>">
                                    <!-- Template Header -->
                                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gray-50">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                <?php echo esc_html( $template['name'] ); ?>
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                <?php echo esc_html( $template['description'] ); ?>
                                            </p>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <button type="button" 
                                                    class="tab-btn active px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                                                    data-target="preview-<?php echo esc_attr( $template['slug'] ); ?>"
                                                    onclick="showTab(this, 'preview-<?php echo esc_attr( $template['slug'] ); ?>')">
                                                <?php esc_html_e( 'Preview', 'wp-modern-starter-kit' ); ?>
                                            </button>
                                            <button type="button" 
                                                    class="tab-btn px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                                                    data-target="code-<?php echo esc_attr( $template['slug'] ); ?>"
                                                    onclick="showTab(this, 'code-<?php echo esc_attr( $template['slug'] ); ?>')">
                                                <?php esc_html_e( 'Code', 'wp-modern-starter-kit' ); ?>
                                            </button>
                                            <button type="button"
                                                    class="px-3 py-1.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors"
                                                    onclick="copyCode('<?php echo esc_attr( $template['slug'] ); ?>')">
                                                <?php esc_html_e( 'Copy', 'wp-modern-starter-kit' ); ?>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Preview Panel -->
                                    <div id="preview-<?php echo esc_attr( $template['slug'] ); ?>" class="template-panel">
                                        <div class="bg-gray-100 p-4">
                                            <?php 
                                            // Isolate scope to prevent variable leakage between templates
                                            (function() use ($template) {
                                                $template_file = get_template_directory() . '/parts/templates/' . $template['slug'] . '.php';
                                                if ( file_exists( $template_file ) ) {
                                                    // Reset $args to ensure fresh start for each template
                                                    $args = []; 
                                                    include $template_file;
                                                } else {
                                                    ?>
                                                    <div class="bg-white rounded-lg p-12 text-center text-gray-500">
                                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        <p><?php esc_html_e( 'Preview coming soon', 'wp-modern-starter-kit' ); ?></p>
                                                    </div>
                                                    <?php
                                                }
                                            })();
                                            ?>
                                        </div>
                                    </div>

                                    <!-- Code Panel -->
                                    <div id="code-<?php echo esc_attr( $template['slug'] ); ?>" class="template-panel hidden">
                                        <div class="relative">
                                            <pre class="language-php overflow-x-auto text-sm"><code id="code-content-<?php echo esc_attr( $template['slug'] ); ?>"><?php
                                            $template_file = get_template_directory() . '/parts/templates/' . $template['slug'] . '.php';
                                            if ( file_exists( $template_file ) ) {
                                                echo esc_html( file_get_contents( $template_file ) );
                                            } else {
                                                echo esc_html( "<?php\n// Template: " . $template['name'] . "\n// Coming soon...\n?>" );
                                            }
                                            ?></code></pre>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <!-- Page Templates Section -->
                <section id="page-templates">
                    <div class="border-b border-gray-200 pb-4 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900">
                            <?php esc_html_e( 'Page Templates', 'wp-modern-starter-kit' ); ?>
                        </h2>
                        <p class="mt-2 text-gray-600">
                            <?php esc_html_e( 'Complete page templates combining multiple sections for common use cases.', 'wp-modern-starter-kit' ); ?>
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ( $page_templates as $pt ) : ?>
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                                <div class="aspect-video bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="w-16 h-16 mx-auto text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-blue-600"><?php esc_html_e( 'Template Preview', 'wp-modern-starter-kit' ); ?></p>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        <?php echo esc_html( $pt['name'] ); ?>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-4">
                                        <?php echo esc_html( $pt['description'] ); ?>
                                    </p>
                                    <div class="flex gap-2">
                                        <a href="?template=<?php echo esc_attr( $pt['slug'] ); ?>" 
                                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                            <?php esc_html_e( 'View Demo', 'wp-modern-starter-kit' ); ?>
                                        </a>
                                        <button type="button" 
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                            <?php esc_html_e( 'Get Code', 'wp-modern-starter-kit' ); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

            </div>
        </div>
    </div>
</main>

<!-- Prism.js for syntax highlighting -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>

<script>
function showTab(button, targetId) {
    const container = button.closest('.bg-white');
    
    // Update buttons
    container.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-blue-50', 'text-blue-600', 'border-blue-600');
    });
    button.classList.add('active', 'bg-blue-50', 'text-blue-600', 'border-blue-600');
    
    // Update panels
    container.querySelectorAll('.template-panel').forEach(panel => {
        panel.classList.add('hidden');
    });
    document.getElementById(targetId).classList.remove('hidden');
    
    // Re-highlight if showing code
    if (targetId.startsWith('code-')) {
        Prism.highlightAll();
    }
}

function copyCode(slug) {
    const codeElement = document.getElementById('code-content-' + slug);
    const code = codeElement.textContent;
    
    navigator.clipboard.writeText(code).then(() => {
        // Show toast notification
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 animate-fade-in';
        toast.textContent = '<?php echo esc_js( __( 'Code copied to clipboard!', 'wp-modern-starter-kit' ) ); ?>';
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.remove();
        }, 2000);
    });
}

// Initialize Prism.js on load
document.addEventListener('DOMContentLoaded', function() {
    Prism.highlightAll();
});
</script>

<style>
.tab-btn.active {
    background-color: rgb(239 246 255);
    color: rgb(37 99 235);
    border-color: rgb(37 99 235);
}

@keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}

pre[class*="language-"] {
    margin: 0;
    border-radius: 0;
    max-height: 500px;
}
</style>

<?php get_footer(); ?>
