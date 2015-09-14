<?php
include "modules/admin/widgets/header.php";
include "modules/admin/widgets/sidebar.php";

$lk = new modules\admin\links\model\DBLinks;
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
        .demo-card-event.mdl-card {
            width: 256px;
            height: 256px;
            background: #3E4EB8;
        }
        .demo-card-event > .mdl-card__actions {
            border-color: rgba(255, 255, 255, 0.2);
        }
        .demo-card-event > .mdl-card__title {
            align-items: flex-start;
        }
        .demo-card-event > .mdl-card__title > h4 {
            margin-top: 0;
        }
        .demo-card-event > .mdl-card__actions {
            display: flex;
            box-sizing:border-box;
            align-items: center;
        }
        .demo-card-event > .mdl-card__title,
        .demo-card-event > .mdl-card__actions,
        .demo-card-event > .mdl-card__actions > .mdl-button {
            color: #fff;
        }

        /*link*/

        .card-new-link.mdl-card {
            width: 100%;
        }
        .card-new-link > .mdl-card__title {
            color: #fff;
            height: 126px;
            background:linear-gradient(RGBA(28, 28, 28, 0.5), RGBA(28, 28, 28, 0.5)), url('<?=$endereco?>includes/img/<?=$slider->getSliderForType(1)['url']?>') center / cover;
        }
        .card-new-link > .mdl-card__menu, .card-new-link .mdl-card__title-text {
            color: #fff;
        }
    </style>

    <div class="container">
        <div class="row">
            <form id='formEditUser' class="urlForm" data-url="<?=$endereco?>admin/links/controller/create.link.php">
                <div class="col-md-12">
                    <!-- Wide card with share menu button -->
                    <div class="card-new-link mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <div class="mdl-card__title-text col-md-12">
                                <input type="text" name="url" style="width: 100%; border:none; outline: none; background-color: transparent;" placeholder="Enter with link here."/>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <input type="text" name='title' style="width: 100%; border:none; font-size:20px; outline: none; color:#808080; background-color: transparent;" placeholder="Title"/>
                            <textarea name="description" style="width: 100%; border:none; outline: none;" placeholder="Description of the link"></textarea>
                        </div>
                        <div class="mdl-card__menu">
                            <button type="submit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" style="color:white;">
                                <i class="material-icons">save</i>
                            </button>
                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                <i class="material-icons">share</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <?php foreach($lk->viewAll() as $link){?>
                <div class="col-md-3" style="margin:20px 0px;">
                    <div class="demo-card-event mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <div class="container">
                                <div class="row">
                                    <h3 class="text-capitalize"><?=$link['title']?>: </h3>
                                </div>
                                <div class="row">
                                    <p class="text-justify"><?=$link['description']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a href='<?=$link['url']?>' target='_blank' class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Go for link
                            </a>
                            <div class="mdl-layout-spacer"></div>
                            <i class="material-icons">link</i>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
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