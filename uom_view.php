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

    	$query_teacher=$con->select_query("tbl_uom","*","","");
            if($con->total_records($query_teacher) != 0)
            {
                $x=0;
                $TeacherList=array();
                while($row_teacher = mysqli_fetch_array($query_teacher))
                {
                        $TeacherList[$x]["id"]=intval($row_teacher['id']);
                        $TeacherList[$x]["uom_name"]=$row_teacher['uom_name'];
                        $TeacherList[$x]["uom_desc"]=$row_teacher['uom_desc'];
                        $TeacherList[$x]["unit"]=$row_teacher['unit'];
                        $TeacherList[$x]["con_uom_id"]=$row_teacher['con_uom_id'];
                        $x++;
                        
                    }
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>$TeacherList,"message"=>"UOM Listed Successfully."));
                }else{
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>array(),"message"=>"UOM Listed Successfully."));
                }
?>