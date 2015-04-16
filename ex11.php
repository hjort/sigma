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
	$rid = 1;

	$nlist = array();
	$elist = array();

	// TODO: buscar também entidades do tipo SEmpresa
	$start = $request->get('start', 'n1');//NULL);
	//$degrees = (integer)$request->get('degrees', 3);
	$queryTemplate = <<<QUERY
MATCH (n:SPessoa)-[r*0..2]-(p)
WHERE n.id = {start}
RETURN DISTINCT p, r
QUERY;

	# https://github.com/jadell/neo4jphp/blob/master/examples/cypher.php
	$cypher = new Query($neo4j, $queryTemplate, array('start'=>$start));
		//, array('start'=>$start)); //, 'degrees'=>$degrees));
	$result = $cypher->getResultSet();
	foreach ($result as $row) {
		
		# https://github.com/jadell/neo4jphp/tree/master/lib/Everyman/Neo4j
		$nid = $row['p']->getId();
		$data = $row['p']->getProperties();
		$labels = $row['p']->getLabels();
		$tipo = ($labels[0]->getName() == 'SPessoa' ? 1 : 2);

		# http://php.net/manual/pt_BR/function.in-array.php
		if (!in_array($nid, $nlist)) {
			$nodes[] = array('id' => strval($nid), 'label' => $data['label'],
				'cod' => $data['id'], 'tipo' => $tipo,
				'sexo' => ($tipo == 1 ? $data['sexo'] : NULL));
			$nlist[] = $nid;
		}

		if ($row['r']->count() > 0) {
			foreach ($row['r'] as $rel) {
				$snid = $rel->getStartNode()->getId();
				$enid = $rel->getEndNode()->getId();
				$eid = $snid . '>' . $enid;
				if (!in_array($eid, $elist)) {
					$edges[] = array('id' => strval($rid++),
						'source' => strval($snid), 'target' => strval($enid));
					$elist[] = $eid;
				}
			}
		}
	}

	/*print_r($nlist);
	print_r($elist);
	exit(0);*/
	return json_encode(array('nodes' => $nodes, 'edges' => $edges));
});

$app->run();
?>
