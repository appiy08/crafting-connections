<section>
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-12">
                <div class="row g-4">
                    <?php

                    use CodeIgniter\I18n\Time;

                    if (is_array($articles_data)) : foreach ($articles_data as $article) :
                    ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="app-card app-card-basic h-100 shadow-sm">
                                    <div class="ratio ratio-16x9 border-bottom">
                                        <img src="<?= base_url('assets/images/background/article_card_image.png') ?>" class="card-img-top" alt="crafting_connections_article_image" />
                                    </div>
                                    <div class="app-card-body px-4 pt-3">
                                        <h5 class="card-title"><a href="<?= base_url('article/' . $article['article_id']) ?>"><?= esc($article['article_title']) ?></a></h5>
                                    </div>
                                    <div class="app-card-footer p-4 mt-auto">
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