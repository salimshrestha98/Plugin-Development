<?php
/**
 * Plugin Name: Metabox Test
 * Author: Salim Shrestha
 * Author URI: https://salim.com..np
 * Description: This is the task 8 to create a metabox.
 */

add_action( 'add_meta_boxes', 'mt_register_meta_boxes' );

function mt_register_meta_boxes() {
    add_meta_box(
        'mt_meta_box',
        'Test Meta Box',
        'mt_register_meta_box_callback',
        'post',
        'advanced',
        'high'
    );
}

function mt_register_meta_box_callback( $post ) {
    $author = get_post_meta( $post->ID, 'mt_post_author', true );
    $length = get_post_meta( $post->ID, 'mt_post_length', true );
    $summary = get_post_meta( $post->ID, 'mt_post_summary', true );

    ?>
    <div class="wrap">
            <label for="mt_post_author">Author</label>
            <input type="text" name="mt_post_author" id="" value="<?= esc_attr( $author ); ?>"><br><br>
            <label for="mt_post_length">Post Length</label>
            <select name="mt_post_length" id="">
                <option value="short" <?= ( $length == 'short' ) ? 'selected' : '' ?>>Short</option>
                <option value="average" <?= ( $length == 'average' ) ? 'selected' : '' ?>>Average</option>
                <option value="long" <?= ( $length == 'long' ) ? 'selected' : '' ?>>Long</option>
                <option value="extra-long" <?= ( $length == 'extra-long' ) ? 'selected' : '' ?>>Extra Long</option>
            </select><br><br>
            <label for="mt_post_summary">Summary</label>
            <textarea name="mt_post_summary" id="" cols="30" rows="10"><?= $summary ?></textarea>
    </div>

    <?php
}

?>