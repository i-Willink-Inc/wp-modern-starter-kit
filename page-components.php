<?php
/**
 * Template Name: Components Test Page
 *
 * @package WP_Modern_Starter_Kit
 */

get_header();
?>

<main class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8">Component Library Test</h1>

    <!-- Atoms: Button -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Atoms: Button</h2>
        <div class="flex flex-wrap gap-4 mb-4">
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Primary', 'variant' => 'primary']); ?>
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Secondary', 'variant' => 'secondary']); ?>
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Outline', 'variant' => 'outline']); ?>
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Ghost', 'variant' => 'ghost']); ?>
        </div>
        <div class="flex flex-wrap items-center gap-4">
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Small', 'size' => 'sm']); ?>
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Medium(Default)', 'size' => 'md']); ?>
            <?php get_template_part('parts/atoms/button', null, ['text' => 'Large', 'size' => 'lg']); ?>
        </div>
    </section>

    <!-- Atoms: Badge -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Atoms: Badge</h2>
        <div class="flex flex-wrap gap-4 mb-4">
            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Gray', 'color' => 'gray']); ?>
            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Red', 'color' => 'red']); ?>
            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Green', 'color' => 'green']); ?>
            <?php get_template_part('parts/atoms/badge', null, ['text' => 'Blue', 'color' => 'blue']); ?>
        </div>
        <div class="flex items-center gap-4">
             <?php get_template_part('parts/atoms/badge', null, ['text' => 'Small/Round', 'size' => 'sm', 'rounded' => 'full']); ?>
             <?php get_template_part('parts/atoms/badge', null, ['text' => 'Medium/Square', 'size' => 'md', 'rounded' => 'md']); ?>
        </div>
    </section>

    <!-- Atoms: Input -->
    <section class="mb-12">
        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Atoms: Input</h2>
        <div class="space-y-4 max-w-md">
            <?php get_template_part('parts/atoms/input', null, ['label' => 'Standard Input', 'placeholder' => 'Enter text...']); ?>
            <?php get_template_part('parts/atoms/input', null, ['label' => 'Required Input', 'required' => true, 'placeholder' => 'Required...']); ?>
            <?php get_template_part('parts/atoms/input', null, ['label' => 'Error State', 'error' => 'This field is invalid', 'value' => 'Invalid value']); ?>
        </div>
    </section>

</main>

<?php
get_footer();
