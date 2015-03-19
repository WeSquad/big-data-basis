<?php 
$con = new Mongo();
$db = $con->selectDB("bdb");
/*$text = utf8_encode("MapReduce est un patron d'architecture de développement informatique, inventé par Google1, dans lequel sont effectués des calculs parallèles, et souvent distribués, de données potentiellement très volumineuses, typiquement supérieures en taille à 1 téraoctet.Les termes « map » et « reduce », et les concepts sous-jacents, sont empruntés aux langages de programmation fonctionnelle utilisés pour leur construction (map et réduction de la programmation fonctionnelle et des langages de programmation tableau).MapReduce permet de manipuler de grandes quantités de données en les distribuant dans un cluster de machines pour être traitées");
				
$article = array("titre" => 'MapReduce', 
             "texte" => $text, 
             "date" =>  '2015-02-17', 
             "auteur" => 'slenglet',
			 "logo" => 'mapreduce.png',
			 "urlVideo" =>'https://www.youtube.com/embed/HFplUBeBhcM'             
        );

$db->articles->insert($article);
$collectionArticles = $db->articles;
$query = array( "titre" => "Hadoop");
$article = $collectionArticles->findOne($query);*/


$collection = new MongoCollection($db, 'articles');

$query = array('titre' => $_REQUEST["rubrique"]);

$cursor = $collection->find($query);

foreach ($cursor as $doc) {
    echo("jsoncallback( ".json_encode($doc).");");
}


?>
