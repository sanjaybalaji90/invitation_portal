<?php  
	echo 'testing';
	
	
	
$target_dir    = "uploads/";
$target_file   = $target_dir . basename($_FILES["uploadFile"]["name"]);
$uploadOk      = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST['submit']) && !empty($_POST['submit'])) {

    $salutation  = $_POST['salutation'];
    $name  = $_POST['name'];
    $email     = $_POST['email'];
    $group_id  = $_POST['group_id'];
    $group_name  = $_POST['group_name'];
    $alone     = $_POST['alone'];  
	$spouse  = $_POST['spouse'];
    $childs  = $_POST['childs'];
    $others     = $_POST['others'];
    $group_id  = $_POST['group_id'];
    $group_name  = $_POST['group_name'];
    $alone     = $_POST['alone'];


   $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["bulkupload"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['bulkupload']['name'];
        move_uploaded_file($_FILES['bulkupload']['tmp_name'], $targetPath);
     $excel = new PhpExcelReader;
    $excel->read( $targetPath);
function sheetData($sheet) {
    $sheet_data= array('');
  $x = 1;
  while($x <= $sheet['numRows']) {
   
    $y = 1;
    while($y <= $sheet['numCols']) {
      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
    array_push($sheet_data,$cell);
      $y++;
    }  
    
    $x++;
  }
 $removed = array_shift($sheet_data);
return $sheet_data;
//print_r($sheet_data);

}

$nr_sheets = count($excel->sheets);       // gets the number of sheets
$excel_data ;              // to store the the html tables with data of each sheet

// traverses the number of sheets and sets html table with each sheet data in $excel_data
for($i=0; $i<$nr_sheets; $i++) {
  //$excel_data .= '<h4>Sheet '. ($i + 1) .' (<em>'. $excel->boundsheets[$i]['name'] .'</em>)</h4>'. sheetData($excel->sheets[$i]) .'<br/>';  
  //echo 'hai';
  $excel_data =  sheetData($excel->sheets[$i]);
  
}
?>

