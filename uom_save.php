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
    					$uom_name=$input_params['uom_name'];
                        $uom_desc=$input_params['uom_desc'];
                        $unit=$input_params['unit'];
                        $con_uom_id=$input_params['con_uom_id'];

    	if (empty($uom_name)) {
    		header('Content-type: application/json');
			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}else{
			$query_class_duplicate=$con->select_query("tbl_uom","*","Where uom_name='".$uom_name."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) > 0)
			{
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'UOM is already exists.'));
			}else{    		
    		$uom=array(
		    		// "state_name"=>$state_name
    				"uom_name"=>$uom_name,
                    "uom_desc"=>$uom_desc,
                    "unit"=>$unit,
                    "con_uom_id"=>$con_uom_id
    		);

    		// print_r($customer);

    		$insertUser = $con->insert_record("tbl_uom",$uom);
					// $user_id = mysqli_insert_id();
					//print_r($userid);die();
					header('Content-type: application/json');
					echo json_encode(array("status"=>1,"message"=>"UOM added Successfully."));
    	}
    }
?>