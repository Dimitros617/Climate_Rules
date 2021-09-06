
<style>

    .container{
        padding: 20px;

    }
    .sphere{
        position: relative;
        margin: 0 auto;
        display: block;
        height: 15vw;
        width: 15vw;
        box-shadow: 2px 4px 20px 1px rgb(0 0 0 / 38%);
        background: rgba(10,80,200,1);
        border-radius: 150px;
        transform: rotate(-23.5deg);
        transition-duration: 0.5s;
    }

    .sphere:hover{
        box-shadow: 2px 14px 20px 9px rgb(0 0 0 / 38%);
    }

    .layer{
        position: absolute;
        height: 15vw;
        width: 15vw;
        border-radius: 150px;
        overflow: hidden;
    }
    .ambience{
        height: 10vw;
        width: 10vw;
        box-shadow: 0px 0px 80px 80px rgba(20,200,200,0.5);
        background: rgba(20,200,200,0.5);
        border-radius: 100px;
    }
    .edge{
        height: 15vw;
        width: 15vw;
        border-radius: 150px;
        box-shadow: inset 0px 0px 100px 20px rgba(0,0,0,0.4);
    }
    .ocean-glare{
        height: 40px;
        width: 40px;
        background: rgba(255,255,255,1);
        box-shadow: 0px 0px 40px 40px rgba(255,255,255,1);
        border-radius: 150px;
        position: absolute;
        left: 80px;
        top: 100px;
        transform: rotate(-0deg);
    }
    .ocean-glare:hover {
        background: rgb(255 255 255 / 56%);
        box-shadow: 0px 0px 40px 40px rgb(255 255 255 / 59%);
    }
    .glare{
        height: 20px;
        width: 20px;
        background: rgba(200,200,150,0.7);
        box-shadow: 0px 0px 30px 30px rgba(200,200,150,0.7);
        border-radius: 150px;
        position: absolute;
        left: 80px;
        top: 100px;
    }

    .darkside{
        box-shadow: inset -60px -10px 80px 0px rgba(0,0,0,0.9);
        position: absolute;
        left:0;right:0;top:0;bottom:0;
    }

    .land{
        animation: rotate 96s linear infinite;
        background-size: 600px 300px;
        background: url("/Img/land.svg");

    }

    .clouds{
        animation: rotate 48s linear infinite;
        background-size: 600px 300px;
        background: url("/Img/clouds.svg");
    }

    @keyframes rotate{
        from{
            background-position-x: 0px;
        }
        to{
            background-position-x: 600px;
        }
    }
</style>


<div id="earth" class="container ms-auto me-auto d-block">
    <div class="sphere ms-auto me-auto d-block animate-05 hover-size-01">
        <div class="layer">
            <div class="ambience">
            </div>
        </div>
        <div class="layer">
            <div class="ocean-glare"></div>
        </div>
        <div class="layer land">
        </div>
        <div class="layer clouds">
        </div>
        <div class="layer darkside">
        </div>
        <div class="layer">
            <div class="edge"></div>
        </div>
        <div class="layer">
            <div class="glare"></div>
        </div>
    </div>
</div>
