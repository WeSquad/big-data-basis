<?php 
$con = new Mongo();
$db = $con->selectDB("bdb");
/*$text = utf8_encode("MapReduce est un patron d'architecture de d�veloppement informatique, invent� par Google1, dans lequel sont effectu�s des calculs parall�les, et souvent distribu�s, de donn�es potentiellement tr�s volumineuses, typiquement sup�rieures en taille � 1 t�raoctet.Les termes � map � et � reduce �, et les concepts sous-jacents, sont emprunt�s aux langages de programmation fonctionnelle utilis�s pour leur construction (map et r�duction de la programmation fonctionnelle et des langages de programmation tableau).MapReduce permet de manipuler de grandes quantit�s de donn�es en les distribuant dans un cluster de machines pour �tre trait�es");
				
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
