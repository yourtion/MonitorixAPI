<?php
include_once('simple_html_dom.php');

function pageToJson($url){
	$html = file_get_html($url);
	$resualt = array();
	foreach ($html->find('table') as $k1 => $element) {
		$temp = array();
		if ($k1 != 0) {
			$td = $element->find("tr td");
			foreach ($td as $k2 => $r) {
				if ($k2 != 0) {
					foreach ($r->find('a') as $element2) {
						preg_match("/(http)((.*).(gif|jpg|jpeg|png|bmp))/isu", $element2->href, $a);
						//echo "-" . souceToName($a[0]);
						$temp[souceToName($a[0])] = imgUrl($a[0]);
					}
				}
			}
			//echo trim(str_replace("&nbsp;", "", $td[0]->plaintext)) . " <br />";
			$resualt[trim(str_replace("&nbsp;","",$td[0]->plaintext))] = $temp;
		}
	}
	return json_encode($resualt);
}