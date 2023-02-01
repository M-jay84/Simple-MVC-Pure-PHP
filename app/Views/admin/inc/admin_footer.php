</div>
</div>
<!-- Content End -->
</div>
<!-- Footer Start -->
<footer class="mt-auto">
    <div class="tt_block rounded p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start"><br>
                &copy; <a href="<?php echo Url(); ?>"><?php echo config('SITENAME') ?></a><br>
                RSS <i class="fa fa-rss" aria-hidden="true" title="RSS Feed" style="color:#ff9900;"></i>
                <i class="fa fa-rss-square" aria-hidden="true" title="Custom RSS" style="color:#ffff00;"></i>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                M-BiTsy By <a href="https://github.com/M-jay84/M-BiTsy">M-jay</a>
                <br>Support @ <a href="https://torrenttrader.uk" target="_blank">Torrent Trader</a><br>
                <?php $totaltime = array_sum(explode(" ", microtime())) - $GLOBALS['tstart']; ?>
                <?php printf(Txt("PAGE_GENERATED_IN"), $totaltime); ?>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- JavaScript Libraries -->
<script src="<?= Url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?= Url('assets/js/popper.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= Url('assets/js/java_klappe.js') ?>"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
<script>  hljs.initHighlightingOnLoad(); </script>
<script src="<?= Url('assets/js/overlib.js') ?>"></script>
<script type="module"> import Tags from "<?php echo Url('assets/js/tags.js') ?>"; Tags.init("select[multiple]"); </script>
<?php require "assets/js/adminshoutbox.js"; ?>
<?php require "assets/js/carousel.js"; ?>
<?php require "assets/js/usersearch.js"; ?>
<script>
    (function ($) {
    "use strict";
    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.default_sidebar, .content').toggleClass("open");
        return false;
    });
})(jQuery);
</script>

</body>

</html>
<?php ob_end_flush(); ?>