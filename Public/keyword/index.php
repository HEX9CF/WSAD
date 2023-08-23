<?php
header("Content-Type:text/html; charset=utf-8");
define('Public/keyword', str_replace('\\', '/', dirname(__FILE__)));

function get_tags_arr($title){
		require('Public/keyword/pscws4.class.php');
        $pscws = new PSCWS4();
		$pscws->set_dict('Public/keyword/scws/dict.utf8.xdb');
		$pscws->set_rule('Public/keyword/scws/rules.utf8.ini');
		$pscws->set_ignore(true);
		$pscws->send_text($title);
		$words = $pscws->get_tops(5);
		$tags = array();
		foreach ($words as $val) {
		    $tags[] = $val['word'];
		}
		$pscws->close();
		return $tags;
}

function get_keywords_str($content){
	require('Public/keyword/phpanalysis.class.php');
	PhpAnalysis::$loadInit = false;
	$pa = new PhpAnalysis('utf-8', 'utf-8', false);
	$pa->LoadDict();
	$pa->SetSource($content);
	$pa->StartAnalysis( false );
	$tags = $pa->GetFinallyResult();
	return $tags;
}
