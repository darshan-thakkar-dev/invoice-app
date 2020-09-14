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

    	if (empty($company_name)) 
    	{
    		header('Content-type: application/json');

			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}
    	else
    	{
			$query_class_duplicate=$con->select_query("tbl_cust","*","Where company_name='".$company_name."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) > 0)
			{
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'Company name are already exists.'));
			}
			else
			{    		
    		
    		$customer=array(
		    		// "state_name"=>$state_name
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
    		);

    		// print_r($customer);

    		$insertUser = $con->insert_record("tbl_cust",$customer);

					// $user_id = mysqli_insert_id();

					//print_r($userid);die();
					header('Content-type: application/json');

					echo json_encode(array("status"=>1,"message"=>"Customer added Successfully."));
    	}
    }
?>