
<?php
include $_SERVER['DOCUMENT_ROOT'].'\vote_sys\resources\config\config.php';
header("Access-Controle-Allow-Origin: *");
$xml = new XMLWriter();
$xml->openURI("php://output");
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$get_users = "SELECT * FROM user";
$get_users = $db_conn->prepare($get_users);
$get_users->execute();
$res_users = $get_users->fetchAll(PDO::FETCH_ASSOC);

foreach($res_users as $user => $val){
    $xml->startElement("test");
        $xml->writeAttribute("user_id", $res_users['user_id']);
        $xml->writeRaw($res_users['first_name']." ".$res_users['last_name']);
    $xml->endElement();
}

header('Content-type: text/xml');
$xml->flush();
?>