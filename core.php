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

function indexToJson($url){
	$html = file_get_html($url);
	$graph = $html->find('select[name=graph]');
	$optgroup = $graph[0]->find('optgroup');
	$result=array();
	$when = array("1day"=>"Daily","1week" => "Weekly","1month" => "Monthly","1year" => "Yearly");
	$out = array();
	foreach ($optgroup as $k1 => $element) {
		//echo $element-> label;
		$in =array();
		foreach($element->find('option') as $k2 => $element2){
			$in[$element2->value] = $element2->plaintext;
		}
		$out[$element-> label] = $in;
	}
	$result['when'] = $when;
	$result['graph'] = $out;
	return json_encode($result);
}