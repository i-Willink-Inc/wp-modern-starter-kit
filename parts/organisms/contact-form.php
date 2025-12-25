<?php
/**
 * Organism: Contact Form
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'title'         => 'お問い合わせ',
    'description'   => 'ご質問やご相談がございましたら、お気軽にお問い合わせください。',
    'action'        => '',
    'method'        => 'POST',
    'submit_text'   => '送信する',
    'show_name'     => true,
    'show_company'  => false,
    'show_phone'    => false,
    'show_subject'  => true,
    'variant'       => 'default', // default, card, split
    'class'         => '',
];
$args = wp_parse_args( $args, $defaults );

$form_id = 'contact-form-' . wp_unique_id();
?>

<?php if ( $args['variant'] === 'split' ) : ?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 <?php echo esc_attr( $args['class'] ); ?>">
    <!-- Info Section -->
    <div class="space-y-6">
        <?php if ( $args['title'] ) : ?>
            <h2 class="text-3xl font-bold text-gray-900"><?php echo esc_html( $args['title'] ); ?></h2>
        <?php endif; ?>
        <?php if ( $args['description'] ) : ?>
            <p class="text-lg text-gray-600"><?php echo esc_html( $args['description'] ); ?></p>
        <?php endif; ?>
        
        <div class="space-y-4 pt-4">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">メール</p>
                    <p class="text-sm text-gray-600">info@example.com</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">電話</p>
                    <p class="text-sm text-gray-600">03-1234-5678</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Form Section -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
<?php elseif ( $args['variant'] === 'card' ) : ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg <?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( $args['title'] ) : ?>
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-2"><?php echo esc_html( $args['title'] ); ?></h2>
    <?php endif; ?>
    <?php if ( $args['description'] ) : ?>
        <p class="text-gray-600 text-center mb-8"><?php echo esc_html( $args['description'] ); ?></p>
    <?php endif; ?>
<?php else : ?>
<div class="max-w-2xl mx-auto <?php echo esc_attr( $args['class'] ); ?>">
    <?php if ( $args['title'] ) : ?>
        <h2 class="text-2xl font-bold text-gray-900 mb-2"><?php echo esc_html( $args['title'] ); ?></h2>
    <?php endif; ?>
    <?php if ( $args['description'] ) : ?>
        <p class="text-gray-600 mb-8"><?php echo esc_html( $args['description'] ); ?></p>
    <?php endif; ?>
<?php endif; ?>

        <form 
            id="<?php echo esc_attr( $form_id ); ?>"
            action="<?php echo esc_url( $args['action'] ); ?>"
            method="<?php echo esc_attr( $args['method'] ); ?>"
            class="space-y-6"
        >
            <?php if ( $args['show_name'] ) : ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php get_template_part( 'parts/molecules/form-group', null, [
                        'label'       => '姓',
                        'name'        => 'last_name',
                        'type'        => 'text',
                        'placeholder' => '山田',
                        'required'    => true,
                    ] ); ?>
                    <?php get_template_part( 'parts/molecules/form-group', null, [
                        'label'       => '名',
                        'name'        => 'first_name',
                        'type'        => 'text',
                        'placeholder' => '太郎',
                        'required'    => true,
                    ] ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $args['show_company'] ) : ?>
                <?php get_template_part( 'parts/molecules/form-group', null, [
                    'label'       => '会社名',
                    'name'        => 'company',
                    'type'        => 'text',
                    'placeholder' => '株式会社サンプル',
                ] ); ?>
            <?php endif; ?>

            <?php get_template_part( 'parts/molecules/form-group', null, [
                'label'       => 'メールアドレス',
                'name'        => 'email',
                'type'        => 'email',
                'placeholder' => 'example@email.com',
                'required'    => true,
            ] ); ?>

            <?php if ( $args['show_phone'] ) : ?>
                <?php get_template_part( 'parts/molecules/form-group', null, [
                    'label'       => '電話番号',
                    'name'        => 'phone',
                    'type'        => 'tel',
                    'placeholder' => '03-1234-5678',
                ] ); ?>
            <?php endif; ?>

            <?php if ( $args['show_subject'] ) : ?>
                <?php get_template_part( 'parts/molecules/form-group', null, [
                    'label'       => '件名',
                    'name'        => 'subject',
                    'type'        => 'text',
                    'placeholder' => 'お問い合わせ内容',
                    'required'    => true,
                ] ); ?>
            <?php endif; ?>

            <?php get_template_part( 'parts/molecules/form-group', null, [
                'label'       => 'メッセージ',
                'name'        => 'message',
                'type'        => 'textarea',
                'placeholder' => 'お問い合わせ内容をご記入ください',
                'required'    => true,
            ] ); ?>

            <div>
                <button 
                    type="submit"
                    class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                >
                    <?php echo esc_html( $args['submit_text'] ); ?>
                </button>
            </div>
        </form>

<?php if ( $args['variant'] === 'split' ) : ?>
    </div>
</div>
<?php else : ?>
</div>
<?php endif; ?>
