<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      border: 1px solid black;
    }
    tr td {
      width: 30px;
      height: 30px;
      border: 1px solid black;
    }

    </style>
</head>
<body>
  <table>
    <tbody>
      <?php for($i=0;$i<8;$i++){ ?>
      <tr>
        <?php for($j=0;$j<8;$j++){?>
          <!-- ------------------------- -->
            <?php if($i % 2 === 0){ ?>
              <?php if($j % 2 === 0){?>
                <td style="background-color: black;"></td>
              <?php }else{?>
                <td></td>
                <?php } ?>
            <?php } ?>
                
            <?php if($i % 2 !== 0){ ?>
              <?php if($j % 2 !== 0){?>
                <td style="background-color: black;"></td>
              <?php }else{?>
                <td></td>
                <?php } ?>
            <?php } ?>

        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>

</body>
</html>