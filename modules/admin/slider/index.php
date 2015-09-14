<?php
include "modules/admin/widgets/header.php";
include "modules/admin/widgets/sidebar.php";

$slider = new modules\admin\slider\model\DBSlide;
?>
    <!-- Wide card with share menu button -->
    <style>
        .demo-card-wide.mdl-card {
            width: 100%;
            margin-top: 20px;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 276px;
            background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)),url('<?=$endereco?>includes/img/<?=$slider->getSliderForType(1)['url']?>') center / cover;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
    </style>

    <div class="container">
        <form id="formEditUser" class="urlForm" data-url="<?=$endereco?>admin/slider/controller/create.update.slider.php">
            <div class="mdl-card mdl-shadow--2dp demo-card-wide">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">O que você acha?</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Adicione uma nova imagem no slide da home.
                </div>
                <input type="file" class="input-img" name='fileImg' style="display: none;"/>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect btn-click-img">
                        Escolher imagem
                    </a>
                    <button type='submit' class="mdl-button btn-success mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="color:white;">
                        Salvar
                    </button>
                </div>

                <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">share</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(function(){

            //click para abrir a imagem
            $('.btn-click-img').on("click", function(){
                $('.input-img').trigger('click').imgBG(".demo-card-wide > .mdl-card__title");
            });
        });
    </script>
<?php include "modules/admin/widgets/rodape.php"; ?>