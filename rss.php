<?php
// Replace with the URL of the RSS feed you want to retrieve
// $url = 'https://www.militarytimes.com/arc/outboundfeeds/rss/category/news/your-military/?outputType=xml';
// $url = 'https://rss.nytimes.com/services/xml/rss/nyt/US.xml';
// $url = 'https://rss.nytimes.com/services/xml/rss/nyt/World.xml';

// $url = 'https://moxie.foxnews.com/google-publisher/latest.xml';
// $url = 'https://www.military.com/rss-feeds/content?keyword=army&type=news';
// $url = 'https://moxie.foxnews.com/google-publisher/travel.xml';
// $url = 'https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml';
// $url = 'https://moxie.foxnews.com/google-publisher/latest.xml';
// $url = 'https://www.military.com/rss-feeds/content?keyword=army&type=news';
// $url = 'http://localhost/slack/brm.php';
// $url = 'http://www.fhblogs.com/index.php?s=13&typ=all&t=1&prog=pps&id=house';

// $url = 'https://rss.app/feeds/ttxXAtyZCpiZzjLv.xml';
// $url = 'https://rss.app/feeds/OFTdCH7iu863BSl6.xml';
$url = 'http://www.adultvideodump.com/rss.php?type=11&limit=15';

// https://rss.app/feed/ttxXAtyZCpiZzjLv generate rss feed

// Create a new instance of the DOMDocument class
$dom = new DOMDocument();
// Load the RSS feed
if (!$dom->load($url)) {
    exit('Failed to load RSS feed! Please check the URL!');
}
// Retrieve the items from the RSS feed
$items = $dom->getElementsByTagName('item');
// Below function will convert datetime to time elapsed string.

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>News Feed</title>
		<link href="style.css" rel="stylesheet" type="text/css">

        <style>
            .header {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 80px 0;
  }
  .header .title {
    margin: 0;
    padding: 0;
    color: #3f4754;
    font-size: 34px;
  }
  .header .title::after {
    content: " ";
    display: inline-block;
    width: 50%;
    transform: translate(50%, 0);
    border-bottom: 4px solid #dee2e7;
  }
  .items {
    display: flex;
    flex-flow: column;
    align-items: flex-start;
    max-width: 850px;
    width: 100%;
    margin: 0 auto;
    padding: 0 2px;
  }
  .items .item {
    display: flex;
    text-decoration: none;
    margin-bottom: 40px;
  }
  .image {
    border-radius: 15px;
    max-width: 200px;
  }
  .items .item .details {
    padding-left: 10px;
  }
  .items .item .details .title {
    margin: 0;
    padding: 10px 0;
    color: #556071;
    font-size: 24px;
  }
  .items .item .details .date {
    display: block;
    color: #b3bac6;
    font-size: 14px;
    font-weight: 500;
    padding-top: 10px;
  }
  .items .item .details .description {
    color: #8792a5;
    font-size: 16px;
    margin: 0;
    padding: 5px 0;
  }
  .create-news {
    display: flex;
    flex-flow: column;
    width: 100%;
    max-width: 500px;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
  }
  .create-news h1 {
    margin: 0;
    padding: 25px 20px;
    font-size: 20px;
    font-weight: 500;
    color: #3f4754;
    border-bottom: 1px solid #eff2f5;
  }
  .create-news form {
    display: flex;
    flex-flow: column;
    align-items: flex-start;
    padding: 20px;
  }
  .create-news form label {
    font-weight: 500;
    font-size: 14px;
    color: #74787c;
    padding-bottom: 10px;
  }
  .create-news form label .required {
    color: #ff1212;
    margin-right: 5px;
  }
  .create-news form input, .create-news form textarea {
    margin-bottom: 20px;
    width: 100%;
    padding: 10px;
    border: 1px solid #dee1e6;
    border-radius: 4px;
    font-size: 16px;
  }
  .create-news form input:focus, .create-news form textarea:focus {
    outline: none;
    border-color: #3f4754;
  }
  .create-news form input::placeholder, .create-news form textarea::placeholder {
    color: #a2a4a8;
  }
  .create-news form button {
    appearance: none;
    padding: 10px 15px;
    margin-top: 5px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
    background-color: #167cdb;
    color: #FFFFFF;
    cursor: pointer;
    box-shadow: 0 0 7px rgba(0, 0, 0, 0.15);
    transition: background-color ease 0.2s;
  }
  .create-news form button:hover {
    background-color: #292e37;
  }
  .create-news form .msg {
    margin: 0;
    padding: 5px 0 20px 0;
    font-size: 14px;
    font-weight: 500;
  }
  .create-news form .msg.success {
    color: #07b94c;
  }
  .create-news form .msg.error {
    color: #be2c2c;
  }
        </style>
        
	</head>
	<body>
	    <header class="header">
            <h1 class="title"></h1>
        </header>

		<main class="items">
			<?php foreach ($items as $item): ?>
            <a href="<?=$item->getElementsByTagName('link')->item(0)->textContent?>" class="item">
                <?php if ($item->getElementsByTagName('enclosure')->length): ?>
                <img class="image" style="width:200px;height:200px;" src="<?=$item->getElementsByTagName('enclosure')->item(0)->getAttribute('url')?>" 
                    alt="<?=$item->getElementsByTagName('title')->item(0)->textContent?>">
                <?php endif; ?>
                <div class="details">
                    <span class="date" title="<?=$item->getElementsByTagName('pubDate')->item(0)->textContent?>"><?=time_elapsed_string($item->getElementsByTagName('pubDate')->item(0)->textContent)?></span>
                    <!-- <h2 class="title"><?=$item->getElementsByTagName('title')->item(0)->textContent?></h2> -->
                    <p class="description"><?=$item->getElementsByTagName('description')->item(0)->textContent?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </main>
	</body>
</html>


      <!-- get date  -->
      <?php
        function getDateOnly($d) {
              $mydatetime = $d;
              $datetimearray = explode(" ", $mydatetime);
              $date = $datetimearray[0];
              $time = $datetimearray[1];
              $reformatted_date = date('F j, Y',strtotime($date)); // March 10, 2001
              // $reformatted_date = date('m-d-y',strtotime($date)); // 03.10.01
              $reformatted_time = date('g:i a',strtotime($time));  
              return $reformatted_date . ' ' . $reformatted_time;
          };
          function getDateTimeDifferenceString() {
            return;
          }
      ?>

      <!-- time elapsed  -->
      <?php function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $w = floor($diff->d / 7);
        $diff->d -= $w * 7;
        $string = ['y' => 'year','m' => 'month','w' => 'week','d' => 'day','h' => 'hour','i' => 'minute','s' => 'second'];
        foreach ($string as $k => &$v) {
            if ($k == 'w' && $w) {
                $v = $w . ' week' . ($w > 1 ? 's' : '');
            } else if (isset($diff->$k) && $diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
      }?>




<script>
  
</script>

