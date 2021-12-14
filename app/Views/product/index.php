<?= $this->extend("layout/template_with_header_footer") ?>

<?= $this->section("content"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="p-4">Produk</h1>
            </div>
            <div class="col" style="text-align: right;">
                <a href="/product/create" class="btn m-4 btn-white border-dark"><i class="fas fa-plus"></i></a>
            </div>
        </div>

        <div class="row px-4">
            <?php foreach ($products as $product) : ?>
                <div class="col-3">
                    <div class="card border-dark" style="height: 100%">
                        <img src="/img/<?= $product["image"]; ?>" class="card-img-top" alt="<?= $product["name"]; ?>">
                        <div class="card-body mb-4">
                            <h5 class="card-title mb-4 text-center"><?= $product["name"]; ?></h5>
                            <h4 class="card-subtitle mb-4 text-center"><?= "Rp " . number_format($product["price"], 0, ',', '.'); ?></h4>
                            <p class="card-text"><?= $product["description"]; ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <a href="#" class="btn mb-4 btn-white border-dark">Beli</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?= $this->endSection(); ?>