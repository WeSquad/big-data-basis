<?php 
// Script pour tester le mode insert 
$con = new Mongo();
$db = $con->selectDB("bdb");
$text = utf8_encode("Les big data, litt�ralement les � grosses donn�es �, ou m�gadonn�es (recommand�2), parfois appel�es donn�es massives3, d�signent des ensembles de donn�es qui deviennent tellement volumineux qu'ils en deviennent difficiles � travailler avec des outils classiques de gestion de base de donn�es ou de gestion de l'information. L'on parle aussi de datamasse4 en fran�ais par similitude avec la biomasse");
$article = array("titre" => 'Bigdata', 
             "texte" => $text, 
             "date" =>  '2015-02-18', 
             "auteur" => 'slenglet',
			 "logo" => 'bigdata.jpg',
			 "urlVideo" =>'https://www.youtube.com/embed/CfN-7oIwqNI'             
        );

$db->articles->insert($article);
$collectionArticles = $db->articles;
$query = array( "titre" => "Hadoop");
$article = $collectionArticles->findOne($query);

/*
$collection = new MongoCollection($db, 'articles');

$query = array('titre' => $_REQUEST["rubrique"]);

$cursor = $collection->find($query);

foreach ($cursor as $doc) {
    echo("var da = jsoncallback( ".json_encode($doc).");");
}*/


?>
