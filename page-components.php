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
                        <li><a href="#atom-checkbox" class="block hover:text-blue-600 transition-colors">Checkbox</a></li>
                        <li><a href="#atom-radio" class="block hover:text-blue-600 transition-colors">Radio</a></li>
                        <li><a href="#atom-select" class="block hover:text-blue-600 transition-colors">Select</a></li>
                        <li><a href="#atom-toggle" class="block hover:text-blue-600 transition-colors">Toggle</a></li>
                        <li><a href="#atom-divider" class="block hover:text-blue-600 transition-colors">Divider</a></li>
                        <li><a href="#atom-heading" class="block hover:text-blue-600 transition-colors">Heading</a></li>
                        <li><a href="#atom-link" class="block hover:text-blue-600 transition-colors">Link</a></li>
                        <li><a href="#atom-icon" class="block hover:text-blue-600 transition-colors">Icon</a></li>
                        <li><a href="#atom-avatar" class="block hover:text-blue-600 transition-colors">Avatar</a></li>
                        <li><a href="#atom-alert" class="block hover:text-blue-600 transition-colors">Alert</a></li>
                        <li><a href="#atom-spinner" class="block hover:text-blue-600 transition-colors">Spinner</a></li>
                        <li><a href="#atom-progress" class="block hover:text-blue-600 transition-colors">Progress</a></li>
                        <li><a href="#atom-rating" class="block hover:text-blue-600 transition-colors">Rating</a></li>
                        <li><a href="#atom-tooltip" class="block hover:text-blue-600 transition-colors">Tooltip</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Molecules</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#molecule-search-form" class="block hover:text-blue-600 transition-colors">Search Form</a></li>
                        <li><a href="#molecule-breadcrumbs" class="block hover:text-blue-600 transition-colors">Breadcrumbs</a></li>
                        <li><a href="#molecule-card-header" class="block hover:text-blue-600 transition-colors">Card Header</a></li>
                        <li><a href="#molecule-pagination" class="block hover:text-blue-600 transition-colors">Pagination</a></li>
                        <li><a href="#molecule-tabs" class="block hover:text-blue-600 transition-colors">Tabs</a></li>
                        <li><a href="#molecule-stat" class="block hover:text-blue-600 transition-colors">Stat</a></li>
                        <li><a href="#molecule-steps" class="block hover:text-blue-600 transition-colors">Steps</a></li>
                        <li><a href="#molecule-dropdown" class="block hover:text-blue-600 transition-colors">Dropdown</a></li>
                        <li><a href="#molecule-accordion" class="block hover:text-blue-600 transition-colors">Accordion</a></li>
                        <li><a href="#molecule-menu" class="block hover:text-blue-600 transition-colors">Menu</a></li>
                        <li><a href="#molecule-form-group" class="block hover:text-blue-600 transition-colors">Form Group</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4">Organisms</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#organism-navbar" class="block hover:text-blue-600 transition-colors">Navbar</a></li>
                        <li><a href="#organism-footer" class="block hover:text-blue-600 transition-colors">Footer</a></li>
                        <li><a href="#organism-card" class="block hover:text-blue-600 transition-colors">Card</a></li>
                        <li><a href="#organism-cta" class="block hover:text-blue-600 transition-colors">CTA</a></li>
                        <li><a href="#organism-hero-split" class="block hover:text-blue-600 transition-colors">Hero Split</a></li>
                        <li><a href="#organism-modal" class="block hover:text-blue-600 transition-colors">Modal</a></li>
                        <li><a href="#organism-timeline" class="block hover:text-blue-600 transition-colors">Timeline</a></li>
                        <li><a href="#organism-features" class="block hover:text-blue-600 transition-colors">Features</a></li>
                        <li><a href="#organism-testimonials" class="block hover:text-blue-600 transition-colors">Testimonials</a></li>
                        <li><a href="#organism-pricing" class="block hover:text-blue-600 transition-colors">Pricing</a></li>
                        <li><a href="#organism-faq" class="block hover:text-blue-600 transition-colors">FAQ</a></li>
                        <li><a href="#organism-contact-form" class="block hover:text-blue-600 transition-colors">Contact Form</a></li>
                        <li><a href="#organism-gallery" class="block hover:text-blue-600 transition-colors">Gallery</a></li>
                        <li><a href="#organism-team" class="block hover:text-blue-600 transition-colors">Team</a></li>
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

                <!-- Atoms: Checkbox -->
                <section id="atom-checkbox" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Checkbox</h2>
                        <p class="text-gray-500">Checkbox inputs with labels and states.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-sm mx-auto bg-white">
                            <div class="space-y-4">
                                <?php get_template_part('parts/atoms/checkbox', null, ['label' => 'Default checkbox', 'name' => 'demo1']); ?>
                                <?php get_template_part('parts/atoms/checkbox', null, ['label' => 'Checked checkbox', 'checked' => true, 'name' => 'demo2']); ?>
                                <?php get_template_part('parts/atoms/checkbox', null, ['label' => 'Disabled checkbox', 'disabled' => true, 'name' => 'demo3']); ?>
                                <?php get_template_part('parts/atoms/checkbox', null, ['label' => 'Required field', 'required' => true, 'name' => 'demo4']); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Radio -->
                <section id="atom-radio" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Radio</h2>
                        <p class="text-gray-500">Radio button inputs for single selection.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-sm mx-auto bg-white">
                            <div class="space-y-4">
                                <?php get_template_part('parts/atoms/radio', null, ['label' => 'Option 1', 'name' => 'radio-demo', 'value' => '1', 'checked' => true]); ?>
                                <?php get_template_part('parts/atoms/radio', null, ['label' => 'Option 2', 'name' => 'radio-demo', 'value' => '2']); ?>
                                <?php get_template_part('parts/atoms/radio', null, ['label' => 'Option 3 (disabled)', 'name' => 'radio-demo', 'value' => '3', 'disabled' => true]); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Select -->
                <section id="atom-select" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Select</h2>
                        <p class="text-gray-500">Dropdown select inputs.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-sm mx-auto bg-white">
                            <div class="space-y-4">
                                <?php get_template_part('parts/atoms/select', null, [
                                    'label' => 'Country',
                                    'options' => [
                                        ['value' => 'jp', 'label' => 'Japan'],
                                        ['value' => 'us', 'label' => 'United States'],
                                        ['value' => 'uk', 'label' => 'United Kingdom'],
                                    ],
                                ]); ?>
                                <?php get_template_part('parts/atoms/select', null, [
                                    'label' => 'Error State',
                                    'variant' => 'error',
                                    'options' => [
                                        ['value' => '1', 'label' => 'Option 1'],
                                    ],
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Toggle -->
                <section id="atom-toggle" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Toggle</h2>
                        <p class="text-gray-500">Toggle switches for on/off states.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-sm mx-auto bg-white">
                            <div class="space-y-4">
                                <?php get_template_part('parts/atoms/toggle', null, ['label' => 'Enable notifications']); ?>
                                <?php get_template_part('parts/atoms/toggle', null, ['label' => 'Dark mode', 'checked' => true]); ?>
                                <?php get_template_part('parts/atoms/toggle', null, ['label' => 'Disabled toggle', 'disabled' => true]); ?>
                                <?php get_template_part('parts/atoms/toggle', null, ['label' => 'Success variant', 'variant' => 'success', 'checked' => true]); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Divider -->
                <section id="atom-divider" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Divider</h2>
                        <p class="text-gray-500">Visual separators for content sections.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <p class="text-gray-600 mb-4">Content above the divider</p>
                            <?php get_template_part('parts/atoms/divider'); ?>
                            <p class="text-gray-600 mb-4">Content below the divider</p>
                            <?php get_template_part('parts/atoms/divider', null, ['text' => 'OR']); ?>
                            <p class="text-gray-600 mb-4">Divider with text</p>
                            <?php get_template_part('parts/atoms/divider', null, ['variant' => 'dashed']); ?>
                            <p class="text-gray-600">Dashed variant</p>
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

                <!-- Atoms: Icon -->
                <section id="atom-icon" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Icon</h2>
                        <p class="text-gray-500">SVG Icons.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 flex flex-wrap gap-8 items-center justify-center bg-white text-gray-600">
                            <?php get_template_part('parts/atoms/icon', null, ['name' => 'check']); ?>
                            <?php get_template_part('parts/atoms/icon', null, ['name' => 'close']); ?>
                            <?php get_template_part('parts/atoms/icon', null, ['name' => 'menu']); ?>
                            <?php get_template_part('parts/atoms/icon', null, ['name' => 'user']); ?>
                            <?php get_template_part('parts/atoms/icon', null, ['name' => 'search']); ?>
                            <?php get_template_part('parts/atoms/icon', null, ['name' => 'arrow-right']); ?>
                            <div class="text-blue-500">
                                <?php get_template_part('parts/atoms/icon', null, ['name' => 'check', 'size' => 'lg']); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Avatar -->
                <section id="atom-avatar" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Avatar</h2>
                        <p class="text-gray-500">User profile images.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 flex flex-wrap gap-4 items-center justify-center bg-white">
                            <?php get_template_part('parts/atoms/avatar', null, ['size' => 'sm']); ?>
                            <?php get_template_part('parts/atoms/avatar', null, ['size' => 'md']); ?>
                            <?php get_template_part('parts/atoms/avatar', null, ['size' => 'lg']); ?>
                            <?php get_template_part('parts/atoms/avatar', null, ['size' => 'xl']); ?>
                            <?php get_template_part('parts/atoms/avatar', null, ['src' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80', 'size' => 'lg']); ?>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Alert -->
                <section id="atom-alert" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Alert</h2>
                        <p class="text-gray-500">Feedback messages.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-lg mx-auto bg-white space-y-4">
                            <?php get_template_part('parts/atoms/alert', null, ['type' => 'info', 'title' => 'Information', 'message' => 'This is an information message.']); ?>
                            <?php get_template_part('parts/atoms/alert', null, ['type' => 'success', 'title' => 'Success', 'message' => 'Operation completed successfully.']); ?>
                            <?php get_template_part('parts/atoms/alert', null, ['type' => 'warning', 'title' => 'Warning', 'message' => 'Please be careful with this action.']); ?>
                            <?php get_template_part('parts/atoms/alert', null, ['type' => 'error', 'title' => 'Error', 'message' => 'Something went wrong.']); ?>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Spinner -->
                <section id="atom-spinner" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Spinner</h2>
                        <p class="text-gray-500">Loading indicators.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 flex flex-wrap gap-8 items-center justify-center bg-white">
                            <?php get_template_part('parts/atoms/spinner', null, ['size' => 'sm', 'color' => 'gray']); ?>
                            <?php get_template_part('parts/atoms/spinner', null, ['size' => 'md', 'color' => 'blue']); ?>
                            <?php get_template_part('parts/atoms/spinner', null, ['size' => 'lg', 'color' => 'blue']); ?>
                            <div class="p-4 bg-gray-900 rounded">
                                <?php get_template_part('parts/atoms/spinner', null, ['size' => 'md', 'color' => 'white']); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Progress -->
                <section id="atom-progress" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Progress</h2>
                        <p class="text-gray-500">Progress bars for showing completion status.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-md mx-auto bg-white space-y-6">
                            <?php get_template_part('parts/atoms/progress', null, ['value' => 25, 'label' => 'Upload Progress']); ?>
                            <?php get_template_part('parts/atoms/progress', null, ['value' => 60, 'color' => 'green', 'variant' => 'gradient']); ?>
                            <?php get_template_part('parts/atoms/progress', null, ['value' => 85, 'color' => 'purple', 'size' => 'lg']); ?>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Rating -->
                <section id="atom-rating" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Rating</h2>
                        <p class="text-gray-500">Star rating display with partial star support.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white space-y-4">
                            <div class="flex items-center gap-4">
                                <span class="text-sm text-gray-600">5.0:</span>
                                <?php get_template_part('parts/atoms/rating', null, ['value' => 5]); ?>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-sm text-gray-600">3.5:</span>
                                <?php get_template_part('parts/atoms/rating', null, ['value' => 3.5]); ?>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-sm text-gray-600">2.0:</span>
                                <?php get_template_part('parts/atoms/rating', null, ['value' => 2, 'color' => 'red']); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Atoms: Tooltip -->
                <section id="atom-tooltip" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Tooltip</h2>
                        <p class="text-gray-500">Informational popups on hover.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white flex flex-wrap gap-8 items-center justify-center">
                            <?php get_template_part('parts/atoms/tooltip', null, [
                                'text' => 'This is a tooltip',
                                'content' => '<span class="text-blue-600 underline">Hover me (top)</span>',
                                'position' => 'top',
                            ]); ?>
                            <?php get_template_part('parts/atoms/tooltip', null, [
                                'text' => 'Bottom tooltip',
                                'content' => '<span class="text-blue-600 underline">Hover me (bottom)</span>',
                                'position' => 'bottom',
                            ]); ?>
                            <?php get_template_part('parts/atoms/tooltip', null, [
                                'text' => 'Light variant',
                                'content' => '<span class="text-blue-600 underline">Light tooltip</span>',
                                'variant' => 'light',
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Search Form -->
                <section id="molecule-search-form" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Search Form</h2>
                        <p class="text-gray-500">Standard standard search form.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 max-w-md mx-auto bg-white">
                            <?php get_template_part('parts/molecules/search-form'); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Breadcrumbs -->
                <section id="molecule-breadcrumbs" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Breadcrumbs</h2>
                        <p class="text-gray-500">Navigation aids that indicate location within the site hierarchy.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white space-y-4">
                            <?php get_template_part('parts/molecules/breadcrumbs', null, [
                                'items' => [
                                    ['label' => 'Home', 'url' => '#'],
                                    ['label' => 'Category', 'url' => '#'],
                                    ['label' => 'Current Page', 'url' => '#'],
                                ]
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Card Header -->
                <section id="molecule-card-header" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Card Header</h2>
                        <p class="text-gray-500">Header for cards showing title, subtitle, and actions.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/molecules/card-header', null, [
                                'title'       => 'Account Settings',
                                'subtitle'    => 'Manage your account content',
                                'action_text' => 'Edit',
                                'action_url'  => '#',
                                'badge'       => 'Pro',
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Pagination -->
                <section id="molecule-pagination" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Pagination</h2>
                        <p class="text-gray-500">Navigate between pages of content.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <?php get_template_part('parts/molecules/pagination', null, [
                                'current_page' => 3,
                                'total_pages' => 10,
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Tabs -->
                <section id="molecule-tabs" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Tabs</h2>
                        <p class="text-gray-500">Tabbed navigation for content sections.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <?php get_template_part('parts/molecules/tabs', null, [
                                'tabs' => [
                                    ['label' => 'Tab 1', 'content' => '<p class="text-gray-600">Content for Tab 1. This is the first tab panel.</p>'],
                                    ['label' => 'Tab 2', 'content' => '<p class="text-gray-600">Content for Tab 2. This is the second tab panel.</p>'],
                                    ['label' => 'Tab 3', 'content' => '<p class="text-gray-600">Content for Tab 3. This is the third tab panel.</p>'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Stat -->
                <section id="molecule-stat" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Stat</h2>
                        <p class="text-gray-500">Display statistics and metrics.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-gray-50">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <?php get_template_part('parts/molecules/stat', null, [
                                    'title' => 'Total Users',
                                    'value' => '12,345',
                                    'trend' => 'up',
                                    'trend_value' => '+12%',
                                    'description' => 'vs last month',
                                    'variant' => 'bordered',
                                ]); ?>
                                <?php get_template_part('parts/molecules/stat', null, [
                                    'title' => 'Revenue',
                                    'value' => '¥1,234,567',
                                    'trend' => 'up',
                                    'trend_value' => '+8.2%',
                                    'variant' => 'bordered',
                                    'color' => 'green',
                                ]); ?>
                                <?php get_template_part('parts/molecules/stat', null, [
                                    'title' => 'Bounce Rate',
                                    'value' => '24.5%',
                                    'trend' => 'down',
                                    'trend_value' => '-3.1%',
                                    'variant' => 'bordered',
                                    'color' => 'red',
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Steps -->
                <section id="molecule-steps" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Steps</h2>
                        <p class="text-gray-500">Progress indicator for multi-step processes.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <?php get_template_part('parts/molecules/steps', null, [
                                'current' => 1,
                                'steps' => [
                                    ['title' => 'Account', 'description' => 'Create your account'],
                                    ['title' => 'Profile', 'description' => 'Set up your profile'],
                                    ['title' => 'Complete', 'description' => 'Start using the app'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Dropdown -->
                <section id="molecule-dropdown" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Dropdown</h2>
                        <p class="text-gray-500">Menu that appears on button click.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white flex gap-4">
                            <?php get_template_part('parts/molecules/dropdown', null, [
                                'trigger' => 'Options',
                                'items' => [
                                    ['label' => 'Edit', 'url' => '#'],
                                    ['label' => 'Duplicate', 'url' => '#'],
                                    ['divider' => true],
                                    ['label' => 'Delete', 'url' => '#'],
                                ],
                            ]); ?>
                            <?php get_template_part('parts/molecules/dropdown', null, [
                                'trigger' => 'Actions',
                                'variant' => 'primary',
                                'items' => [
                                    ['label' => 'Download', 'url' => '#'],
                                    ['label' => 'Share', 'url' => '#'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Accordion -->
                <section id="molecule-accordion" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Accordion</h2>
                        <p class="text-gray-500">Expandable content panels.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <?php get_template_part('parts/molecules/accordion', null, [
                                'variant' => 'bordered',
                                'items' => [
                                    ['title' => 'アコーディオン項目 1', 'content' => 'これは最初のアコーディオン項目の内容です。必要に応じて展開/折りたたみができます。', 'open' => true],
                                    ['title' => 'アコーディオン項目 2', 'content' => 'これは2番目のアコーディオン項目の内容です。'],
                                    ['title' => 'アコーディオン項目 3', 'content' => 'これは3番目のアコーディオン項目の内容です。'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Menu -->
                <section id="molecule-menu" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Menu</h2>
                        <p class="text-gray-500">Vertical navigation menu.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white max-w-xs">
                            <?php get_template_part('parts/molecules/menu', null, [
                                'items' => [
                                    ['label' => 'ダッシュボード', 'url' => '#', 'active' => true],
                                    ['label' => 'プロジェクト', 'url' => '#', 'badge' => '5'],
                                    ['label' => '設定', 'url' => '#', 'children' => [
                                        ['label' => 'プロフィール', 'url' => '#'],
                                        ['label' => 'セキュリティ', 'url' => '#'],
                                    ]],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Molecules: Form Group -->
                <section id="molecule-form-group" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Form Group</h2>
                        <p class="text-gray-500">Universal form field component.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white max-w-md space-y-4">
                            <?php get_template_part('parts/molecules/form-group', null, [
                                'label' => 'メールアドレス',
                                'name' => 'email',
                                'type' => 'email',
                                'placeholder' => 'example@email.com',
                                'required' => true,
                            ]); ?>
                            <?php get_template_part('parts/molecules/form-group', null, [
                                'label' => 'カテゴリ',
                                'name' => 'category',
                                'type' => 'select',
                                'placeholder' => '選択してください',
                                'options' => [
                                    ['value' => '1', 'label' => 'オプション 1'],
                                    ['value' => '2', 'label' => 'オプション 2'],
                                ],
                            ]); ?>
                            <?php get_template_part('parts/molecules/form-group', null, [
                                'label' => 'エラー状態',
                                'name' => 'error_field',
                                'type' => 'text',
                                'value' => '無効な値',
                                'error' => 'このフィールドは無効です',
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Navbar -->
                <section id="organism-navbar" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Navbar</h2>
                        <p class="text-gray-500">Navigation bar with logo, menu, and CTA.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/navbar', null, [
                                'menu_items' => [
                                    ['label' => 'Home', 'url' => '#'],
                                    ['label' => 'About', 'url' => '#'],
                                    ['label' => 'Services', 'url' => '#', 'children' => [
                                        ['label' => 'Web Design', 'url' => '#'],
                                        ['label' => 'Development', 'url' => '#'],
                                    ]],
                                    ['label' => 'Contact', 'url' => '#'],
                                ],
                                'cta' => ['text' => 'Get Started', 'url' => '#'],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Footer -->
                <section id="organism-footer" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Footer</h2>
                        <p class="text-gray-500">Site footer with links and social icons.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/footer', null, [
                                'description' => 'Building modern WordPress themes with Tailwind CSS.',
                                'columns' => [
                                    ['title' => 'Product', 'links' => [
                                        ['label' => 'Features', 'url' => '#'],
                                        ['label' => 'Pricing', 'url' => '#'],
                                    ]],
                                    ['title' => 'Company', 'links' => [
                                        ['label' => 'About', 'url' => '#'],
                                        ['label' => 'Contact', 'url' => '#'],
                                    ]],
                                ],
                            ]); ?>
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

                <!-- Organisms: Hero Split -->
                <section id="organism-hero-split" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hero Split</h2>
                        <p class="text-gray-500">50/50 split hero section.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/hero-split', null, [
                                'title'       => 'Build faster with components',
                                'description' => 'A complete set of UI components to help you build modern WordPress themes quickly and efficiently.',
                                'image_url'   => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&h=600&fit=crop',
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Hero Simple -->
                <section id="organism-hero-simple" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hero Simple</h2>
                        <p class="text-gray-500">Simple hero section with background and text.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/hero-simple', null, [
                                'title'       => 'Simple Hero Title',
                                'description' => 'This is a simple hero component for less complex page headers.',
                                'button_text' => 'Get Started',
                                'image_url'   => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800&h=600&fit=crop',
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Modal -->
                <section id="organism-modal" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Modal</h2>
                        <p class="text-gray-500">Dialog windows for focused interactions.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <button 
                                type="button" 
                                onclick="openModal('demo-modal')"
                                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors"
                            >
                                Open Modal
                            </button>
                            <?php get_template_part('parts/organisms/modal', null, [
                                'id' => 'demo-modal',
                                'title' => 'Modal Title',
                                'content' => '<p class="text-gray-600">This is the modal content. You can put any HTML here.</p>',
                                'footer' => '<button type="button" onclick="closeModal(\'demo-modal\')" class="px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">Cancel</button><button type="button" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">Confirm</button>',
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Timeline -->
                <section id="organism-timeline" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Timeline</h2>
                        <p class="text-gray-500">Display chronological events or steps.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="p-8 bg-white">
                            <?php get_template_part('parts/organisms/timeline', null, [
                                'items' => [
                                    ['date' => '2024年1月', 'title' => 'プロジェクト開始', 'description' => 'プロジェクトの企画と設計を開始しました。', 'color' => 'blue'],
                                    ['date' => '2024年3月', 'title' => '開発フェーズ', 'description' => 'コーディングとテストを実施しました。', 'color' => 'green'],
                                    ['date' => '2024年6月', 'title' => 'ローンチ', 'description' => 'サービスを正式リリースしました。', 'color' => 'purple'],
                                ],
                            ]); ?>
                        </div>
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

                <!-- Organisms: Testimonials -->
                <section id="organism-testimonials" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Testimonials</h2>
                        <p class="text-gray-500">Social proof grid.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/testimonials', null, [
                                'items' => [
                                    ['content' => 'This kit saved me hours of setup time.', 'author' => 'Sarah Doe', 'role' => 'Freelancer'],
                                    ['content' => 'The component quality is top notch.', 'author' => 'John Smith', 'role' => 'Developer'],
                                    ['content' => 'Highly recommended for any WP project.', 'author' => 'Jane Wilson', 'role' => 'Agency Owner'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Pricing -->
                <section id="organism-pricing" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Pricing</h2>
                        <p class="text-gray-500">Pricing tables.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/pricing', null, [
                                'plans' => [
                                    [
                                        'name' => 'Starter',
                                        'price' => '$29',
                                        'features' => ['Up to 5 Projects', 'Community Support', 'Basic Analytics'],
                                        'button_text' => 'Start Free'
                                    ],
                                    [
                                        'name' => 'Pro',
                                        'price' => '$99',
                                        'period' => 'month',
                                        'description' => 'For growing teams.',
                                        'features' => ['Unlimited Projects', 'Priority Support', 'Advanced Analytics'],
                                        'featured' => true,
                                        'button_text' => 'Get Pro'
                                    ],
                                    [
                                        'name' => 'Enterprise',
                                        'price' => 'Custom',
                                        'features' => ['Dedicated Support', 'SLA', 'Custom Integrations'],
                                        'button_text' => 'Contact Sales'
                                    ],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: FAQ -->
                <section id="organism-faq" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">FAQ</h2>
                        <p class="text-gray-500">Frequently asked questions.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white">
                            <?php get_template_part('parts/organisms/faq', null, [
                                'items' => [
                                    ['question' => 'How do I start?', 'answer' => 'Download the kit and follow the README instructions.'],
                                    ['question' => 'Is it compatible with WooCommerce?', 'answer' => 'Yes, it works with all major plugins.'],
                                    ['question' => 'Can I use custom Tailwind config?', 'answer' => 'Absolutely, just edit tailwind.config.js.'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Contact Form -->
                <section id="organism-contact-form" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Contact Form</h2>
                        <p class="text-gray-500">Complete contact form with validation.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white p-8">
                            <?php get_template_part('parts/organisms/contact-form', null, [
                                'variant' => 'card',
                                'show_company' => true,
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Gallery -->
                <section id="organism-gallery" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Gallery</h2>
                        <p class="text-gray-500">Image gallery with lightbox.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white p-8">
                            <?php get_template_part('parts/organisms/gallery', null, [
                                'columns' => 3,
                                'images' => [
                                    ['url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=400&fit=crop', 'alt' => 'Image 1', 'caption' => 'コーディング風景'],
                                    ['url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=400&fit=crop', 'alt' => 'Image 2', 'caption' => 'デスク周り'],
                                    ['url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=400&fit=crop', 'alt' => 'Image 3', 'caption' => 'ワークスペース'],
                                ],
                            ]); ?>
                        </div>
                    </div>
                </section>

                <!-- Organisms: Team -->
                <section id="organism-team" class="scroll-mt-24">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Team</h2>
                        <p class="text-gray-500">Team member cards with social links.</p>
                    </div>

                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <div class="border-b bg-gray-50 px-4 py-2 text-xs font-mono text-gray-500 text-right">Preview</div>
                        <div class="bg-white p-8">
                            <?php get_template_part('parts/organisms/team', null, [
                                'variant' => 'card',
                                'columns' => 3,
                                'members' => [
                                    ['name' => '山田 太郎', 'role' => 'CEO', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=256&h=256&fit=crop', 'bio' => 'チームをリードするCEO。'],
                                    ['name' => '佐藤 花子', 'role' => 'デザイナー', 'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=256&h=256&fit=crop', 'bio' => 'ユーザー体験を設計。'],
                                    ['name' => '鈴木 一郎', 'role' => 'エンジニア', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=256&h=256&fit=crop', 'bio' => 'フロントエンド開発担当。'],
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
