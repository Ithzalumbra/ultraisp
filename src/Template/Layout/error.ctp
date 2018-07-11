<style>
    @import url(https://fonts.googleapis.com/css?family=opensans:500);
    body{
        background: linear-gradient(270deg, #000000, #1d006b, #0088b5, #14c4ff, #14c4ff, #008ab8, #0237b3, #000000);
        background-size: 3600% 3600%;

        -webkit-animation: AnimationName 45s ease infinite;
        -moz-animation: AnimationName 45s ease infinite;
        -o-animation: AnimationName 45s ease infinite;
        animation: AnimationName 45s ease infinite;

        color:#fff;
        font-family: 'Open Sans', sans-serif;
        max-height:700px;
        overflow: hidden;
    }

    @-webkit-keyframes AnimationName {
        0%{background-position:0% 25%}
        25%{background-position:50% 50%}
        50%{background-position:100% 50%}
        75%{background-position:50% 50%}
        100%{background-position:0% 25%}
    }
    @-moz-keyframes AnimationName {
        0%{background-position:0% 25%}
        25%{background-position:50% 50%}
        50%{background-position:100% 50%}
        75%{background-position:50% 50%}
        100%{background-position:0% 25%}
    }
    @-o-keyframes AnimationName {
        0%{background-position:0% 25%}
        25%{background-position:50% 50%}
        50%{background-position:100% 50%}
        75%{background-position:50% 50%}
        100%{background-position:0% 25%}
    }
    @keyframes AnimationName {
        0%{background-position:0% 25%}
        25%{background-position:50% 50%}
        50%{background-position:100% 50%}
        75%{background-position:50% 50%}
        100%{background-position:0% 25%}
    }


    .c{
        text-align: center;
        display: block;
        position: relative;
        width:80%;
        margin:100px auto;
    }
    ._404{
        font-size: 220px;
        position: relative;
        display: inline-block;
        z-index: 2;
        height: 250px;
        letter-spacing: 15px;
    }
    ._1{
        text-align:center;
        display:block;
        position:relative;
        letter-spacing: 12px;
        font-size: 4em;
        line-height: 80%;
    }
    ._2{
        text-align:center;
        display:block;
        position: relative;
        font-size: 20px;
    }
    .text{
        font-size: 70px;
        text-align: center;
        position: relative;
        display: inline-block;
        margin: 19px 0px 0px 0px;
        /* top: 256.301px; */
        z-index: 3;
        width: 100%;
        line-height: 1.2em;
        display: inline-block;
    }


    .btn{
        background-color: rgb( 255, 255, 255 );
        position: relative;
        display: inline-block;
        width: 358px;
        padding: 5px;
        z-index: 5;
        font-size: 25px;
        margin:0 auto;
        color:#000000;
        text-decoration: none;
        margin-right: 10px
    }
    .right{
        float:right;
        width:60%;
    }

    hr{
        padding: 0;
        border: none;
        border-top: 5px solid #fff;
        color: #fff;
        text-align: center;
        margin: 0px auto;
        width: 420px;
        height:10px;
        z-index: -10;
    }

    hr:after {
        content: "\2022";
        display: inline-block;
        position: relative;
        top: -0.75em;
        font-size: 2em;
        padding: 0 0.2em;
    }

    .cloud {
        width: 350px; height: 120px;

        background: #FFF;
        background: linear-gradient(top, #FFF 100%);
        background: -webkit-linear-gradient(top, #FFF 100%);
        background: -moz-linear-gradient(top, #FFF 100%);
        background: -ms-linear-gradient(top, #FFF 100%);
        background: -o-linear-gradient(top, #FFF 100%);

        border-radius: 100px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;

        position: absolute;
        margin: 120px auto 20px;
        z-index:-1;
        transition: ease 1s;
    }

    .cloud:after, .cloud:before {
        content: '';
        position: absolute;
        background: #FFF;
        z-index: -1
    }

    .cloud:after {
        width: 100px; height: 100px;
        top: -50px; left: 50px;

        border-radius: 100px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
    }

    .cloud:before {
        width: 180px; height: 180px;
        top: -90px; right: 50px;

        border-radius: 200px;
        -webkit-border-radius: 200px;
        -moz-border-radius: 200px;
    }

    .x1 {
        top:-50px;
        left:100px;
        -webkit-transform: scale(0.3);
        -moz-transform: scale(0.3);
        transform: scale(0.3);
        opacity: 0.9;
        -webkit-animation: moveclouds 15s linear infinite;
        -moz-animation: moveclouds 15s linear infinite;
        -o-animation: moveclouds 15s linear infinite;
    }

    .x1_5{
        top:-80px;
        left:250px;
        -webkit-transform: scale(0.3);
        -moz-transform: scale(0.3);
        transform: scale(0.3);
        -webkit-animation: moveclouds 17s linear infinite;
        -moz-animation: moveclouds 17s linear infinite;
        -o-animation: moveclouds 17s linear infinite;
    }

    .x2 {
        left: 250px;
        top:30px;
        -webkit-transform: scale(0.6);
        -moz-transform: scale(0.6);
        transform: scale(0.6);
        opacity: 0.6;
        -webkit-animation: moveclouds 25s linear infinite;
        -moz-animation: moveclouds 25s linear infinite;
        -o-animation: moveclouds 25s linear infinite;
    }

    .x3 {
        left: 250px; bottom: -70px;

        -webkit-transform: scale(0.6);
        -moz-transform: scale(0.6);
        transform: scale(0.6);
        opacity: 0.8;

        -webkit-animation: moveclouds 25s linear infinite;
        -moz-animation: moveclouds 25s linear infinite;
        -o-animation: moveclouds 25s linear infinite;
    }

    .x4 {
        left: 470px; botttom: 20px;

        -webkit-transform: scale(0.75);
        -moz-transform: scale(0.75);
        transform: scale(0.75);
        opacity: 0.75;

        -webkit-animation: moveclouds 18s linear infinite;
        -moz-animation: moveclouds 18s linear infinite;
        -o-animation: moveclouds 18s linear infinite;
    }

    .x5 {
        left: 200px; top: 300px;

        -webkit-transform: scale(0.5);
        -moz-transform: scale(0.5);
        transform: scale(0.5);
        opacity: 0.8;

        -webkit-animation: moveclouds 20s linear infinite;
        -moz-animation: moveclouds 20s linear infinite;
        -o-animation: moveclouds 20s linear infinite;
    }

    @-webkit-keyframes moveclouds {
        0% {margin-left: 80%;}
        100% {margin-left: -1200px;}
    }
    @-moz-keyframes moveclouds {
        0% {margin-left: 80%;}
        100% {margin-left: -1200px;}
    }
    @-o-keyframes moveclouds {
        0% {margin-left: 80%;}
        100% {margin-left: -1200px;}
    }
</style>
<?=$this->Html->script(['jquery-3.3.1', 'jquery.shuffleLetters'])?>
<title>Pagina no encontrada</title>
<link rel="icon" type="image/png" href="/img/favicon.png">
<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
<div class='c'>
    <div class='_404 sflt'>*\}</div>
    <hr>
    <div class='_1 sflt' >s/+KYdfgf</div>
    <div class='_2 sflt'>hJtf4d F9=GHr GH</div>
    <br>
    <a class='btn sflt' href='/' id="buton"> asdhjUoklGF</a>
</div>
<script>
    $(function(){

        var container = $(".sflt");
        container.shuffleLetters();

        setTimeout(function(){
            $("._404").shuffleLetters({
                "text": "404"
            });
            $("._1").shuffleLetters({
                "text": "LA PAGINA"
            });
            $("._2").shuffleLetters({
                "text": "NO FUE ENCONTRADA"
            });
            $("#buton").shuffleLetters({
                "text": "VOLVER AL INICIO"
            });
        },1000);

    });

</script>