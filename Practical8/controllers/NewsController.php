<?php
require_once __DIR__ . "/../models/News.php";
class NewsController
{
    private $news;
    public function __construct()
    {
        $this->news = new News();
    }
    public function getNewsData()
    {
        return $this->news->getNewsData();
    }
    public function displayNews()
    {
        $newsData = $this->getNewsData();
        include __DIR__ . "/../views/news.php";
    }
}
$newsController = new NewsController();
$newsController->displayNews();
?>
