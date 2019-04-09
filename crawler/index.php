<?php
include("simple.html");
include_once('simple_html_dom.php');
$html = new simple_html_dom("https://timesofindia.indiatimes.com/");
if(isset($_POST['crawl'])){
    $crawl = $_POST['target'];
    $find = "https://timesofindia.indiatimes.com/elections/lok-sabha-elections-2019/chhattisgarh/news/chhattisgarh-mla-five-security-personnel-killed-in-maoist-attack-in-bastar/articleshow/68797096.cms";
   //   $title=$html->find("div#app");
    echo $title;
    if(strpos($crawl,$find)!==false){
    $html->load_file($crawl);
    foreach($html->find('a') as $link)
    {
        if(strpos($link,"$crawl")!==false){
            echo "<p class='links'>".$link->href."</p>";
        }
        else if(strpos($link,"http://")!==false || strpos($link,"https://")!==false){
            echo "<p class='links'>".$link->href."</p>";
        }
        else{
            echo "<p class='links'>"."$crawl/".$link->href."</p>";
        }
    }
    }
    else{
        echo "Invalid URL";
    }
}
?>