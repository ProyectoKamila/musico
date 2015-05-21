<?php
include '../../../wp-config.php';
$ciudad = 'Ciudad';
$state_array = array("" => $ciudad);
//$state_array = array("" => __('Ciudad', 'framework'));
if ($_POST['estado']) {
    $state_posts = $_POST['estado'];
    function Conectarse() {
        //if (!($link = mysql_connect("localhost", DB_USER, DB_PASSWORD))) {
    if (!($link = mysql_connect("mysql.wedomedia.net", 'kami', '8caracteres'))) {
        echo "Error conectando a la base de datos.";
        exit();
    }
    //if (!mysql_select_db(DB_NAME, $link)) {
    if (!mysql_select_db('wedokami', $link)) {
        echo "Error seleccionando la base de datos.";
        exit();
    }
    mysql_set_charset('utf8',$link);
    return $link;
}

$link = Conectarse();
$name = $_POST['estado'];
$sql = "SELECT * FROM `wp_posts` WHERE `post_title` = '".$name."'";

$resul1 = mysql_query($sql, $link);
$ab1 = mysql_fetch_array($resul1);

$r = $ab1['ID'];

//debug($name);

//SELECT * FROM `wp_posts` WHERE `post_title` = 'Venezuela'
 $sql1 = "SELECT wp_posts.post_title,wp_postmeta.post_id FROM wp_postmeta,wp_posts WHERE  `meta_key` = 'state_meta_box_country' AND `meta_value` = $r AND wp_postmeta.post_id = wp_posts.ID
";
//var_dump($sql1);
$resul = mysql_query($sql1, $link);
?>
    <option>Seleccione</option>
    <?php
    
while ($ab = mysql_fetch_array($resul)) {    //var_dump($ab['nombre']);
//    echo $ab['post_title']."<br>";
    ?>

    <option value="<?= $ab['post_title'] ?>"><?= $ab['post_title'] ?></option>
<?php
}
}


        