<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    tr td{
      width: 30px;
      height: 30px;
      border: 1px solid black;
      text-align: center;
    }
  </style>
</head>
<body>
  <?php $x =0;?>
  <table>
  <?php for($i=0;$i<10;$i++){?>
    <tr>
    <?php for($j=0;$j<10;$j++){
      $x++;
      $check = true;
      for($n=2;$n<=sqrt($x);$n++){
        if($x % $n == 0){
          $check = false;
        }
      }
      if($check == true){?>
        <td style="background-color: green;"><?php echo $x ?></td>;
      <?php } else { ?>
        <td><?php echo $x ?></td>;
      <?php }?>
    <?php }?>
    </tr>
  <?php }?>
  </table>
</body>
</html>