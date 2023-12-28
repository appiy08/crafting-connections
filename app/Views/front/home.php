<?= $this->extend('templates/front_template') ?>

<?= $this->section('content') ?>
<section class="py-5">
    <?= $this->include('front/articles_container') ?>
</section>
<?= $this->endSection() ?>