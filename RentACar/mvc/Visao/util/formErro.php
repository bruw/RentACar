<?php if ($this->temErro($campo)): ?>
    <span class="helper-text red-text" data-error="wrong" data-sucess="rigth"><?= $this->getErro($campo) ?></span>
<?php endif ?>