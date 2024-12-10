<div class="contacts-feedback">
  <div class="contacts-feedback__headline">
    <div class="contacts-feedback__headline-title">Есть вопросы<br>или предложения?</div>
    <div class="contacts-feedback__headline-desc">Пишите, обязательно ответим</div>
  </div>
  <form action="<?php echo admin_url('admin-ajax.php') ?>" class="contacts-feedback__form" data-feedack-form>
    <input type="hidden" name="submitted" value="">
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
    <input type="hidden" name="subject" value="Обратная связь">

    <div class="contacts-feedback__messages" data-feedack-form-messages></div>

    <div class="contacts-feedback__form-name">
      <label class="contacts-feedback__label">Ваше имя</label>
      <input type="text" name="your-name" value="" class="contacts-feedback__input">
    </div>

    <div class="contacts-feedback__form-phone">
      <label class="contacts-feedback__label">Телефон</label>
      <input type="tel" name="your-phone" value="" class="contacts-feedback__input">
    </div>

    <div class="contacts-feedback__form-message">
      <label class="contacts-feedback__label">Задайте свой вопрос</label>
      <textarea name="your-message" rows="2" class="contacts-feedback__textarea"></textarea>
    </div>

    <div class="contacts-feedback__form-submit">
      <button type="submit" class="contacts-feedback__submit">
        Отправить сообщение
      </button>
    </div>

    <div class="contacts-feedback__form-rules">
      <label class="feedback-rules">
        <input class="feedback-rules__input" type="checkbox" name="approve" value="1" checked>
        <span class="feedback-rules__check"></span>
        <span class="feedback-rules__text">
          Прочитал(-а) соглашаюсь с
          <?php if ($crb_agreement_page = carbon_get_theme_option('crb_agreement_page')): ?>
            <a href="<?php the_permalink($crb_agreement_page[0]['id']) ?>">политикой обработки персональных данных</a>
          <?php else: ?>
            политикой обработки персональных данных
          <?php endif; ?>
        </span>
      </label>
    </div>
  </form>
</div>