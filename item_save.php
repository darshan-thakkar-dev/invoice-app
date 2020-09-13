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
    					$itemName=$input_params['itemName'];
                        $itemType=$input_params['itemType'];
                        $itemDesc=$input_params['itemDesc'];
                        $uomModel=$input_params['uomModel'];
                        $itemStock=$input_params['itemStock'];
    	if (empty($itemName)){
    		header('Content-type: application/json');
			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}else{
			$query_class_duplicate=$con->select_query("tbl_item","*","Where itemName='".$itemName."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) > 0){
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'Item name are already exists.'));
			}else{    		
    		$item=array(
		    		// "state_name"=>$state_name
    				"itemName"=>$itemName,
                    "itemDesc"=>$itemDesc,
                    "itemType"=>$itemType,
                    "uomModel"=>$uomModel,
                	"itemStock"=>$itemStock
    		);

    		// print_r($customer);

    		$insertUser = $con->insert_record("tbl_item",$item);
					header('Content-type: application/json');
					echo json_encode(array("status"=>1,"message"=>"Item added Successfully."));
    	}
    }
?>