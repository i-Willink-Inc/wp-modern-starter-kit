<?php
/**
 * Template Name: Components Test Page
 *
 * @package WP_Modern_Starter_Kit
 */

get_header();
?>

<div class="container mx-auto px-4 py-8 lg:py-12">
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Sidebar Navigation -->
        <aside class="w-full lg:w-64 flex-shrink-0">
            <nav class="sticky top-24 space-y-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Atoms</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#atom-button" class="block hover:text-blue-600 transition-colors">Button</a></li>
                        <li><a href="#atom-badge" class="block hover:text-blue-600 transition-colors">Badge</a></li>
                        <li><a href="#atom-input" class="block hover:text-blue-600 transition-colors">Input</a></li>
                        <li><a href="#atom-textarea" class="block hover:text-blue-600 transition-colors">Textarea</a></li>
                        <li><a href="#atom-heading" class="block hover:text-blue-600 transition-colors">Heading</a></li>
                        <li><a href="#atom-link" class="block hover:text-blue-600 transition-colors">Link</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Organisms</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#organism-card" class="block hover:text-blue-600 transition-colors">Card</a></li>
                        <li><a href="#organism-cta" class="block hover:text-blue-600 transition-colors">CTA</a></li>
                        <li><a href="#organism-features" class="block hover:text-blue-600 transition-colors">Features</a></li>
                    </ul>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow min-w-0">
            <div class="prose max-w-none border-b pb-8 mb-8">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900">Component Library</h1>
                <p class="text-xl text-gray-500">
                    A collection of pre-built UI components ready for use in your WordPress theme.
                </p>
            </div>

            <div class="space-y-16">
                <!-- Atoms: Button -->
                <section id="atom-button" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Button</h2>
                        <p class="text-gray-500">Standard button component with various styles and sizes.</p>
                    </div>
                    
                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 flex flex-wrap gap-4 items-center justify-center bg-white">
                            <?php get_template_part('parts/atoms/button', null, ['text' => 'Primary', 'variant' => 'primary']); ?>
                            <?php get_template_part('parts/atoms/button', null, ['text' => 'Secondary', 'variant' => 'secondary']); ?>
                            <?php get_template_part('parts/atoms/button', null, ['text' => 'Outline', 'variant' => 'outline']); ?>
                            <?php get_template_part('parts/atoms/button', null, ['text' => 'Ghost', 'variant' => 'ghost']); ?>
                        </div>
                    </div>
                    <div class="mt-4 bg-gray-900 rounded-lg overflow-hidden">
                        <div class="px-4 py-2 bg-gray-800 text-gray-400 text-xs font-mono">Usage</div>
                        <pre class="p-4 text-sm text-gray-50 overflow-x-auto"><code>&lt;?php
get_template_part('parts/atoms/button', null, [
    'text'    => 'Button Text',
    'variant' => 'primary', // primary | secondary | outline | ghost
    'size'    => 'md',      // sm | md | lg
    'url'     => '#'
]);
?&gt;</code></pre>
                    </div>
                </section>

                <!-- Atoms: Badge -->
                <section id="atom-badge" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Badge</h2>
                        <p class="text-gray-500">Status indicators and labels.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 flex flex-wrap gap-4 items-center justify-center bg-white">
                            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Gray', 'color' => 'gray']); ?>
                            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Red', 'color' => 'red']); ?>
                            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Green', 'color' => 'green']); ?>
                            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Blue', 'color' => 'blue']); ?>
                            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Rounded', 'color' => 'indigo', 'rounded' => 'md']); ?>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Input -->
                <section id="atom-input" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Input</h2>
                        <p class="text-gray-500">Form input fields with label and error support.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-sm mx-auto bg-white">
                            <div class="space-y-4">
                                <?php get_template_part('parts/atoms/input', null, ['label' => 'Standard Input', 'placeholder' => 'Enter text...']); ?>
                                <?php get_template_part('parts/atoms/input', null, ['label' => 'Required Input', 'required' => true]); ?>
                                <?php get_template_part('parts/atoms/input', null, ['label' => 'Error State', 'error' => 'This field is invalid', 'value' => 'Invalid value']); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Textarea -->
                <section id="atom-textarea" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Textarea</h2>
                        <p class="text-gray-500">Multi-line text input for longer content.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-sm mx-auto bg-white">
                            <div class="space-y-4">
                                <?php get_template_part('parts/atoms/textarea', null, ['label' => 'Message', 'placeholder' => 'Enter your message...']); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Heading -->
                <section id="atom-heading" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Heading</h2>
                        <p class="text-gray-500">Semantic headings with configurable size and level.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white space-y-4">
                            <?php get_template_part('parts/atoms/heading', null, ['text' => 'Heading 2XL', 'level' => 1, 'size' => '2xl']); ?>
                            <?php get_template_part('parts/atoms/heading', null, ['text' => 'Heading XL', 'level' => 2, 'size' => 'xl']); ?>
                            <?php get_template_part('parts/atoms/heading', null, ['text' => 'Heading LG', 'level' => 3, 'size' => 'lg']); ?>
                            <?php get_template_part('parts/atoms/heading', null, ['text' => 'Heading Default', 'level' => 4, 'size' => 'default']); ?>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Link -->
                <section id="atom-link" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Link</h2>
                        <p class="text-gray-500">Text links with different styles.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 flex flex-wrap gap-6 items-center justify-center bg-white">
                            <?php get_template_part('parts/atoms/link', null, ['text' => 'Default Link', 'variant' => 'default']); ?>
                            <?php get_template_part('parts/atoms/link', null, ['text' => 'Muted Link', 'variant' => 'muted']); ?>
                            <?php get_template_part('parts/atoms/link', null, ['text' => 'Underline Link', 'variant' => 'underline']); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Card -->
                <section id="organism-card" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Card</h2>
                        <p class="text-gray-500">Flexible content card. Uses Badge atom internally.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-gray-100">
                            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                <?php get_template_part('parts/organisms/card', null, [
                                    'title'       => 'Card Title',
                                    'description' => 'This is a description for the card component.',
                                    'image_url'   => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop',
                                    'badge'       => 'New',
                                    'badge_color' => 'blue',
                                ]); ?>
                                <?php get_template_part('parts/organisms/card', null, [
                                    'title'       => 'Another Card',
                                    'description' => 'Cards can be used for blog posts, products, or any content.',
                                    'image_url'   => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=300&fit=crop',
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 bg-gray-900 rounded-lg overflow-hidden">
                        <div class="px-4 py-2 bg-gray-800 text-gray-400 text-xs font-mono">Usage</div>
                        <pre class="p-4 text-sm text-gray-50 overflow-x-auto"><code>&lt;?php
get_template_part('parts/organisms/card', null, [
    'title'       => 'Card Title',
    'description' => 'Description text...',
    'image_url'   => 'https://...',
    'badge'       => 'Featured',  // Optional
    'badge_color' => 'blue',
    'url'         => '/link'
]);
?&gt;</code></pre>
                    </div>
                </section>

                <!-- Organisms: CTA -->
                <section id="organism-cta" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">CTA (Call to Action)</h2>
                        <p class="text-gray-500">Prompts for user action. Uses Button atom internally.</p>
                    </div>

                    <div class="space-y-8">
                        <?php get_template_part('parts/organisms/cta', null, [
                            'title'          => 'Ready to get started?',
                            'description'    => 'Start your project today with our starter kit.',
                            'button_text'    => 'Get Started',
                            'secondary_text' => 'Learn More',
                            'secondary_url'  => '#',
                            'variant'        => 'default',
                        ]); ?>
                        <?php get_template_part('parts/organisms/cta', null, [
                            'title'       => 'Join our newsletter',
                            'description' => 'Get the latest updates delivered to your inbox.',
                            'button_text' => 'Subscribe',
                            'variant'     => 'dark',
                        ]); ?>
                    </div>
                </section>

                <!-- Organisms: Features -->
                <section id="organism-features" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Features</h2>
                        <p class="text-gray-500">Display a grid of feature items.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <?php get_template_part('parts/organisms/features', null, [
                                'title'       => 'Why Choose Us',
                                'description' => 'We provide the best solutions for your needs.',
                                'variant'     => 'centered',
                                'columns'     => 3,
                                'items'       => [
                                    ['title' => 'Fast Setup', 'description' => 'Get started in minutes with our streamlined process.'],
                                    ['title' => 'Reliable', 'description' => 'Built on proven technologies for stability.'],
                                    ['title' => 'Scalable', 'description' => 'Grows with your business needs.'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>
</div>

<?php
get_footer();
