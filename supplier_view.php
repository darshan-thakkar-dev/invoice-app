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

    	$query_teacher=$con->select_query("tbl_sup","*","","");
            if($con->total_records($query_teacher) != 0)
            {
                $x=0;
                $TeacherList=array();
                while($row_teacher = mysqli_fetch_array($query_teacher))
                {
                        $TeacherList[$x]["id"]=intval($row_teacher['id']);
                        $TeacherList[$x]["f_name"]=$row_teacher['f_name'];
                        $TeacherList[$x]["m_name"]=$row_teacher['m_name'];
                        $TeacherList[$x]["l_name"]=$row_teacher['l_name'];
                        $TeacherList[$x]["company_name"]=$row_teacher['company_name'];
                        $TeacherList[$x]["code"]=$row_teacher['code'];
                        $TeacherList[$x]["gst"]=$row_teacher['gst'];
                        $TeacherList[$x]["address"]=$row_teacher['address'];
                        $TeacherList[$x]["pan"]=$row_teacher['pan'];
                        $TeacherList[$x]["permenant_mo"]=$row_teacher['permenant_mo'];
                        $TeacherList[$x]["alt_mo"]=$row_teacher['alt_mo'];
                        $TeacherList[$x]["email"]=$row_teacher['email'];
                        $TeacherList[$x]["website"]=$row_teacher['website'];
                        $TeacherList[$x]["image_name"]=$row_teacher['image_name'];
                         $x++;
                        
                    }
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>$TeacherList,"message"=>"Supplier Listed Successfully."));
                }else{
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>array(),"message"=>"Supplier Listed Successfully."));
                }
?>