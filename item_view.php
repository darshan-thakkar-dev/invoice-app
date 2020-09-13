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

    	$query_teacher=$con->select_query("tbl_item","*","","");
            if($con->total_records($query_teacher) != 0) {
                $x=0;
                $TeacherList=array();
                while($row_teacher = mysqli_fetch_array($query_teacher))
                {

                        $uom = array();
                        $TeacherList[$x]["id"]=intval($row_teacher['id']);
                        $TeacherList[$x]["itemName"]=$row_teacher['itemName'];
                        $TeacherList[$x]["itemType"]=$row_teacher['itemType'];
                        $TeacherList[$x]["itemDesc"]=$row_teacher['itemDesc'];
                        $TeacherList[$x]["itemImgPath"]=$row_teacher['itemImgPath'];
                        $TeacherList[$x]["uomModel"]=$row_teacher['uomModel'];
                        $id =$TeacherList[$x]["uomModel"];
                        // echo $id;
                        $TeacherList[$x]["itemStock"]=$row_teacher['itemStock'];
                        // $uom = $con->select_query("tbl_uom","*","Where id='".$id."'");
                        
                        $run=$con->select_query("tbl_uom","*","Where id='".$id."'");
                            /*$uom_qry= "SELECT * FROM `tbl_uom` WHERE id='$id'";
                            $run = mysqli_query($con,$qry);*/
                            // echo $con;
                            // if(mysqli_num_rows($run)>0){
                                
                            // echo serialize($run);
                                foreach ($run as $d ) {
                                    # code...
                                        $uom['id']=$d['id'];
                                        $uom['uom_name']=$d['uom_name'];
                                        $uom['uom_desc']=$d['uom_desc'];
                                        $uom['unit']=$d['unit'];
                                        $uom['con_uom_id']=$d['con_uom_id'];
                                        // echo $uom;
                                        $TeacherList[$x]['uom'] = $uom;
                                }          
                            // }
                            $x++;                        
                    }
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>$TeacherList,"message"=>"Item Listed Successfully."));
                }else{
                    header('Content-type: application/json');
                    echo json_encode(array("status"=>1,"details"=>array(),"message"=>"Item Listed Successfully."));
                }
?>