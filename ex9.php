<?php
echo '{
"nodes":[
	{"id": "n1", "label": "Jose", "sexo": 1, "tipo": 1},
	{"id": "n2", "label": "Maria", "sexo": 2, "tipo": 1},
	{"id": "n3", "label": "Carlos", "sexo": 1, "tipo": 1},
	{"id": "n4", "label": "Alice", "sexo": 2, "tipo": 1},
	{"id": "n5", "label": "Bianca", "sexo": 2, "tipo": 1},
	{"id": "n6", "label": "Diego", "sexo": 1, "tipo": 1},
	{"id": "n7", "label": "Helen", "sexo": 2, "tipo": 1},
	{"id": "n8", "label": "Elimar", "sexo": 1, "tipo": 1},
	{"id": "n9", "label": "Bar do Jair", "tipo": 2},
	{"id": "n10", "label": "Max Lanches", "tipo": 2},
	{"id": "n11", "label": "Jair", "sexo": 1, "tipo": 1}
],
"edges":[
	{"id": "e1", "source": "n1", "target": "n2"},
	{"id": "e2", "source": "n3", "target": "n1"},
	{"id": "e3", "source": "n3", "target": "n2"},
	{"id": "e4", "source": "n4", "target": "n1"},
	{"id": "e5", "source": "n4", "target": "n2"},
	{"id": "e6", "source": "n5", "target": "n1"},
	{"id": "e7", "source": "n5", "target": "n2"},
	{"id": "e8", "source": "n6", "target": "n5"},
	{"id": "e9", "source": "n7", "target": "n5"},
	{"id": "e10", "source": "n8", "target": "n5"},
	{"id": "e11", "source": "n2", "target": "n1"},
	{"id": "e12", "source": "n1", "target": "n9"},
	{"id": "e13", "source": "n2", "target": "n10"},
	{"id": "e14", "source": "n3", "target": "n10"},
	{"id": "e15", "source": "n11", "target": "n9"}
]}';
?>
