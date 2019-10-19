<?php
$dir_path = "detections/";
$extensions_array = array('jpg','png','jpeg');
if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            //echo "File Name -> $files[$i]<br>";
            
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            //echo "File Extension-> $extension<br>";
            
           // check file extension
        if(in_array($extension, $extensions_array))
            {
            // show image
            	if($files[$i]){
            echo "<img src='$dir_path$files[$i]' style='width:500px;height:500px;'><br>";
        }else{
        	echo "loooosdef";
            }
        }
        }
    }
}
?>