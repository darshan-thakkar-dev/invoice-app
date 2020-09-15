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
                        $invoiceNumber=$input_params['invoiceNumber'];
                        $date=$input_params['date'];
                        $isNewCustomer=$input_params['isNewCustomer'];
                        $customerName=$input_params['customerName'];
                        $customerMo=$input_params['customerMo'];
                        $customerAddress=$input_params['customerAddress'];
                        $existingCustomerId=$input_params['existingCustomerId'];
                        $remark=$input_params['remark'];
                        $subTotal=$input_params['subTotal'];
                        $totalTax=$input_params['totalTax'];
                        $totalDiscount=$input_params['totalDiscount'];
                        $extraCharges=$input_params['extraCharges'];
                        $totalDue=$input_params['totalDue'];
                        $total=$input_params['total'];

    	if (empty($invoiceNumber)){
    	
        	header('Content-type: application/json');
			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	
        }else{
		
        	$query_class_duplicate=$con->select_query("tbl_invoice","*","Where invoiceNumber='".$company_name."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
		
        	if(mysqli_num_rows($query_class_duplicate) > 0){
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'Invoice Number is already exists.'));
			}else{
    	
        	$invoice=array(
                "invoiceNumber"=>$invoiceNumber,
                "date"=>$date,
                "isNewCustomer"=>$isNewCustomer,
                "customerName"=>$customerName,
                "customerMo"=>$customerMo,
                "customerAddress"=>$customerAddress,
                "existingCustomerId"=>$existingCustomerId,
                "remark"=>$remark,
                "subTotal"=>$subTotal,
                "totalTax"=>$totalTax,
                "totalDiscount"=>$totalDiscount,
                "extraCharges"=>$extraCharges,
                "totalDue"=>$totalDue,
                "total"=>$total
            );
        
        	        $insertUser = $con->insert_record("tbl_invoice",$invoice);
					
                    // $user_id = mysqli_insert_id();
					echo "New record has id: " . $con->last_inserted_id();

					header('Content-type: application/json');

					echo json_encode(array("status"=>1,"message"=>"Invoice added Successfully."));
    	}
    }
?>