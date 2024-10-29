<?php
$articleId = $_GET['id'];


$pdo = new PDO('mysql:host=localhost;dbname=article', 'Vibe', null);


$stmt = $pdo->prepare('SELECT  image, paragraph1, paragraph2, paragraph3, paragraph4, title, linkyt, date FROM content WHERE id = ?');
$stmt->execute([$articleId]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if ($article) {
    
    $image = $article['image'];
    $paragraph1 = $article['paragraph1'];
    $paragraph2 = $article['paragraph2'];
    $date = $article['date'];
    $title = $article['title'];
    $linkyt = $article['linkyt'];
    $paragraph3 = $article['paragraph3'];
    $paragraph4 = $article['paragraph4'];
} else {
   
    $image = "";
    $paragraph1 = "Sorry, the article you're looking for doesn't exist.";
    $paragraph2 = "";
    $date = "";
    $title = "";
} 
?>