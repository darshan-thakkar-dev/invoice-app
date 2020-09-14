<?php

$file = fopen("php://input","r");

$jsonInput ="";

while(!feof($file))
{
	$jsonInput .= fgets($file);	
}

fclose($file);

	$input_params = json_decode($jsonInput,true);
    
    include("includes/common_class.php");
	
	include("includes/config.php");	

    	// $state_name = $input_params['state_name'];
    	// $state_id = $input_params['state_id'];

    		$id = $input_params['id'];
			$f_name=$input_params['f_name'];
            $m_name=$input_params['m_name'];
            $l_name=$input_params['l_name'];
           	$company_name=$input_params['company_name'];
            $code=$input_params['code'];
            $gst=$input_params['gst'];
            $address=$input_params['address'];
            $pan=$input_params['pan'];
            $permenant_mo=$input_params['permenant_mo'];
            $alt_mo=$input_params['alt_mo'];
            $email=$input_params['email'];
            $website=$input_params['website'];
            // $image_name=$input_params['image_name'];

    	if (empty($company_name) || empty($id)) {
    		header('Content-type: application/json');
			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}else{
			$query_class_duplicate=$con->select_query("tbl_cust","*","Where id='".$id."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) < 0)
			{
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'Customer is not availble.'));
				
			}else{    		
                $qry="SELECT * FROM `tbl_cust` WHERE `id`=".$id;
                $result = mysqli_query($con,$qry);
                $image_name = $result['image_name'];
        		$state=array(
        				"f_name"=>$f_name,
                        "m_name"=>$m_name,
                        "l_name"=>$l_name,
                        "company_name"=>$company_name,
                    	"code"=>$code,
                        "gst"=>$gst,
                        "address"=>$address,
                        "pan"=>$pan,
                        "permenant_mo"=>$permenant_mo,
                        "alt_mo"=>$alt_mo,
                        "email"=>$email,
                        "website"=>$website	
                        // "image_name"=>$image_name
                    );

    		$insertUser = $con->update("tbl_cust",$state,"where id='".$id."'");
					// $user_id = mysqli_insert_id();
					//print_r($userid);die();
					header('Content-type: application/json');
					echo json_encode(array("status"=>1,"message"=>"Customer update Successfully."));
    	}
    }
?>