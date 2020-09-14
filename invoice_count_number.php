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

    	$query_teacher=$con->select_query("tbl_invoice_count","*","","");
            if($con->total_records($query_teacher) != 0) {
                $x=0;
                $TeacherList=array();
                while($row_teacher = mysqli_fetch_array($query_teacher)){
                        $TeacherList[$x]["count"]=$row_teacher['count']+1;
                        $x++;                        
                }
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>$TeacherList,"message"=>"Invoice count got Successfully."));
                }else{
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>array("count"=>"1"),"message"=>"Invoice count got Successfully."));
                }
?>