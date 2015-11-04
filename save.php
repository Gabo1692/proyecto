<?php
function getConnection() {
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='alphagabo21';
    $dbname='Proyecto_Desarrollo web';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

function addUser($pmail,$pname,$pphone) {
  $sql = 'INSERT INTO Newsletter (name, mail, phone) VALUES (:name,:mail,:phone)';
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mail', $pmail);
    $stmt->bindParam(':name', $pname);
    $stmt->bindParam(':phone', $pphone);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

$name=$_POST['name'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
addUser($mail,$name,$phone);

?>