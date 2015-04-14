CREATE
(n1:SPessoa {id: "n1", label: "Jose", sexo: 1}),
(n2:SPessoa {id: "n2", label: "Maria", sexo: 2}),
(n3:SPessoa {id: "n3", label: "Carlos", sexo: 1}),
(n4:SPessoa {id: "n4", label: "Alice", sexo: 2}),
(n5:SPessoa {id: "n5", label: "Bianca", sexo: 2}),
(n6:SPessoa {id: "n6", label: "Diego", sexo: 1}),
(n7:SPessoa {id: "n7", label: "Helen", sexo: 2}),
(n8:SPessoa {id: "n8", label: "Elimar", sexo: 1}),
(n9:SEmpresa {id: "n9", label: "Bar do Jair"}),
(n10:SEmpresa {id: "n10", label: "Max Lanches"}),
(n11:SPessoa {id: "n11", label: "Jair", sexo: 1}),
(n1)-[:REL]->(n2),
(n3)-[:REL]->(n1),
(n3)-[:REL]->(n2),
(n4)-[:REL]->(n1),
(n4)-[:REL]->(n2),
(n5)-[:REL]->(n1),
(n5)-[:REL]->(n2),
(n6)-[:REL]->(n5),
(n7)-[:REL]->(n5),
(n8)-[:REL]->(n5),
(n1)-[:REL]->(n9),
(n2)-[:REL]->(n10),
(n3)-[:REL]->(n10),
(n11)-[:REL]->(n9)

MATCH (p:SPessoa), (e:SEmpresa) RETURN *

