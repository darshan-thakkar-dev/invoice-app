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

    	$image_name = $input_params['img_name'];
    	$id = $input_params['id'];
            // header('Content-type: multipart/form-data');
    		// $id = $_POST['id'];
            // $image_name=$_POST['img_name'];   
    	if (!isset($image_name) || empty($image_name) || empty($id)) {
    		header('Content-type: application/json');
        	echo json_encode(array("status"=>0,"message"=>"Please, select an image"));	
        }else{
			$query_class_duplicate=$con->select_query("tbl_item","*","Where id='".$id."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			      if(mysqli_num_rows($query_class_duplicate) < 0){
    				header('Content-type: application/json');
    				echo json_encode(array('status'=>0,'message'=>'Item is not availble.'));
    			  }else{    		
                    // $id = $_POST['id'];
                    if(isset($id) && isset($image_name)){
                        $query_teacher=$con->select_query("tbl_item","*","Where id='".$id."'");
                         if($con->total_records($query_teacher) != 0){
                            $x=0;
                            $data=array();
                            
                            while($row_teacher = mysqli_fetch_array($query_teacher)) {
                                $data[$x]["id"]=intval($row_teacher['id']);
                                $data[$x]["itemImgPath"]=$row_teacher['itemImgPath'];
                                $x++;
                            }
                                $state=array(
                                    "itemImgPath"=>$image_name
                                );
                        		$insertUser = $con->update("tbl_item",$state," where id='".$id."'");
                    					// $user_id = mysqli_insert_id();
                    					//print_r($userid);die();
                    					header('Content-type: application/json');
                    					echo json_encode(array("status"=>1,"message"=>"Image updated Successfully."));
        	           }else{
                        header('Content-type: application/json');
                        echo json_encode(array("status"=>0,"message"=>"Error in Image Upload"));
                        }
                    }
        }
    }
?>