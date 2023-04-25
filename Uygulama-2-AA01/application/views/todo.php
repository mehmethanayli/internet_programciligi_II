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
                        <div class="col-md-11">
                            <input type="text" name="description" class="form-control" placeholder="Yapılacak görevi buraya yazınız.">
                        </div>
                        <div class="col-md-1">
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
                        <td>Durum</td>
                        <td>Oluşturulma Tarihi</td>
                        <td>İşlem</td>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($todos as $todo) { ?>
                        <tr>
                            <td><?php echo $todo->description; ?></td>
                            <td><?php echo ($todo->complated_at == 1) ? "Tamamlandı" : "Beklemede"; ?></td>
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