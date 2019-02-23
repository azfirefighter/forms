<!DOCTYPE html>
<html>
<body>

<?php
header("Location: test04.html");
    if(isset($_POST) && is_array($_POST) && count($_POST)){
        $data=array();

        if(isset($_POST['pfirst'])){
            $pat='`[^a-z0-9\s]+$`i';
            if(empty($_POST['pfirst']) || preg_match($pat,$_POST['pfirst'])){
                die('Invalid input');
            }else{
                $data['pfirst']=$_POST['pfirst'];
            }
            $data['pmiddle']=$_POST['pmiddle'];
			$data['plast']=$_POST['plast'];
			$data['prefname']=$_POST['prefname'];
			$data['dob']=$_POST['dob'];
			$data['sexm']=$_POST['sexm'];
			$data['sexf']=$_POST['sexf'];
			$data['single']=$_POST['single'];
			$data['married']=$_POST['married'];
			$data['divorced']=$_POST['divorced'];
			$data['spouse']=$_POST['spouse'];
			$data['ssn']=$_POST['ssn'];
			$data['hearabout']=$_POST['hearabout'];
			$data['addr']=$_POST['addr'];
			$data['city']=$_POST['city'];
			$data['state']=$_POST['state'];
			$data['zip']=$_POST['zip'];
			$data['thome']=$_POST['thome'];
			$data['tmobile']=$_POST['tmobile'];
			$data['twork']=$_POST['twork'];
			$data['email']=$_POST['email'];
			$data['emp']=$_POST['emp'];
			$data['occu']=$_POST['occu'];
			$data['yes']=$_POST['yes'];
			$data['no']=$_POST['no'];
			$data['school']=$_POST['school'];
			$data['hphone']=$_POST['hphone'];
			$data['cphone']=$_POST['cphone'];
			$data['wphone']=$_POST['wphone'];
			$data['pcmemail']=$_POST['pcmemail'];
			$data['cfirst']=$_POST['cfirst'];
			$data['cmiddle']=$_POST['cmiddle'];
			$data['clast']=$_POST['clast'];
			$data['caddr']=$_POST['caddr'];
			$data['ccity']=$_POST['ccity'];
			$data['cstate']=$_POST['cstate'];
			$data['czip']=$_POST['czip'];
			$data['cthome']=$_POST['cthome'];
			$data['ctmobile']=$_POST['ctmobile'];
			$data['ctwork']=$_POST['ctwork'];
			$data['cemail']=$_POST['cemail'];
			$data['cemp']=$_POST['cemp'];
			$data['coccu']=$_POST['coccu'];
			$data['ecfirst']=$_POST['ecfirst'];
			$data['ecmiddle']=$_POST['ecmiddle'];
			$data['eclast']=$_POST['eclast'];
			$data['ecthome']=$_POST['ecthome'];
			$data['ectmobile']=$_POST['ectmobile'];
			$data['ectwork']=$_POST['ectwork'];
			$data['diyes']=$_POST['diyes'];
			$data['dino']=$_POST['dino'];
			$data['dic']=$_POST['dic'];
			$data['sid']=$_POST['sid'];
			$data['gn']=$_POST['gn'];
			$data['accoh']=$_POST['accoh'];
			$data['coveryes']=$_POST['coveryes'];
			$data['coverno']=$_POST['coverno'];
			$data['sic']=$_POST['sic'];
			$data['printname']=$_POST['printname'];
            $data['date01']=date('m-d-Y H:i:s');
            $data['date02']=date('m-d-Y H:i:s');
            
            require_once 'createFDF.php';
            
            $fdf_file='test.fdf';
            
            $fdf_dir=dirname(__FILE__);
            
            $pdf_doc='penzpr.pdf';
            
            $fdf_data=createFDF($pdf_doc,$data);

            if($fp=fopen($fdf_dir.'/'.$fdf_file,'w')){
                fwrite($fp,$fdf_data,strlen($fdf_data));
                echo $fdf_file,' written successfully.';
				shell_exec('pdftk penzpr.pdf fill_form test.fdf output filled.pdf flatten');
            }else{
                die('Unable to create file: '.$fdf_dir.'/'.$fdf_file);
            }
            fclose($fp);
        }
    }else{
        echo 'You did not submit a form.';
    }
?>

</body>
</html>
