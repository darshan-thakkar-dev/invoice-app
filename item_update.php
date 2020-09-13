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
            $itemName=$input_params['itemName'];
            $itemType=$input_params['itemType'];
            $itemDesc=$input_params['itemDesc'];
            $uomModel=$input_params['uomModel'];
            $itemStock=$input_params['itemStock'];
        // $image_name=$input_params['image_name'];

    	if (empty($itemName) || empty($id)) {
    		header('Content-type: application/json');
			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}else{
			$query_class_duplicate=$con->select_query("tbl_item","*","Where id='".$id."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) < 0)
			{
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'Item is not availble.'));
				
			}else{    		
                $qry="SELECT * FROM `tbl_item` WHERE `id`=".$id;
                $result = mysqli_query($con,$qry);
                $image_name = $result['image_name'];
        		$item=array(
                    "itemName"=>$itemName,
                    "itemDesc"=>$itemDesc,
                    "itemType"=>$itemType,
                    "uomModel"=>$uomModel,
                    "itemStock"=>$itemStock
                    );

    		$insertUser = $con->update("tbl_item",$item,"where id='".$id."'");
					header('Content-type: application/json');
					echo json_encode(array("status"=>1,"message"=>"Item update Successfully."));
    	}
    }
?>