<?php

# Default Values
$filterContent=(@$_GET['type']) ?:"State";
$filterValue = (@$_GET['val']) ?:"Rajasthan";


$data_url = "http://data.gov.in/api/datastore/resource.json?resource_id=9ef84268-d588-465a-a308-a864a43d0070&api-key=a28a014aed0eb65fe167f0727cc37937&filters[$filterContent]=$filterValue";

# Get The date by cUrl
$ch = curl_init ($data_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
$rawdata=curl_exec($ch);
curl_close ($ch);

# JSON DECODE
$jsonData = json_decode($rawdata,true);

# GET Records
if (count(@$jsonData['records']) != 0){
	# Display Count based on filter
	echo "<tr><td colspan=4>Records Found :".count(@$jsonData['records'])."</td></tr>";
	
	# Table Header
	echo "<tr class='info' ><td><strong>Commodity - Variety </strong> <div class='col-lg-4'>State<br>District<br>Market<br>Arrival_Date</div></td><td>Min Price</td><td>Max</td><td>Modal</td></tr>";

	# Retrience Records
	for ($k=0;$k<=count(@$jsonData['records']);$k++){
	
		# Even column - active class
		$tr_class = ($k & 1) ? "class='active'" : "";
		
		# Print Results
		echo "<tr ".$tr_class." ><td title='State/ District/ Market/ Arrival Date'><strong>".$jsonData['records'][$k]['commodity']." - ".$jsonData['records'][$k]['variety']."</strong> <div class='col-lg-4'>".$jsonData['records'][$k]['state']."<br>".$jsonData['records'][$k]['district']."<br>".$jsonData['records'][$k]['market']."<br>(as on ".$jsonData['records'][$k]['arrival_date'].")</div></td><td>".$jsonData['records'][$k]['min_price']."</td><td>".$jsonData['records'][$k]['max_price']."</td><td>".$jsonData['records'][$k]['modal_price']."</td></tr>";
	}
}else{
	# No Data
	echo "<tr><td colspan=4>No Records Found </td></tr>";
}


?>






