<!DOCTYPE html>
<html>
<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .bgimg {
        background-repeat: no-repeat;
        height: auto;
        background-position: center;
        color: white;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
    }

    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }

    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
    }

    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    hr {
        margin: auto;
        width: 40%;
    }
</style>
<body style="background-color: #f8b040;">

<div class="bgimg">
    <div class="topleft">
        <p>Rara Mart</p>
    </div>
    <div class="middle">
        <img src="{{ asset('/raramart.jpg') }}" alt="Rara Mart" style="width:auto;height: 650px;">
        {{--<h1>COMING SOON</h1>--}}
        {{--<p id="demo" style="font-size:30px"></p>--}}
    </div>
    {{--<div class="bottomleft">--}}
    {{--<p>--}}
    {{--<h4>Contact Us</h4>--}}
    {{--<p>Phone No:: 014621535/36</p>--}}
    {{--<h6>Email</h6>--}}
    {{--Sales:: sales@raramart.com <br/>--}}
    {{--Marketing:: marketing@raramart.com <br/>--}}
    {{--</p>--}}
    {{--</div>--}}
</div>
</body>
</html>
