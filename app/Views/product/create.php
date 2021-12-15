<?= $this->extend("layout/template_with_header_footer") ?>

<?= $this->section("content"); ?>
<div class="container-fluid">
    <?php if ($error_message != null) : ?>
        <div class="row">
            <div class="col-4 offset-4">
                <div class="alert alert-dange" role="alert"><?= $error_message; ?></div>
            </div>
        </div>
    <?php endif; ?>

    <form action="/product/create" method="post" id="form">
        <div class="row">
            <div class="col-4 mb-4 offset-4">
                <label for="name" class="form-label">Name</label>
                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" id="name" name="name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-4 offset-4">
                <label for="description-tinymce" class="form-label">Description</label>
                <div class="input-group">
                    <textarea class="form-control form-control-lg" id="description-tinymce" name="description" style="width: 100%;"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-4 offset-4">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <input type="number" class="form-control form-control-lg" id="price" name="price">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-4 offset-4">
                <label for="image-upload" class="form-label">Image</label>
                <div class="input-group">
                    <input type="file" class="form-control form-control-lg" id="image-upload" name="image">
                </div>
                <div class="mt-2" id="progress-area"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-4 offset-4">
                <label for="image" class="form-label">Category</label>
                <div class="input-group">
                    <select class="form-select form-select-lg" id="category" name="category">
                        <option selected>Select a category</option>
                        <?php foreach($product_categories as $product_category): ?>
                            <option value="<?= $product_category["id"]; ?>"><?= $product_category["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mb-4 offset-4">
                <div class="input-group">
                    <button type="submit" class="btn btn-lg btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
