<?php

add_action('wp_ajax_feedback_action', 'ajax_action_feedback');
add_action('wp_ajax_nopriv_feedback_action', 'ajax_action_feedback');

function ajax_action_feedback()
{
  $errors = [];

  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }

  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }

  if (empty($_POST['approve'])) {
    $errors['approve'] = 'Вы должны согаситься с правилами.';
  }

  if (empty($_POST['your-phone'])) {
    $errors['your-phone'] = 'Введите ваш телефон.';
  }

  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = '';

    if (!$email_to) {
      $email_to = get_option('admin_email');
    }

    $rows = [];
    if (!empty($_POST['your-name'])) {
      $rows[] = 'Имя: ' . sanitize_text_field($_POST['your-name']);
    }
    if (!empty($_POST['your-phone'])) {
      $rows[] = 'Телефон: ' . sanitize_text_field($_POST['your-phone']);
    }
    if (!empty($_POST['your-email'])) {
      $rows[] = 'E-mail: ' . sanitize_text_field($_POST['your-email']);
    }
    if (!empty($_POST['your-message'])) {
      $rows[] = 'Сообщение: ' . sanitize_text_field($_POST['your-message']);
    }
    $body = implode("\n", $rows);

    $subject = 'Обратная связь';
    if (!empty($_POST['subject'])) {
      $subject = sanitize_text_field($_POST['subject']);
    }

    wp_mail($email_to, $subject, $body);

    $message_success = 'Собщение отправлено. В&nbsp;ближайшее время мы свяжемся с вами.';

    wp_send_json_success($message_success);
  }

  wp_die();
}
