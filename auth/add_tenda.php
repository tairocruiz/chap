<?php
include_once '../libs/config.php';
include_once '../libs/library.php';

$sql1 = "SELECT `product_service`.* FROM `product_service`, `products` WHERE `product_service`.`id`=`products`.`prod_serv_id`";
$query1 = mysqli_query($conn, $sql1);
$no1 = mysqli_num_rows($query1);

$sql2 = "SELECT `product_service`.* FROM `product_service`, `services` WHERE `product_service`.`id`=`services`.`prod_serv_id`";
$query2 = mysqli_query($conn, $sql2);
$no2 = mysqli_num_rows($query2);

$sql3 = "SELECT * FROM employees ";

if (isset($_GET['add_tenda'])) {
?>

    <div class="card-header d-flex justify-content-around align-items-center">
        <div class="col-8">
            <h3>Tendas</h3>
        </div>
        <div class="col-4 d-flex justify-content-end">
            <a class="btn btn-success modality" href="#" data-targeted="add_tenda">Add Tenda</a>
        </div>
    </div>
    <div class="card-body row">
        <form action="" method="post" class="col-lg-6 m-auto col-md-8 col-sm-12">
            <div class="form-group">
                <label class="form-label" for="nameInput">Name:</label>
                <input type="text" class="form-control" name="name" id="nameInput" />
            </div>
            <div class="form-group">
                <label class="form-label" for="customerInput">customer:</label>
                <input type="text" class="form-control" name="customer" id="customerInput" />
            </div>

            <div class="form-group">
                <label class="form-label" for="locationInput">Location:</label>
                <input type="text" class="form-control" name="location" id="locationInput" />
            </div>
            <div class="form-group">
                <label class="form-label" for="satistfactoryInput">Satistfactory Level:</label>
                <input type="text" class="form-control" name="satistifactory" id="satistfactoryInput" />
            </div>
            <div class="row w-100">
                <div class="form-group col-6">
                    <label class="form-label" for="dueDateInput">Due date:</label>
                    <input type="date" class="form-control" name="due_date" id="dueDateInput" />
                </div>
                <div class="form-group col-6">
                    <label class="form-label" for="operatorInput">Operator:</label>
                    <input type="text" class="form-control" name="operator" id="operatorInput" />
                </div>
            </div>
            <div class="form-group py-lg-1">
                <label class="form-check-label" for="typeTendaInput">Scale:</label>
                <input type="radio" class="mx-lg-1" name="type" value="product" id="typeTendaInput-1" required />Quantify
                <input type="radio" class="mx-lg-1" name="type" value="service" id="typeTendaInput-2" />Qualify
            </div>
            <fieldset id="switcher">
                
            </fieldset>

            <div class="form-group my-2">
                <button class="btn btn-success" name="add_tenda" type="submit">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
    <script>
        // tenda
        $(document).on('click', 'input[id^="typeTendaInput-"]', function() {
            let div
            if ($(this).val() == 'product') {
                div  = `
                    <div class="form-group">
                        <label class="form-label" for="labelInput">Item Label:</label>
                        <select name="label" id="labelInput" class="form-control">
                            <option value="" class=" disabled text-muted">-- select --</option>
                            <?php while ($row = mysqli_fetch_assoc($query1)) {
                                echo '<option value="' . $row['id'] . '"> ' . ucfirst($row['label']) . ' </option>';
                            } ?>
                        </select>
                    </div>
                    <div class="row w-100">
                        <div class="form-group col-6">
                            <label class="form-label" for="priceInput">Price:</label>
                            <input type="text" class="form-control" name="price" id="priceInput" />
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="quantityInput">Quantity:</label>
                            <input type="text" class="form-control" name="quantity" id="quantityInput" />
                        </div>
                    </div>
                `;
                $('#switcher').html('').append(div);
            }else {
                div  = `
                    <div class="form-group">
                        <label class="form-label" for="labelInput">Item Label:</label>
                        <select name="label" id="labelInput" class="form-control">
                            <option value="" class=" disabled text-muted">-- select --</option>
                            <?php while ($row = mysqli_fetch_assoc($query2)) {
                                echo '<option value="' . $row['id'] . '"> ' . ucfirst($row['label']) . ' </option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label class="form-label" for="costInput">Cost:</label>
                        <input type="text" class="form-control" name="cost" id="costInput" />
                    </div>
                `;
                $('#switcher').html('').append(div);
            }
            console.log($(this).val() + '  rfghj')
        });
    </script>

<?php } ?>