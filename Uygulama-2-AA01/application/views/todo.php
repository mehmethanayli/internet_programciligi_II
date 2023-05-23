<?php

/* Verilerin gelip gelmediğini kontrol ettik. */
/* print_r($todos); */

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Uygulaması</title>
    <?php $this->load->view("includes/style.php"); ?>
</head>

<body>

    <h3 class="text-center">Todo List Uygulaması</h3>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url("todo/insert"); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="description" class="form-control" 
                            value="<?php echo isset($formError) ? set_value("description") : NULL; ?>" 
                            placeholder="Yapılacak görevi buraya yazınız.">
                            <?php
                            if (isset($formError)) {
                                echo form_error("description");
                            }

                            ?>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="priority" id="" required>
                                <option value="">Seçim Yapınız</option>
                                <option value="0">Normal</option>
                                <option value="1">Acil</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-info"> Ekle </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr>

        <div class="row">

            <table class="table table-bordered table-hover table-striped">

                <thead>
                    <tr>
                        <td>Yapılacaklar</td>
                        <td>Öncelik</td>
                        <td>Durum</td>
                        <td>Oluşturulma Tarihi</td>
                        <td>İşlem</td>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($todos as $todo) { ?>
                        <tr>
                            <td><?php echo $todo->description; ?></td>
                            <td><?php echo ($todo->priority == 1) ? "Acil" : "Normal"; ?></td>
                            <td>
                                <input 
                                type="checkbox" 
                                class="form-control js-switch"
                                data-url="<?php echo base_url("todo/isComplateSetter/$todo->id")?>"
                                <?php echo ($todo->is_active == 1) ? "checked" : ""; ?>>
                            </td>
                            <td> <?php echo $todo->created_at; ?> </td>
                            <td><a href="<?php echo base_url("todo/delete/$todo->id"); ?>" class=" btn btn-danger"> Sil </td>
                        </tr>


                       
                    <?php } ?>

                </tbody>

            </table>

        </div>
    </div>




    <?php $this->load->view("includes/script.php"); ?>

</body>

</html>