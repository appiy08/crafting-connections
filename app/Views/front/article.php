<?= $this->extend('templates/front_template') ?>
<?= $this->section('content') ?>
<section>
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12">
                <div class="row g-4">
                    <?php

                    use CodeIgniter\I18n\Time;

                    if (isset($article_data)) : foreach ($article_data as $article) : ?>
                            <div class="col-12">
                                <div class="app-card app-card-article p-4 h-100 shadow-sm">
                                    <div class="app-card-header">
                                        <h2 class="app-card-title"><?= $article['article_title'] ?></h2>
                                        <div class="px-3 py-3">
                                            <p class="card-text">
                                                <small class="text-body-secondary">Last updated
                                                    <?php $current = Time::now();
                                                    $test = Time::parse($article['created_at']);
                                                    $diff = $current->difference($test);
                                                    echo $diff->humanize();
                                                    ?>
                                                </small>
                                                <small class="text-body">
                                                    &#8213; <?= $article['username']; ?>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="app-card-body px-3 py-4">
                                        <?= $article['article_content'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                    else : ?>
                        <div class="col-12">
                            <p class="display-6">
                                Sorry, Something went wrong.
                            </p>
                            <p class="display-6">
                                Please refresh page.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>