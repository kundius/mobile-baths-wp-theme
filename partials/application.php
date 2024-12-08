<div class="application">
  <div class="application__title">
    Получите консультацию<br>
    и точную стоимость бани
  </div>
  <div class="application__layout">
    <div class="application__layout-profile">
      <div class="application__profile">
        <div class="application__profile-image"></div>
        <div class="application__profile-name">Татьяна Смирнова</div>
        <div class="application__profile-stat">52 реализованных проекта</div>
        <div class="application__profile-desc">Ведущий менеджер бесплатно проконсультирует и проведет точные расчеты</div>
      </div>
    </div>
    <div class="application__layout-form">
      <form action="<?php echo admin_url('admin-ajax.php') ?>" class="application__form" data-feedack-form>
        <input type="hidden" name="submitted" value="">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
        <input type="hidden" name="subject" value="Обратная связь">

        <div class="application__messages" data-feedack-form-messages></div>

        <div class="application__form-name">
          <label class="application__label">Ваше имя</label>
          <input type="text" name="your-name" value="" class="application__input">
        </div>
        <div class="application__form-phone">
          <label class="application__label">Ваш телефон<span>*</span></label>
          <input type="tel" name="your-phone" value="" class="application__input" required>
        </div>
        <div class="application__form-submit">
          <button type="submit" class="application__submit">
            Отправить заявку
          </button>
        </div>
        <div class="application__form-rules">
          <label class="application__rules">
            <input type="checkbox" name="approve" value="1" checked>
            <span></span>
            Прочитал(-а) соглашаюсь с <a href="<?php the_permalink(3); ?>">политикой обработки персональных данных</a>
          </label>
        </div>
      </form>
    </div>
  </div>
</div>