<?php 
// Script pour tester le mode insert 
$con = new Mongo();
$db = $con->selectDB("bdb");
$text = utf8_encode("Les big data, littéralement les « grosses données », ou mégadonnées (recommandé2), parfois appelées données massives3, désignent des ensembles de données qui deviennent tellement volumineux qu'ils en deviennent difficiles à travailler avec des outils classiques de gestion de base de données ou de gestion de l'information. L'on parle aussi de datamasse4 en français par similitude avec la biomasse");
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
