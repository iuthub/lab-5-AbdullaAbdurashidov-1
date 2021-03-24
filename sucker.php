<?php
if($_REQUEST["name"] & $_REQUEST["cardNumber"] & $_REQUEST["creditCard"] & $_REQUEST["section"])
{
    thanksSucker();
}
else{
    sorrySucker();
}
?>
<!doctype html>
<html>
<head>
    <title>Thanks, sucker!</title>
    <meta charset="UTF-8">
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php function sorrySucker(){?>
    <h1>Sorry</h1>
    You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a>
<?php } ?>
<?php function thanksSucker(){
    $sucker=$_REQUEST["name"]."; ".$_REQUEST["section"]."; ".$_REQUEST["cardNumber"]."; ".$_REQUEST["creditCard"];
    $suckers=file("suckers.txt");
    $flag=false;
    foreach ($suckers as $one){
        if(strcmp($one,$sucker))
            $flag=true;
    }
    if(!$flag) {
        file_put_contents("suckers.txt", $sucker . "\n", FILE_APPEND);
    }
    ;?>
    <h1>Thanks sucker!</h1>
    Your information has been recorded.

    <ol>
        <li>Name</li>
            <ol>
                <li>
                    <?php if($_REQUEST["name"]!=null){
                        echo $_REQUEST["name"];
                    } ?>
                </li>
            </ol>
        <li>Section</li>
        <ol>
            <li>
                <?php if($_REQUEST["section"]!=null){
                    echo $_REQUEST["section"];
                } ?></li>
        </ol>
        <li>Credit Card</li>
        <ol>
            <li>
                <?php if($_REQUEST["cardNumber"]!=null){
                    echo $_REQUEST["cardNumber"];
                }
                if($_REQUEST["creditCard"]!=null){
                    echo "(";
                    echo $_REQUEST["creditCard"];
                    echo ")";
                }
                ?></li>
        </ol>
    </ol>
Here are all the suckers who have submitted here:
<?php foreach($suckers as $one){
  echo "<br>{$one}";
}
?>
<?php } ?>
</body>
</html>