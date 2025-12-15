<?php
$host = "localhost";
$db   = "test_db";      
$user = "root";         
$pass = "";        
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
    ]);
} catch (PDOException $e) {
    die("Chyba připojení: " . htmlspecialchars($e->getMessage()));
}

$sql = "SELECT id, name, email FROM students ORDER BY id DESC";
$stmt = $pdo->query($sql);


$rows = $stmt->fetchAll(); 
?>
<!doctype html>
<html lang="cs">
<head>
  <meta charset="utf-8">
  <title>Výpis z DB (PDO)</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f6f7fb; margin: 0; padding: 24px; }
    .wrap { max-width: 900px; margin: 0 auto; }
    h1 { margin: 0 0 16px; }
    table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 10px; overflow: hidden; }
    th, td { padding: 12px 14px; border-bottom: 1px solid #eee; text-align: left; }
    th { background: #111827; color: #fff; font-weight: 600; }
    tr:hover td { background: #f9fafb; }
    .empty { padding: 14px; background: #fff; border-radius: 10px; }
    .badge { display:inline-block; padding:2px 8px; border-radius: 999px; background:#e5e7eb; font-size: 12px; }
  </style>
</head>
<body>
<div class="wrap">
  <h1>Data z databáze <span class="badge">PDO + query + fetchAll</span></h1>

  <?php if (count($rows) === 0): ?>
    <div class="empty">V tabulce nejsou žádná data.</div>
  <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Jméno</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $r): ?>
          <tr>
            <td><?= htmlspecialchars($r->id) ?></td>
            <td><?= htmlspecialchars($r->name) ?></td>
            <td><?= htmlspecialchars($r->email) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

</div>
</body>
</html>