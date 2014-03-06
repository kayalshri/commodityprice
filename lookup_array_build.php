<?php

$xml=simplexml_load_file("Date-Wise-Prices-all-Commodity.xml");
$xml = dom_import_simplexml($xml);
$nodelist= $xml->getElementsByTagName('Table');  

for($i = 0; $i < $nodelist->length; $i++) {
	$commodity_name[$i] =$nodelist->item($i)->getElementsByTagName('Commodity')->item(0)->nodeValue;
	$district_name[$i] =$nodelist->item($i)->getElementsByTagName('District')->item(0)->nodeValue;
	$market_name[$i] =$nodelist->item($i)->getElementsByTagName('Market')->item(0)->nodeValue;
}

echo "<pre>";

$cval = "\$commodity_name = array(";
foreach (array_unique($commodity_name) as $c){
	$cval .= "'".$c."',";
}
$cval .= ");";
print $cval."<BR><BR>";

$cval = "\$district_name = array(";
foreach (array_unique($district_name) as $c){
	$cval .= "'".$c."',";
}
$cval .= ");";
print $cval."<BR><BR>";

$cval = "\$market_name = array(";
foreach (array_unique($market_name) as $c){
	$cval .= "'".$c."',";
}
$cval .= ");";
print $cval."<BR><BR>";


#print_r(array_unique($commodity_name));
#print_r(array_unique($district_name));
#print_r(array_unique($market_name));
echo "<pre>";

?>
