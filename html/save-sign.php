<!DOCTYPE html>
<html>
<body>
<?php
header("Location: index.html");
$sign = '';
if(isset($_POST['hdnSignature']))
{
 $sign = $_POST['hdnSignature'];
 $path = "/var/www/html/testsign.png";
 $sign = base64_decode($sign);
 file_put_contents($path, $sign);
 shell_exec('convert testsign.png signature.pdf');
 shell_exec('pdfjam --paper "a4paper" --scale 0.6 --offset "0.01cm -6.292cm" --outfile stamp.pdf signature.pdf');
 shell_exec('pdftk A=blank.pdf B=stamp.pdf cat A1 B1 output multistamp.pdf');
 shell_exec('pdftk filled.pdf multistamp multistamp.pdf output final.pdf');
 shell_exec('cp final.pdf /var/www/html/samba');
 }
?>
</body>
</html>