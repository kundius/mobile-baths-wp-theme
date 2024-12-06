<?php

add_action('wp_ajax_feedback_action', 'ajax_action_feedback');
add_action('wp_ajax_nopriv_feedback_action', 'ajax_action_feedback');

function ajax_action_feedback()
{
  $errors = [];

  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }

  if (false === $_POST['anticheck'] || !empty($_POST['submitted'])) {
    wp_die('Пошел нахрен, мальчик! (c)');
  }

  if (empty($_POST['your_name']) || ! isset($_POST['your_name'])) {
    $errors['name'] = 'Пожалуйста, введите ваше имя.';
  } else {
    $your_name = sanitize_text_field($_POST['your_name']);
  }

  if (empty($_POST['your_email']) || ! isset($_POST['your_email'])) {
    $errors['email'] = 'Пожалуйста, введите адрес вашей электронной почты.';
  } elseif (!preg_match('/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i', $_POST['your_email'])) {
    $errors['email'] = 'Адрес электронной почты некорректный.';
  } else {
    $your_email = sanitize_email($_POST['your_email']);
  }

  if (empty($_POST['your_subject']) || ! isset($_POST['your_subject'])) {
    $your_subject = 'Сообщение с сайта';
  } else {
    $your_subject = sanitize_text_field($_POST['your_subject']);
  }

  if (empty($_POST['your_message']) || ! isset($_POST['your_message'])) {
    $errors['comments'] = 'Пожалуйста, введите ваше сообщение.';
  } else {
    $your_message = sanitize_textarea_field($_POST['your_message']);
  }

  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = '';

    if (!$email_to) {
      $email_to = get_option('admin_email');
    }

    $body = "Имя: $your_name \nEmail: $your_email \n\nСообщение: $your_message";
    $headers = 'From: ' . $your_name . ' <' . $email_to . '>' . "\r\n" . 'Reply-To: ' . $email_to;

    wp_mail($email_to, $your_subject, $body, $headers);

    $message_success = 'Собщение отправлено. В ближайшее время мы свяжемся с вами.';

    wp_send_json_success($message_success);
  }

  wp_die();
}
