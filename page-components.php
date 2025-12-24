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
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Organisms</h3>
                    <!-- Future components -->
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

            </div>
        </main>
    </div>
</div>

<?php
get_footer();
