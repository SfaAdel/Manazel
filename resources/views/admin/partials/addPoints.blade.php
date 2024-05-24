<div class="modal add-points-modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"><span class="status-name"></span></p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form class="delete-form" method="POST" action="" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="PATCH">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
      <section class="modal-card-body">
        <input disabled class="user-points input">
        <input type="number" class="input" name="points" min="0" oninput="validity.valid||(value='');">
        <span class="user-phone"></span>
        <p class="delete-text"><strong></strong></p>
      </section>
      <footer class="modal-card-foot">
        <button type="submit" class="button is-success">تأكيد</button>
        <button class="button close-modal" aria-label="close">الغاء</button>
      </footer>
    </form>
  </div>
</div>