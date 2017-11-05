<!DOCTYPE html>
<html lang="it">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            html,body {
                background-color: #333;
                color : #efefef;
                display: flex;
                justify-content: center;
                height: 100%;
                width:100%;
                align-items: center;
                font-family : arial
                }
            .maintenance{
                width : 320px;
                height : 320px;
                padding: 24px;
                text-align: center;
                -webkit-border-radius : 50%;
                background-color: #222;
                box-shadow: 0px 0px 8px #0000005c;
            }
            .maintenance .logo{
                padding: 10px;
            }
            .maintenance .title{
                text-transform: uppercase;
            }
            .maintenance p{
                line-height:26px;
            }
        </style>
    </head>
    <body>
        <div class="maintenance">
            <img class="logo" src="<?php echo plugins_url( 'zero' );?>/assets/images/coder.png" width="80" height="80" />
            <h3 class="title">Spiacenti, il sito è in manutenzione</h3>
            <p>Non preoccuparti, torneremo prima che te ne accorga ;)</p>
        </div>
    </body>
</html>