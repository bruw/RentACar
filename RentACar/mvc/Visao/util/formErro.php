<?php if ($this->temErro($campo)): ?>
    <span class="helper-text red" data-error="wrong" data-sucess="rigth"><?= $this->getErro($campo) ?></span>
<?php endif ?>