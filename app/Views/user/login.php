<div class="tt_blockcenter rounded">
    <div class="tt_blockhead text-center">
        <?= $data['title'] ?>
    </div>
    <?php if (config('MEMBERSONLY')) : ?>
       <p class='text-center'><b><?= Txt("MEMBERS_ONLY") ?></b></p>
    <?php endif; ?>
    <div class="p-3">
        <form method="post" action="<?= Url('login') ?>" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?= $data['csrf'] ?>" />
            <div class="form p-4">
                <input id="username" type="text" class="form-control fullwidth" name="username" minlength="3" maxlength="25" required autofocus placeholder="<?= Txt('USERNAME') ?>">
            </div>
            <div class="form p-4">
                <input id="password" type="password" class="form-control fullwidth" name="password" minlength="6" maxlength="16" required data-eye placeholder="<?= Txt('PASSWORD') ?>">
            </div>
            <div class="text-center">
                <?= $data['captcha']; ?>
                <button type="submit" class="btn ttbtn"><?= Txt("LOGIN") ?></button><br><br>
                <p class='text-center'><i><?= Txt("COOKIES") ?></i></p>
            </div>
            <div class="p-2 text-center">
                <a href="<?= Url('signup') ?>"><?= Txt("SIGNUP") ?></a> |
                <a href="<?= Url('recover') ?>"><?= Txt("RECOVER_ACCOUNT") ?></a> |
                <a href="<?= Url('contact') ?>"><?= Txt("CONTACT_US") ?></a>
            </div><br>
        </form>
    </div>
</div>