<?php
# http://stackoverflow.com/questions/21874854/how-do-i-execute-this-cypher-query-its-json-over-php-curl-to-neo4js-rest-api
# http://neo4j.com/docs/stable/rest-api-cypher.html
$data = array(
	"query" => "MATCH (p:SPessoa), (e:SEmpresa) RETURN *;",
	"params" => NULL #array("name" => "Tom Hanks", "title" => "Forrest Gump")
);
$data = json_encode($data);  
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://localhost:7474/db/data/cypher/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	'Accept: application/json; charset=UTF-8',
	'Content-Type: application/json',
	'Content-Length: ' . strlen($data),
	'X-Stream: true'));
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($curl);
curl_close($curl);
echo $res;
?>
