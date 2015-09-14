<?php
session_start();
include "modules/admin/widgets/header.php";
$fb = new \libs\facebook;

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://localhost/dup/admin/fb', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>

<link href="<?=$endereco ?>admin/login/css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <form action="<?=$endereco?>../login" method='post' class="form-login">

        <div class="header">
            <a href="#" class="link-head-left"></a>
            <span></span>
            <a href="javascript:void(0);" tabindex="1" class="link-head-right main-item"></a>
            <div class="config-box">
            </div>
        </div>

        <div class="avatar"><img src="<?=$endereco ?>includes/img/bulll.png" alt=""></div>

        <div class="inputs">
            <input name="name" type="text" required="" placeholder="Usuário">
            <input name="pass" type="password" required="" placeholder="Senha">
            <div class="button-login"><input type="submit" value="Entrar"></div>
        </div>

        <div class="footer-login">
        </div>
    </form>
</div>

<script>

    <?php if(isset($notAceppt) && $notAceppt){?>
        $(function(){notification.error('Senha ou E-mail inválido');});
    <?php } ?>

</script>

</body>
<?php
include "modules/admin/widgets/rodape.php";
?>