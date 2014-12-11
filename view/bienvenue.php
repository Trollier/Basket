<?php 
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION['flash'])){
    echo "<div class='alert alert-info'>".$_SESSION['flash']."</div>";
    unset($_SESSION["flash"]);
}else{
    
echo '<div class="alert alert-warning">';
echo '<p>site</p> ';
echo '</div>';
}
?>


<img src="" alt="" />
<?php ?>