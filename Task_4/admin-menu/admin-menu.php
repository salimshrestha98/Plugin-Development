<?php

/**
 * Plugin Name: Admin Menu
 * Description: This is a demo plugin for task 4.
 * Author: Salim Shrestha
 * Author URI: https://salim.com.np
 */

function am_add_menu_test_email() {
    add_menu_page(
        'Test Email Page',
        'Test Email',
        'manage_options',
        'am-test-email',
        'am_add_menu_html',
        'dashicons-cart',
        4
    );
    add_submenu_page(
        'am-test-email',
        'Send Email Page',
        'Send Email',
        'manage_options',
        'am-send-email',
        'am_send_email_main'
    );
}

add_action( 'admin_menu', 'am_add_menu_test_email' );

function am_add_menu_html() {
    ?>
    <div class="wrap">
        <p>This is admin menu.</p>
    </div>
    <?php
}

function am_send_email_main() {
    if ( $_SERVER["REQUEST_METHOD"] == "GET") {
        include('includes/send-email.php');
    }
    elseif ( $_SERVER["REQUEST_METHOD"] == "POST") {
        $email_contents = array();
        if ( empty($_POST['subject']) ) {
            $errors[] = "No Email Subject provided. Please enter valid email subject.";
        } else {
            $email_contents['subject'] = trim(htmlspecialchars($_POST['subject']));
        }
        
        if ( empty($_POST['content']) ) {
            $errors[] = "No Email Content provided. Please enter valid email content.";
        } else {
            $email_contents['content'] = trim(htmlspecialchars($_POST['content']));
        }

        if ( empty($_POST['recipient']) ) {
            $errors[] = "No Email Recipient provided. Please enter valid email recipient.";
        } else {
            $email_contents['recipient'] = trim(htmlspecialchars($_POST['recipient']));
        }

        //  Adding custom filter hook

        $email_contents = apply_filters('am_change_email_content_data', $email_contents);

        //  Adding custom action hook

        do_action('am_after_email_submit', $email_contents);
        echo "Updated email contents: <br>";
        print_r($email_contents);

    }
}

function am_change_email_callback($contents) {
    $contents['subject'] = "This is updated subject";
    $contents['content'] = "This is updated email content";
    $contents['recipient'] = "salimshrestha98@gmail.com";
    
    return $contents;
}

function am_send_email($email) {
    wp_mail($email['recipient'], $email['subject'], $email['content']);
    echo "Email sent. <br>";
}

add_filter( 'am_change_email_content_data', 'am_change_email_callback', 10, 1 );
add_action( 'am_after_email_submit', 'am_send_email', 10, 1);


?>

