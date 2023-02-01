<!-- Sidebar -->
<div class="default_sidebar">
    <div class="container mt-3">
        <a href="<?= Url() ?>" class="btn fullwidth tt_block"><?= Txt("HOME"); ?></a>
        <a href="<?= Url('portal') ?>" class="btn fullwidth tt_block"><?= Txt("PORTAL"); ?></a>
        <?php if (Visitor('class') == _ADMINISTRATOR) : ?>
            <div class="dropdown">
                <button type="button" class="btn dropdown-toggle fullwidth tt_block" data-bs-toggle="dropdown">
                    <?= Txt("ADMIN"); ?>
                </button>
                <ul class="dropdown-menu">
                    <a href="<?= Url('adminbackup') ?>"><?= Txt("BACKUPS"); ?></a><br>
                    <a href="<?= Url('adminportal') ?>"><?= Txt("PORTAL"); ?></a><br>
                    <a href="<?= Url('adminexceptions') ?>"><?= Txt("ERRORS"); ?></a><br>
                    <a href="<?= Url('adminstylesheet') ?>"><?= Txt("THEME"); ?></a><br>
                    <a href="<?= Url('adminconfig') ?>"><?= Txt("CONFIG"); ?></a><br>
                    <a href="<?= Url('adminimport') ?>"><?= Txt("IMPORT"); ?></a>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (Visitor('class') >= _SUPERMODERATOR) : ?>
            <div class="dropdown">
                <button type="button" class="btn dropdown-toggle fullwidth tt_block" data-bs-toggle="dropdown">
                    <?= Txt("SUPER_MOD"); ?>
                </button>
                <ul class="dropdown-menu">
                    <a href="<?= Url('admingroup/groups') ?>"><?php echo Txt("GROUPS"); ?></a><br>
                    <a href="<?= Url('adminshoutbox/clear') ?>"><?php echo Txt("CLEAR_SHOUTBOX"); ?></a><br>
                    <a href="<?= Url('admincensor') ?>"><?php echo Txt("WORD_CENSOR"); ?></a><br>
                    <a href="<?= Url('adminemail') ?>"><?php echo Txt("MASS_EMAIL"); ?></a><br>
                    <a href="<?= Url('adminmessage/masspm') ?>"><?php echo Txt("MASS_PM"); ?></a>
                </ul>
            </div>
        <?php endif; ?>
        <div class="dropdown">
            <button type="button" class="btn dropdown-toggle fullwidth tt_block" data-bs-toggle="dropdown">
                <?= Txt("MOD"); ?>
            </button>
            <ul class="dropdown-menu">
                <a href="<?= Url('adminforumcat') ?>"><?php echo Txt("FORUM"); ?></a><br>
                <a href="<?= Url('adminnews') ?>"><?php echo Txt("NEWS"); ?></a><br>
                <a href="<?= Url('adminpoll') ?>"><?php echo Txt("POLLS"); ?></a><br>
                <a href="<?= Url('adminuseradd') ?>"><?php echo Txt("ADD_USER"); ?></a><br>
                <a href="<?= Url('adminusersearch') ?>"><?= Txt("SEARCH_USER"); ?></a><br>
            </ul>
        </div>

        <div class="dropdown">
            <button type="button" class="btn dropdown-toggle fullwidth tt_block" data-bs-toggle="dropdown">
                <?= Txt('TORRENTS') ?>
            </button>
            <ul class="dropdown-menu">
                <a href="<?= Url('admincategorie') ?>"><?php echo Txt("TORRENT_CAT"); ?></a><br>
                <a href="<?= Url('admintorrentlang') ?>"><?php echo Txt("LANG"); ?></a><br>
                <a href="<?= Url('admintorrent') ?>"><?php echo Txt("TORRENTS"); ?></a><br>
                <a href="<?= Url('adminsnatch') ?>"><?= Txt("HIT&RUN"); ?></a><br>
                <a href="<?= Url('adminpeer') ?>"><?php echo Txt("PEERS_LIST"); ?></a><br>
                <a href="<?= Url('admintag') ?>"><?php echo Txt("TAGS"); ?></a><br>
            </ul>
        </div>

        <div class="dropdown">
            <button type="button" class="btn dropdown-toggle fullwidth tt_block" data-bs-toggle="dropdown">
                <?= Txt('SECURITY') ?>
            </button>
            <ul class="dropdown-menu">
                <a href="<?= Url('adminprivacy') ?>"><?= Txt("PRIVACY"); ?></a><br>
                <a href="<?= Url('adminwarning') ?>"><?php echo Txt("WARNED_USERS"); ?></a><br>
                <a href="<?= Url('adminreport') ?>"><?php echo Txt("REPORTS"); ?></a><br>
                <a href="<?= Url('adminban') ?>"><?php echo Txt("BANNED"); ?></a><br>
                <a href="<?= Url('adminclient') ?>"><?= Txt("CLIENT_BAN"); ?></a><br>
                <a href="<?= Url('admincheat') ?>"><?php echo Txt("CHEATS"); ?></a><br>
                <a href="<?= Url('adminduplicateip') ?>"><?php echo Txt("DUPLICATEIP"); ?></a><br>
            </ul>
        </div>

        <div class="dropdown">
            <button type="button" class="btn dropdown-toggle fullwidth tt_block" data-bs-toggle="dropdown">
                <?= Txt('ACTIVITY') ?>
            </button>
            <ul class="dropdown-menu">
                <a href="<?= Url('adminlog') ?>"><?php echo Txt("SITELOG"); ?></a><br>
                <a href="<?= Url('adminwhoswhere') ?>"><?php echo Txt("WHOS_WHERE"); ?></a><br>
                <a href="<?= Url('admininactive') ?>"><?php echo Txt("INACTIVE"); ?></a><br>
                <a href="<?= Url('admincomment') ?>"><?php echo Txt("LATEST_COMMENTS"); ?></a><br>
                <a href="<?= Url('admininvite/pending') ?>"><?= Txt("PENDING_INVITE"); ?></a><br>
                <a href="<?= Url('admininvite') ?>"><?= Txt("INVITED_USER"); ?></a><br>
            </ul>
        </div>

    </div>
</div>
<!-- Sidebar -->