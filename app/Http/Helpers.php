<?php 
   function menuStore ($data,$parent_id = 0,$str="---|",$select=0){
        foreach ($data as $val) {
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent_id) {
                if ($select !=0 && $id == $select) {
                    echo '<option value="'.$id.'"selected>'.$str." ".$name.'</option>';
                }else{
                    echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
                }
                menuStore ($data,$id,$str." ---|",$select);
            }

        }
    }
    
 ?>