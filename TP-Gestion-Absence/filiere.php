<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des filieres</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ajouter une filiere
    if (isset($_POST["ajouter"])) {
        $nomfiliere = $_POST["nom"];
        $idDe = $_POST["idDe"];  // Corrected line
        $sql = "INSERT INTO filiere (nom, idDe) VALUES ('$nomfiliere', '$idDe')";
        $conn->query($sql);
    }
    // Modifier une filiere
    elseif (isset($_POST["modifier"])) {
        $id = $_POST["id"];
        $nouveauNom = $_POST["nouveauNom"];
        $sql = "UPDATE filiere SET nom = '$nouveauNom' WHERE id = $id";
        $conn->query($sql);
    }
    // Supprimer une filiere
    elseif (isset($_POST["supprimer"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM filiere WHERE id = $id";
        $conn->query($sql);
    }
}


$sql = "SELECT id, nom ,idDe FROM filiere";
$result = $conn->query($sql);
?>

<h2>Liste des filieres</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom du filiere</th>
            <th>idDe</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <form method='post' action='index.php'>
    <button type='submit' name='départements'>départements</button>
    </form>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nom']}</td>
                        <td>{$row['idDe']}</td>
                        <td>
                            <form method='post' action='filiere.php'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <input type='text' name='nouveauNom' placeholder='Nouveau nom' required>
                                <button type='submit' name='modifier'>Modifier</button>
                            </form>
                            <form method='post' action='filiere.php'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' name='supprimer'>Supprimer</button>
                        </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Aucune filiere trouvé.</td></tr>";
        }
        ?>
    </tbody>
</table>

<form method="post" action="filiere.php">
    <h2>Ajouter une filiere</h2>
    <label for="nom">Nom du filiere :</label>
    <input type="text" name="nom" required>
    <label for="idDe">idDe :</label>
    <input type="text" name="idDe" required>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<?php
$conn->close();
?>

</body>
</html>
