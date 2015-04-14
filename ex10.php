<?php
# curl -v 'http://localhost/sigma/ex10.php' | less
use Silex\Application,
	Symfony\Component\HttpFoundation\Request,
	Everyman\Neo4j\Client,
	Everyman\Neo4j\Cypher\Query;

require __DIR__.'/vendor/autoload.php';

$app = new Application();
$app['debug'] = true;

$neo4j = new Client();

# https://github.com/neo4j-contrib/developer-resources/blob/gh-pages/language-guides/php/neo4jphp/index.php
$app->get('/', function (Request $request) use ($neo4j) {

	$nodes = array();
	$edges = array();

	$cypher = new Query($neo4j, 'MATCH (p:SPessoa) RETURN p');
	$result = $cypher->getResultSet();
	foreach ($result as $row) {
		$data = $row['data']->getProperties();
		$nodes[] = array('id' => $data['id'], 'label' => $data['label'], 'tipo' => 1, 'sexo' => $data['sexo']);
	}

	$cypher = new Query($neo4j, 'MATCH (e:SEmpresa) RETURN e');
	$result = $cypher->getResultSet();
	foreach ($result as $row) {
		$data = $row['data']->getProperties();
		$nodes[] = array('id' => $data['id'], 'label' => $data['label'], 'tipo' => 2);
	}

	# https://github.com/jadell/neo4jphp/blob/master/examples/cypher.php
	$cypher = new Query($neo4j, 'MATCH (a)-[:REL]->(b) RETURN a, b');
	$result = $cypher->getResultSet();
	$id = 1;
	foreach ($result as $row) {
		$data1 = $row['a']->getProperties();
		$data2 = $row['b']->getProperties();
		$edges[] = array('id' => 'e' . $id++, 'source' => $data1['id'], 'target' => $data2['id']);
	}

	return json_encode(array('nodes' => $nodes, 'edges' => $edges));
});

$app->run();
?>
