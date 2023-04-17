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
                        <td><a href="" class=" btn btn-danger"> Sil </td>
                    </tr>

                <?php } ?>
            </tbody>

        </table>

    </div>




    <?php $this->load->view("includes/script.php"); ?>

</body>

</html>