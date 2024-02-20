<style>
    @import url('https://fonts.googleapis.com/css?family=Jura:wght@700&display=swap');

    html,
    body{
        margin: 0px;
        overflow: hidden;
    }

    div{
        position: absolute;
        top: 0%;
        left: 0%;
        height: 100%;
        width: 100%;
        margin: 0px;
        background: radial-gradient(circle, #240015 0%, #12000b 100%);
        overflow: hidden;
    }

    .wrap{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    h2{
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: 150px;
        font-size: 32px;
        text-transform: uppercase;
        transform: translate(-50%, -50%);
        display: block;
        color: #12000a;
        font-weight: 300;
        font-family: Jura;
        text-shadow: 0px 0px 4px #12000a;
        animation: fadeInText 3s ease-in 3.5s forwards, flicker4 5s linear 7.5s infinite, hueRotate 6s ease-in-out 3s infinite;
    }

    #svgWrap_1,
    #svgWrap_2{
        position: absolute;
        height: auto;
        width: 600px;
        max-width: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    #svgWrap_1,
    #svgWrap_2,
    div{
        animation: hueRotate 6s ease-in-out 3s infinite;
    }

    #id1_1,
    #id2_1,
    #id3_1{
        stroke: #ffc107;
        stroke-width: 3px;
        fill: transparent;
        filter: url(#glow);
    }

    #id1_2,
    #id2_2,
    #id3_2{
        stroke: #12000a;
        stroke-width: 3px;
        fill: transparent;
        filter: url(#glow);
    }

    #id3_1{
        stroke-dasharray: 940px;
        stroke-dashoffset: -940px;
        animation: drawLine3 2.5s ease-in-out 0s forwards, flicker3 4s linear 4s infinite;
    }

    #id2_1{
        stroke-dasharray: 735px;
        stroke-dashoffset: -735px;
        animation: drawLine2 2.5s ease-in-out 0.5s forwards, flicker2 4s linear 4.5s infinite;
    }

    #id1_1{
        stroke-dasharray: 940px;
        stroke-dashoffset: -940px;
        animation: drawLine1 2.5s ease-in-out 1s forwards, flicker1 4s linear 5s infinite;
    }

    @keyframes drawLine1 {
        0%  {stroke-dashoffset: -940px;}
        100%{stroke-dashoffset: 0px;}
    }

    @keyframes drawLine2 {
        0%  {stroke-dashoffset: -735px;}
        100%{stroke-dashoffset: 0px;}
    }

    @keyframes drawLine3 {
        0%  {stroke-dashoffset: -940px;}
        100%{stroke-dashoffset: 0px;}
    }

    @keyframes flicker1{
        0%  {stroke: #ffc107;}
        1%  {stroke: transparent;}
        3%  {stroke: transparent;}
        4%  {stroke: #ffc107;}
        6%  {stroke: #ffc107;}
        7%  {stroke: transparent;}
        13% {stroke: transparent;}
        14% {stroke: #ffc107;}
        100%{stroke: #ffc107;}
    }

    @keyframes flicker2{
        0%  {stroke: #ffc107;}
        50% {stroke: #ffc107;}
        51% {stroke: transparent;}
        61% {stroke: transparent;}
        62% {stroke: #ffc107;}
        100%{stroke: #ffc107;}
    }

    @keyframes flicker3{
        0%  {stroke: #ffc107;}
        1%  {stroke: transparent;}
        10% {stroke: transparent;}
        11% {stroke: #ffc107;}
        40% {stroke: #ffc107;}
        41% {stroke: transparent;}
        45% {stroke: transparent;}
        46% {stroke: #ffc107;}
        100%{stroke: #ffc107;}
    }

    @keyframes flicker4{
        0%  {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        30% {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        31% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        32% {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        36% {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        37% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        41% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        42% {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        85% {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        86% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        95% {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        96% {color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
        100%{color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
    }

    @keyframes fadeInText{
        1%  {color: #12000a;text-shadow:0px 0px 4px #12000a;}
        70% {color: #ffc107;text-shadow:0px 0px 14px #ffc107;}
        100%{color: #ffc107;text-shadow:0px 0px 4px #ffc107;}
    }

    @keyframes hueRotate{
        0%  {
            filter: hue-rotate(0deg);
        }
        50%  {
            filter: hue-rotate(-120deg);
        }
        100%  {
            filter: hue-rotate(0deg);
        }
    }
</style>

<div></div>
<svg id="svgWrap_2" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 700 250">
    <g>
        <path id="id3_2" d="M195.7 232.67h-37.1V149.7H27.76c-2.64 0-5.1-.5-7.36-1.49-2.27-.99-4.23-2.31-5.88-3.96-1.65-1.65-2.95-3.61-3.89-5.88s-1.42-4.67-1.42-7.22V29.62h36.82v82.98H158.6V29.62h37.1v203.05z"/>
        <path id="id2_2" d="M470.69 147.71c0 8.31-1.06 16.17-3.19 23.58-2.12 7.41-5.12 14.28-8.99 20.6-3.87 6.33-8.45 11.99-13.74 16.99-5.29 5-11.07 9.28-17.35 12.81a85.146 85.146 0 0 1-20.04 8.14 83.637 83.637 0 0 1-21.67 2.83H319.3c-7.46 0-14.73-.94-21.81-2.83-7.08-1.89-13.76-4.6-20.04-8.14a88.292 88.292 0 0 1-17.35-12.81c-5.29-5-9.84-10.67-13.66-16.99-3.82-6.32-6.8-13.19-8.92-20.6-2.12-7.41-3.19-15.27-3.19-23.58v-33.13c0-12.46 2.34-23.88 7.01-34.27 4.67-10.38 10.92-19.33 18.76-26.83 7.83-7.5 16.87-13.36 27.12-17.56 10.24-4.2 20.93-6.3 32.07-6.3h66.41c7.36 0 14.58.94 21.67 2.83 7.08 1.89 13.76 4.6 20.04 8.14a88.292 88.292 0 0 1 17.35 12.81c5.29 5 9.86 10.67 13.74 16.99 3.87 6.33 6.87 13.19 8.99 20.6 2.13 7.41 3.19 15.27 3.19 23.58v33.14zm-37.1-33.13c0-7.27-1.32-13.88-3.96-19.82-2.64-5.95-6.16-11.04-10.55-15.29-4.39-4.25-9.46-7.5-15.22-9.77-5.76-2.27-11.8-3.35-18.13-3.26h-66.41c-6.14-.09-12.11.97-17.91 3.19-5.81 2.22-10.95 5.43-15.44 9.63-4.48 4.2-8.07 9.3-10.76 15.29-2.69 6-4.04 12.67-4.04 20.04v33.13c0 7.36 1.32 14.02 3.96 19.97 2.64 5.95 6.18 11.02 10.62 15.22 4.44 4.2 9.56 7.43 15.36 9.7 5.8 2.27 11.87 3.35 18.2 3.26h66.41c7.27 0 13.85-1.2 19.75-3.61s10.93-5.73 15.08-9.98 7.36-9.32 9.63-15.22c2.27-5.9 3.4-12.34 3.4-19.33v-33.15zm-16-26.91a17.89 17.89 0 0 1 2.83 6.73c.47 2.41.47 4.77 0 7.08-.47 2.31-1.39 4.48-2.76 6.51-1.37 2.03-3.14 3.75-5.31 5.17l-99.4 66.41c-1.61 1.23-3.26 2.08-4.96 2.55-1.7.47-3.45.71-5.24.71-3.02 0-5.9-.71-8.64-2.12-2.74-1.42-4.96-3.44-6.66-6.09a17.89 17.89 0 0 1-2.83-6.73c-.47-2.41-.5-4.77-.07-7.08.43-2.31 1.3-4.48 2.62-6.51 1.32-2.03 3.07-3.75 5.24-5.17l99.69-66.41a17.89 17.89 0 0 1 6.73-2.83c2.41-.47 4.77-.47 7.08 0 2.31.47 4.48 1.37 6.51 2.69 2.03 1.32 3.75 3.02 5.17 5.09z"/>
        <path id="id1_2" d="M688.33 232.67h-37.1V149.7H520.39c-2.64 0-5.1-.5-7.36-1.49-2.27-.99-4.23-2.31-5.88-3.96-1.65-1.65-2.95-3.61-3.89-5.88s-1.42-4.67-1.42-7.22V29.62h36.82v82.98h112.57V29.62h37.1v203.05z"/>
    </g>
</svg>
<svg id="svgWrap_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 700 250">
    <g>
        <path id="id3_1" d="M195.7 232.67h-37.1V149.7H27.76c-2.64 0-5.1-.5-7.36-1.49-2.27-.99-4.23-2.31-5.88-3.96-1.65-1.65-2.95-3.61-3.89-5.88s-1.42-4.67-1.42-7.22V29.62h36.82v82.98H158.6V29.62h37.1v203.05z"/>
        <path id="id2_1" d="M470.69 147.71c0 8.31-1.06 16.17-3.19 23.58-2.12 7.41-5.12 14.28-8.99 20.6-3.87 6.33-8.45 11.99-13.74 16.99-5.29 5-11.07 9.28-17.35 12.81a85.146 85.146 0 0 1-20.04 8.14 83.637 83.637 0 0 1-21.67 2.83H319.3c-7.46 0-14.73-.94-21.81-2.83-7.08-1.89-13.76-4.6-20.04-8.14a88.292 88.292 0 0 1-17.35-12.81c-5.29-5-9.84-10.67-13.66-16.99-3.82-6.32-6.8-13.19-8.92-20.6-2.12-7.41-3.19-15.27-3.19-23.58v-33.13c0-12.46 2.34-23.88 7.01-34.27 4.67-10.38 10.92-19.33 18.76-26.83 7.83-7.5 16.87-13.36 27.12-17.56 10.24-4.2 20.93-6.3 32.07-6.3h66.41c7.36 0 14.58.94 21.67 2.83 7.08 1.89 13.76 4.6 20.04 8.14a88.292 88.292 0 0 1 17.35 12.81c5.29 5 9.86 10.67 13.74 16.99 3.87 6.33 6.87 13.19 8.99 20.6 2.13 7.41 3.19 15.27 3.19 23.58v33.14zm-37.1-33.13c0-7.27-1.32-13.88-3.96-19.82-2.64-5.95-6.16-11.04-10.55-15.29-4.39-4.25-9.46-7.5-15.22-9.77-5.76-2.27-11.8-3.35-18.13-3.26h-66.41c-6.14-.09-12.11.97-17.91 3.19-5.81 2.22-10.95 5.43-15.44 9.63-4.48 4.2-8.07 9.3-10.76 15.29-2.69 6-4.04 12.67-4.04 20.04v33.13c0 7.36 1.32 14.02 3.96 19.97 2.64 5.95 6.18 11.02 10.62 15.22 4.44 4.2 9.56 7.43 15.36 9.7 5.8 2.27 11.87 3.35 18.2 3.26h66.41c7.27 0 13.85-1.2 19.75-3.61s10.93-5.73 15.08-9.98 7.36-9.32 9.63-15.22c2.27-5.9 3.4-12.34 3.4-19.33v-33.15zm-16-26.91a17.89 17.89 0 0 1 2.83 6.73c.47 2.41.47 4.77 0 7.08-.47 2.31-1.39 4.48-2.76 6.51-1.37 2.03-3.14 3.75-5.31 5.17l-99.4 66.41c-1.61 1.23-3.26 2.08-4.96 2.55-1.7.47-3.45.71-5.24.71-3.02 0-5.9-.71-8.64-2.12-2.74-1.42-4.96-3.44-6.66-6.09a17.89 17.89 0 0 1-2.83-6.73c-.47-2.41-.5-4.77-.07-7.08.43-2.31 1.3-4.48 2.62-6.51 1.32-2.03 3.07-3.75 5.24-5.17l99.69-66.41a17.89 17.89 0 0 1 6.73-2.83c2.41-.47 4.77-.47 7.08 0 2.31.47 4.48 1.37 6.51 2.69 2.03 1.32 3.75 3.02 5.17 5.09z"/>
        <path id="id1_1" d="M688.33 232.67h-37.1V149.7H520.39c-2.64 0-5.1-.5-7.36-1.49-2.27-.99-4.23-2.31-5.88-3.96-1.65-1.65-2.95-3.61-3.89-5.88s-1.42-4.67-1.42-7.22V29.62h36.82v82.98h112.57V29.62h37.1v203.05z"/>
    </g>
</svg>

<svg>
    <defs>
        <filter id="glow">
            <fegaussianblur class="blur" result="coloredBlur" stddeviation="4"></fegaussianblur>
            <femerge>
                <femergenode in="coloredBlur"></femergenode>
                <femergenode in="SourceGraphic"></femergenode>
            </femerge>
        </filter>
    </defs>
</svg>

<h2>Заблудился?</h2>
