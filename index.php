<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Political Discussion Clock</title>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <style>
        html, body {
            height: 100%;
        }

        body {
            overflow: hidden;
            margin: 0px;
            max-width: 100%;
            max-height: 100%;
            
            color: #333333;
            background-color: #333333;

            font-family: Calibri;
        }

        #header_bar {
            position: fixed;
            top: 0px;
            z-index: 200;
            
            height: 50px;
            width: 100%;
            box-shadow: 0px 0px 20px #1A1A1A;
            background-color: #262626;
            color: #D9D9D9;

            font-size: large;
        }

        #header_wrapper {
            margin: 0px 40px 0px 40px;
        }

        #header_placeholder {
            height: 50px;
            width: 100%;
        }

        #title {
            float: left;

            margin-right: 30px;
            height: 50px;
            padding: 0px 10px 0px 10px;
            
            color: #FFFFFF;

            line-height: 50px;
            font-size: xx-large;
            font-weight: bold;
        }

        #container {
            position: absolute;
            
            display: table;
            height: 100%;
            width: 100%;
        }

        #clock_container {
            display: table-cell;

            vertical-align: middle;
        }

        #clock {
            margin-left: auto;
            margin-right: auto; 
            
            padding: 20px;
            width: 70%;
            height: 200px;
            border-radius: 20px;
            
            background-color: #262626;
            color: #CCCCCC;
            
            font-size: 150px;
            line-height: 200px;
            text-align: center;
        }
        </style>
    </head>
    <body>
        <div id="header">
            <div id="header_bar">
                <div id="header_wrapper">
                    <a href="">
                        <div id="title">
                            <a href="index.php" style="text-decoration: none; color: #FFFFFF;">
                                Political Discussion Clock
                            </a>
                        </div>
                    </a>
                </div>
            </div>
            <div id="header_placeholder"></div>
        </div>
        <div id="container" style="height: 100%;">
            <div id="clock_container">
                <div id="clock"></div>
                <script src="clock.js"></script>
            </div>
        </div>
    </body>
</html>