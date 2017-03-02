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
            
            text-align: center;
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

        #resetButton {
            margin-top: 50px;
            
            height: 100px;
            width: 500px;
            border: none;
            border-radius: 10px;

            color: #D9D9D9;
            background-color: #181818;
            
            font-size: 70px;

            cursor: pointer;
        }

        #resetButton:hover {
            background-color: #262626;
        }

        #resetButton:focus {
            outline: 0;
        }

        #overlay {
            position: absolute;
            top: 0;
            left: 0;

            display: none;
            width: 100%;
            height: 100%;
            z-index: 200;

            background-color: #000000;
            opacity: 0.9;
        }
        #overlay.visible {
            display: flex; !important
        }

        #submitFormPopup {
            position: absolute;
            top: 20%;
            left: 25%;

            display: none;
            width: 50%;
            height: 60%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;
            overflow: auto;
            z-index: 200;
            justify-content: center;

            text-align: center;
            font-size: 30px;

            background-color: #181818;
            color: #FFFFFF;
        }
        #submitFormPopup.visible {
            display: flex; !important
        }

        #closeButton {
            position: absolute;
            right: 0;
            top: 0;

            display: block;
            width: 30px;
            padding: 20px;

            font-size: 30px;

            color: #FFFFFF;

            cursor: pointer;
        }

        #checkBoxButton_yes {
            background-color: transparent;
            color: #FFFFFF;
            font-size: 50px;
            border: none;

            cursor: pointer;
        }

        #checkBoxButton_yes:focus {
            outline: 0;
        }

        #checkBoxButton_no {
            margin-left: 80px;
            
            background-color: transparent;
            color: #FFFFFF;
            font-size: 50px;
            border: none;
            
            cursor: pointer;
        }

        #checkBoxButton_no:focus {
            outline: 0;
        }

        #submitFormSubmitButton {
            margin-top: 50px;
            
            height: 100px;
            width: 500px;
            border: none;
            border-radius: 10px;

            color: #FFFFFF;
            background-color: #000000;
            
            font-size: 50px;

            cursor: pointer;
        }
        #submitFormSubmitButton:disabled{
            color: #333333;
            background-color: #080808;
        }

        #submitFormSubmitButton:focus {
            outline: 0;
        }
        </style>
        <?php //include 'statRecorder.php';?>
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
                <button id="resetButton" type="button">RESET</button>
            </div>
        </div>

        <div id="overlay"></div>

        <div id="submitFormPopup">
            <form action="" style="align-self: center;">
                <span id="closeButton">&#10006;</span>

                <span id="submitFormDescription">Was this about the current US President?</span>
                
                <div id="checkBoxes" style="margin-top: 50px;">
                    <button id="checkBoxButton_yes" type="button">&#9744; Yes</button>
                    <button id="checkBoxButton_no" type="button">&#9744; No</button>
                </div>
                <div id="flavorText">
                </div>
                <button id="submitFormSubmitButton" type="button" disabled=true>SUBMIT</button>
            </form>
        </div>
        
    </body>
</html>