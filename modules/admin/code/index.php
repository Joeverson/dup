<?php
include "modules/admin/widgets/header.php";
include "modules/admin/widgets/sidebar.php";
?>
<?php
$db = new modules\admin\code\model\DBCode;
?>
    <style>
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 176px;

        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
        body{
            background-color: #42424f;
        }
        .mdl-mini-footer{
            bottom: 0;
            position: fixed;
            height:100px;
            z-index: 100;
            width: 100%;
        }
        .mdl-mini-footer .user{

        }

        .card-search.mdl-card {
            width: 100%;
            min-height: 0;
            background: #3E4EB8;
        }
        .demo-card-event > .mdl-card__actions {
            border-color: rgba(255, 255, 255, 0.2);
        }
        .card-search > .mdl-card__title {
            align-items: flex-start;
        }
        .card-search > .mdl-card__title > h4 {
            margin-top: 0;
        }
        .card-search > .mdl-card__actions {
            display: flex;
            box-sizing:border-box;
            align-items: center;
        }
        .card-search > .mdl-card__title,
        .card-search > .mdl-card__actions,
        .card-search > .mdl-card__actions > .mdl-button {
            color: #fff;
        }
    </style>

    <body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-search mdl-card mdl-shadow--2dp">
                <div class="mdl-card__actions mdl-card--border">
                    <input type="text" style="width: 100%; border:none; outline: none; background-color: transparent;" id='search-code' placeholder="Search"/>

                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-cel mdl-cel--2-col">
                        <!-- Colored FAB button -->
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect" style="background-color: white;" data-toggle="modal" data-target="#modalCreateCodes">
                            <i class="material-icons">add</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin: 30px 0 200px 0;" id="field-codes">
        <?php $i=0; foreach($db->viewAllCodes() as $k){?>
            <div class="col-md-4">
                <!-- Wide card with share menu button -->
                <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),url('<?=$endereco?>includes/img/feature-lightweight.png') center / cover;">
                        <h2 class="mdl-card__title-text"><?=$k['title']?></h2>
                    </div>
                    <div class="mdl-card__supporting-text text-justify">
                        <?=$k['description']?>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect view-now" data-id="<?=$k['id_code']?>">
                            Preview
                        </a>
                    </div>

                    <div class="mdl-card__menu">
                        <!--like-->
                        <button class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">star_rate</i>
                        </button>
                        <!--like-->

                        <!-- menu -->
                        <button id="menu-of-code<?=$i?>" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-of-code<?=$i?>">
                            <li class="mdl-menu__item">Versioning</li>
                            <li class="mdl-menu__item">Change Image</li>
                            <li class="mdl-menu__item delete-now" data-id="<?=$k['id_code']?>" style="color:red;">Trash now</li>
                        </ul>
                        <!-- /menu -->
                    </div>
                </div>
            </div>
            <?php $i++; }?>
    </div>
</div>




<!-- Modal  -->
<div class="modal fade" id="modalCodes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;box-shadow: none;border: none !important;">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="material-icons" style="color:#808080;">file_download</i>
                </button>
                <h4 class="modal-title" id="myModalLabel">code - io</h4>
            </div>
            <div class="modal-body code-preview">
                ...
            </div>
        </div>
    </div>
</div>


<!-- Modal-create insert file -->
<div class="modal fade" id="modalCreateCodes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0;box-shadow: none;border: none !important;">
            <div class="modal-header" style="border: none;">
                <a href="javascript:window.location.reload();" class="close" data-dismiss="modal">
                    <i class="material-icons">close</i>
                </a>
                <div class="mdl-grid">
                    <div class="mdl-cel mdl-cel--4-col">
                        <!-- Flat button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect" id="insert-code">
                            code
                        </button>
                    </div>
                    <form id="form-code">
                        <div class="mdl-cel mdl-cel--4-col">
                            <input type="file" id="file-code" name="file-code" style="display: none;"/>
                            <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect" id="insert-code" style="color:green;">
                                OK
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-body code-apresent">
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        //quando clicado ele cai mostar o conteudo do codigo
        $('.view-now').on('click', function(){
            $.ajax({
                url: '<?=$endereco?>admin/code/controller/get.data.php',
                type: 'POST',
                data: "id_code="+$(this).data('id'),
                success: function (data) {
                    var json = $.parseJSON(data);

                    $('.code-preview').html('');

                    $.each(json, function(a,b){
                        if( a == 'content' ){
                            $('.code-preview').append('<textarea style="color:green;width: 100%; height: 300px; border: none; outline: green;">'+b+'</textarea>');
                        }else if( a == 'title' ){
                            $('.modal-title').html(b);
                        }
                    });
                }
            });

            $('#modalCodes').modal('show');
        });

        //apagando os codigos quando clicar em trash now.
        $('.delete-now').on('click', function(){
            $.ajax({
                url: '<?=$endereco?>admin/code/controller/delete.data.php',
                type: 'POST',
                data: "id="+$(this).data('id'),
                success: function (data) {
                    window.location.reload();
                }
            });
        });

        //abrir o input de files para escolher arquivos para gravar no banco
        $('#insert-code').on('click', function(){
            $('#file-code').trigger('click');
        });


        //enviar os codigos para o banco de dados
        $('#form-code').on('submit',function(){
            event.preventDefault();

            $.ajax({
                url: '<?=$endereco?>admin/code/controller/processing.data.php',
                type: 'POST',
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                xhr: function() {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                        myXhr.upload.addEventListener('progress', function () {
                            /* faz alguma coisa durante o progresso do upload */
                        }, false);
                    }
                    return myXhr;
                },
                success: function (data) {
                    console.log(data);
                    var json = $.parseJSON(data);
                    if(json == ''){
                        $('.code-apresent').html('<p style="color: red">Codificação do arquivo com erro.</p>');
                    }else{
                        $('.code-apresent').html('');
                        $.each(json, function(a,b){
                            if(a == 'title')
                                $('.code-apresent').append('<p><strong>Title: </strong>'+b+'</p>');
                            else if( a == 'description')
                                $('.code-apresent').append('<p><strong>description: </strong>'+b+'</p>');
                            else if( a == 'content' ){
                                $('.code-apresent').append('<textarea style="color:green;width: 100%; height: 300px; border: none; outline: green;">'+b+'</textarea>');
                            }

                        });
                    }

                }
            });
        });


        // search of code.
        $('#search-code').on("keyup", function(){
            var data =  $('#search-code').val();
            $.ajax({
                url: "<?=$endereco?>admin/code/controller/search.code.php",
                type: 'post',
                data:  'str='+data,
                datatype: 'html',
                beforeSend: function(){
                    notification.loading('Buscando...');
                },
                success: function(e){
                    var json = $.parseJSON(e);
                    var txt = "";
                    $i = 0;

                    if(typeof json == "string"){
                        $('#field-codes').html('<a href="#" class="list-group-item"><p class="list-group-item-text">'+ json +'</p></a>');
                    }else{
                        $.each(json, function( k, v ){
                            $i++;
                            txt += '<div class="col-md-4"><div class="demo-card-wide mdl-card mdl-shadow--2dp"><div class="mdl-card__title" style="background: #3E4EB8"><h2 class="mdl-card__title-text">'+ v.title+'</h2></div><div class="mdl-card__supporting-text text-justify">'+ v.description+'</div><div class="mdl-card__actions mdl-card--border"><a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect view-now" data-id="'+v.id_code+'">Preview</a></div><div class="mdl-card__menu"><button class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">star_rate</i></button><button id="menu-of-code'+$i+'" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">more_vert</i></button><ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-of-code'+$i+'"><li class="mdl-menu__item">Versioning</li><li class="mdl-menu__item">Change Image</li><li class="mdl-menu__item delete-now" data-id="'+ v.id_code+'" style="color:red;">Trash now</li></ul></div></div></div>';
                            $('#field-codes').html(txt);
                        });
                    }
                },
                error: function(e){
                    notification.error("Error ao comunicar com o servidor");
                }
            });
        });
    });
</script>
<?php include 'modules/admin/widgets/rodape.php'?>