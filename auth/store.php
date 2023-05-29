<?php
include_once '../libs/config.php';
include_once '../libs/library.php';
if (isset($_GET['store'])) {
    

?>

<div class="card-header bg-orange d-flex justify-content-around align-items-center">
    <div class="col-8">
        <h3>Store</h3>
    </div>
    <div class="col-4 d-flex justify-content-end">
        <a class="btn btn-success modality" href="#" data-targeted="products">
            <i class="fas fa-file-archive me-2 fa-fw"></i>
            List
        </a>
    </div>
</div>
<div class="card-body row">
    <form action="" method="POST" class="col-lg-6 m-auto col-md-8 col-sm-12" id="fillable">
        <div class="form-group">
            <label class="form-label" for="labelInput">Store:</label>
            <input type="text" class="form-control" name="label" id="labelInput" />
        </div>

        <div class="form-group">
            <label class="form-label" for="storeType">Store type:</label>
            <select name="store" class="form-control" id="storeType">
                <option value="" class="text-muted">-- choose --</option>
                <option value="product">Product</option>
                <option value="service">Service</option>
            </select>
        </div>
        <fieldset id="fieldset">

        </fieldset>

        <div class="form-group my-2">
            <button type="submit" class="btn btn-success" name="add_store">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>
<?php


?>
<script>
    $(document).on('change', '[id="storeType"]', function(e) {
        e.preventDefault();
        let div
        if ($(this).val() == 'product') {
            div = `
            <div class="form-group">
                <label class="form-label" for="nameInput">Product Name:</label>
                <input type="text" class="form-control" name="name" id="nameInput" />
            </div>
            <div class="form-group">
                <label class="form-label" for="priceInput">Price:</label>
                <input type="text" class="form-control" name="price" id="priceInput" />
            </div>
            <div class="form-group">
                <label class="form-label" for="quantityInput">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantityInput" />
            </div>
            `;
            $('#fieldset').html('').append(div);
        } else if ($(this).val() == 'service') {
            div = `
            <div class="form-group">
                <label class="form-label" for="nameInput">Service Name:</label>
                <input type="text" class="form-control" name="name" id="nameInput" />
            </div>
            <div class="form-group">
                <label class="form-label" for="CostInput">Cost:</label>
                <input type="text" class="form-control" name="cost" id="CostInput" />
            </div>
            `;
            $('#fieldset').html('').append(div);
        }

    });
</script>
<?php
}else {
    header('location:index.php');
}

?>