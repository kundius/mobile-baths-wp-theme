<div class="contacts-feedback">
  <div class="contacts-feedback__headline">
    <div class="contacts-feedback__headline-title">Есть вопросы<br>или предложения?</div>
    <div class="contacts-feedback__headline-desc">Пишите, обязательно ответим</div>
  </div>
  <form action="" class="contacts-feedback__form">
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
      <label class="contacts-feedback__rules">
        <input type="checkbox" name="rules" value="1" checked>
        <span></span>
        Прочитал(-а) соглашаюсь с <a href="<?php the_permalink(3); ?>">политикой обработки персональных данных</a>
      </label>
    </div>
  </form>
</div>