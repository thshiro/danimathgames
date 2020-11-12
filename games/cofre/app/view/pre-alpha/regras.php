
<div class="regras">

  <form action="javascript:void(0)" enctype="multipart/form-data" name="start-game" onsubmit="ajaxForm('start-game', true, true, '', '?p=run&map')">

    <input type="hidden" name="callback" value="Game" />
    <input type="hidden" name="callback_action" value="start" />

    <a href="#" onclick="$('form').submit()">
      <img src="<?= STORAGE_URL ?>/img/buttons/button-continuar.png" />
    </a>

  </form>

</div>
