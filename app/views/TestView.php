<!DOCTYPE html>
<html lang="en">
<head>
    <title>BasalPHP</title>
    <link rel="stylesheet" href="<?=ASSET_ROOT?>/styles/global.css">
</head>
<body>
    <div class="content">
        <header class="main">
            <h1>BasalPHP Test View</h1>
        </header>


        <br>
        <p>Hello!</p>
        <p>My name is Samir Palumbo Khalifa, <i>alma mater</i> Federal University of Minas Gerais.</p>
        <p>I've developed BasalPHP as a framework that aims to be <b>simple</b> but also <b>practical</b>.</p>
        <p>BasalPHP's simplicity makes it perfect for you to learn and apply good programming practices based on the Model-View-Controller software pattern.</p>
        <p>BasalPHP's practicality allows you to build whatever you want on top of its framework.</p>
        <br><br>
        <p>Parameter passed into the URL: <code><?=$data['param_1']?></code></p>
        <br>
        <form method='POST' action='<?=ASSET_ROOT?>/DefaultController'>
            <input type='text' name='postData_1'>
            <input type='submit' value='submit'>
        </form>

        <?php if(isset($postData['param_1'])) {?>
        <p>Parameter passed throught the form: <code><?=$postData['param_1']?></code></p>
        <?php }?>

    </div>
</body>
</html>