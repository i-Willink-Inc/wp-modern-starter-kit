<?php
/**
 * Molecule: Table
 *
 * @package WP_Modern_Starter_Kit
 * @var array $args Arguments for the component.
 */

$defaults = [
    'headers'    => [], // [ ['key' => '', 'label' => '', 'align' => 'left'], ... ]
    'rows'       => [], // [ ['col1' => '', 'col2' => ''], ... ]
    'striped'    => true,
    'hoverable'  => true,
    'bordered'   => false,
    'compact'    => false,
    'responsive' => true,
    'caption'    => '',
    'class'      => '',
];
$args = wp_parse_args( $args, $defaults );

$table_classes = 'min-w-full divide-y divide-gray-200';
if ( $args['bordered'] ) {
    $table_classes .= ' border border-gray-200';
}

$cell_padding = $args['compact'] ? 'px-4 py-2' : 'px-6 py-4';

$align_classes = [
    'left'   => 'text-left',
    'center' => 'text-center',
    'right'  => 'text-right',
];
?>

<?php if ( $args['responsive'] ) : ?>
<div class="overflow-x-auto rounded-lg border border-gray-200 <?php echo esc_attr( $args['class'] ); ?>">
<?php endif; ?>

<table class="<?php echo esc_attr( $table_classes ); ?>">
    <?php if ( $args['caption'] ) : ?>
        <caption class="px-6 py-3 text-left text-sm font-medium text-gray-500 bg-gray-50">
            <?php echo esc_html( $args['caption'] ); ?>
        </caption>
    <?php endif; ?>
    
    <?php if ( ! empty( $args['headers'] ) ) : ?>
        <thead class="bg-gray-50">
            <tr>
                <?php foreach ( $args['headers'] as $header ) : 
                    $align = $align_classes[ $header['align'] ?? 'left' ] ?? $align_classes['left'];
                ?>
                    <th 
                        scope="col" 
                        class="<?php echo esc_attr( $cell_padding ); ?> <?php echo esc_attr( $align ); ?> text-xs font-semibold text-gray-600 uppercase tracking-wider"
                    >
                        <?php echo esc_html( $header['label'] ?? '' ); ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
    <?php endif; ?>
    
    <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ( $args['rows'] as $index => $row ) : 
            $row_classes = '';
            if ( $args['striped'] && $index % 2 === 1 ) {
                $row_classes .= ' bg-gray-50';
            }
            if ( $args['hoverable'] ) {
                $row_classes .= ' hover:bg-gray-100 transition-colors';
            }
        ?>
            <tr class="<?php echo esc_attr( trim( $row_classes ) ); ?>">
                <?php foreach ( $args['headers'] as $header ) : 
                    $key = $header['key'] ?? '';
                    $value = $row[ $key ] ?? '';
                    $align = $align_classes[ $header['align'] ?? 'left' ] ?? $align_classes['left'];
                ?>
                    <td class="<?php echo esc_attr( $cell_padding ); ?> <?php echo esc_attr( $align ); ?> text-sm text-gray-900 whitespace-nowrap">
                        <?php 
                        // Allow HTML for cells (for badges, links, etc.)
                        if ( is_array( $value ) && isset( $value['html'] ) ) {
                            echo wp_kses_post( $value['html'] );
                        } else {
                            echo esc_html( $value );
                        }
                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if ( $args['responsive'] ) : ?>
</div>
<?php endif; ?>
