<?php
if (!isset($newsData)) {
    header("Location: ../controllers/NewsController.php");
    exit();
}
include __DIR__ . "/header.php";
?>
<h2 style="text-align: center;">Latest Business News in Malaysia</h2>
<?php if (isset($newsData["error"])): ?>
 <p style="text-align: center; color: red;"><?php echo $newsData[
     "error"
 ]; ?></p>
<?php elseif (!empty($newsData) && is_array($newsData)): ?>
 <div style="width: 80%; margin: auto;">
 <?php foreach ($newsData as $article): ?>
 <div style="border-bottom: 1px solid #ddd; padding: 10px;">
 <h3><?php echo $article["title"]; ?></h3>
 <p><?php echo isset($article["description"])
     ? $article["description"]
     : "No
description available."; ?></p>
 <p><a href="<?php echo $article["link"]; ?>" target="_blank">Read
more</a></p>
 </div>
 <?php endforeach; ?>
 </div>
<?php else: ?>
 <p style="text-align: center;">No business news articles available at the
moment.</p>
<?php endif; ?>
<?php include __DIR__ . "/footer.php"; ?>
