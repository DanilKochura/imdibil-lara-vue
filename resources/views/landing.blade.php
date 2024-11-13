<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <script src="{{asset('/js/callbacks.js')}}"></script>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="киновикторина, киноклуб, тесты о кино, кинотесты" />
    <meta name="description" content="Imdibil - Киноклуб мгту имени Баумана и компания друзей, которые любят обсуждать кино. На протяжении почти двух лет мы периодически собираемся для того, чтобы поговорить о фильмах, а этот портал помогает Вам следить за нашей деятельностью, а также проходить различные викторины на знание кинематографа
" />
    <title>Киноклуб IMDIBIL</title>
    <meta property="og:title" content="Киноклуб IMDIBIL">
    <title>IMDibil</title>
    @if(auth()->check())
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif
{{--    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">--}}
    <link rel="shortcut icon" href="https://imdibil.ru/favicon.svg" type="image/svg+xml">

    @include('components.counters')

</head>
<body class="{{ \App\UseCases\ThemeTrait::isNewYear() ? 'new-year' : ''}}" style="background-color: #252525">

<div class="container-fluid m-0 p-0">
    <div class="banner"
        >
        @if(\App\UseCases\ThemeTrait::isNewYear())
            <svg  width="134" height="220" viewBox="0 0 134 220" fill="none" xmlns="http://www.w3.org/2000/svg" id="floating-ball-1">
                <g id="newyear2020">
                    <g id="jhalar1">
                        <path id="Vector_190" d="M65.3516 1V146.3" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path  id="Vector_191" d="M65.3449 219.005L101.69 182.66L65.3449 146.315L29 182.66L65.3449 219.005Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path id="Vector_192" d="M50.7523 208.3H79.9523C86.0523 208.3 91.0523 203.3 91.0523 197.2V168C91.0523 161.9 86.0523 156.9 79.9523 156.9H50.7523C44.6523 156.9 39.6523 161.9 39.6523 168V197.2C39.6523 203.4 44.5523 208.3 50.7523 208.3Z" stroke="#E27C6C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path id="Vector_193"  d="M65.352 193.7C71.482 193.7 76.452 188.73 76.452 182.6C76.452 176.47 71.482 171.5 65.352 171.5C59.222 171.5 54.252 176.47 54.252 182.6C54.252 188.73 59.222 193.7 65.352 193.7Z" stroke="#E27C6C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M60.1523 182.6C60.1523 185.5 62.4523 187.8 65.3523 187.8C68.2523 187.8 70.5523 185.5 70.5523 182.6C70.5523 179.7 68.2523 177.4 65.3523 177.4C62.4523 177.4 60.1523 179.8 60.1523 182.6Z" fill="#EFC87E"/>
                        <path d="M65.3518 130.9C68.0028 130.9 70.1518 128.751 70.1518 126.1C70.1518 123.449 68.0028 121.3 65.3518 121.3C62.7008 121.3 60.5518 123.449 60.5518 126.1C60.5518 128.751 62.7008 130.9 65.3518 130.9Z" stroke="#E27C6C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M61.9521 109.5C61.9521 111.4 63.4521 112.9 65.3521 112.9C67.2521 112.9 68.7521 111.4 68.7521 109.5C68.7521 107.6 67.2521 106.1 65.3521 106.1C63.4521 106.1 61.9521 107.6 61.9521 109.5Z" stroke="#E27C6C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path id="under-circle1" d="M42.6523 182.6C42.6523 184.6 50.3523 185.4 50.9523 187.3C51.5523 189.2 45.8523 194.4 47.0523 196C48.2523 197.6 54.8523 193.8 56.4523 194.9C58.0523 196.1 56.4523 203.6 58.3523 204.2C60.1523 204.8 63.3523 197.8 65.3523 197.8C67.3523 197.8 70.5523 204.8 72.3523 204.2C74.2523 203.6 72.6523 196 74.2523 194.9C75.8523 193.7 82.5523 197.6 83.6523 196C84.8523 194.4 79.0523 189.3 79.7523 187.3C80.3523 185.5 88.0523 184.7 88.0523 182.6C88.0523 180.6 80.3523 179.8 79.7523 177.9C79.1523 176 84.8523 170.8 83.6523 169.2C82.4523 167.6 75.8523 171.4 74.2523 170.3C72.6523 169.1 74.2523 161.6 72.3523 161C70.5523 160.4 67.3523 167.4 65.3523 167.4C63.3523 167.4 60.1523 160.4 58.3523 161C56.4523 161.6 58.0523 169.2 56.4523 170.3C54.8523 171.5 48.1523 167.6 47.0523 169.2C45.8523 170.8 51.6523 175.9 50.9523 177.9C50.3523 179.8 42.6523 180.6 42.6523 182.6Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>

                </g>
            </svg>

            <svg viewBox="0 0 271 220" fill="none" xmlns="http://www.w3.org/2000/svg" id="floating-ball-2">
                <g id="newyear2020">
                    <g id="jhalar2">
                        <path d="M96.3996 140.6C114.239 140.6 128.7 126.139 128.7 108.3C128.7 90.461 114.239 76 96.3996 76C78.5606 76 64.0996 90.461 64.0996 108.3C64.0996 126.139 78.5606 140.6 96.3996 140.6Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M96.4002 126.5C106.452 126.5 114.6 118.352 114.6 108.3C114.6 98.2476 106.452 90.0996 96.4002 90.0996C86.3482 90.0996 78.2002 98.2476 78.2002 108.3C78.2002 118.352 86.3482 126.5 96.4002 126.5Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M96.3996 117.6C101.536 117.6 105.7 113.436 105.7 108.3C105.7 103.164 101.536 99 96.3996 99C91.2636 99 87.0996 103.164 87.0996 108.3C87.0996 113.436 91.2636 117.6 96.3996 117.6Z" stroke="#EFC87E" stroke-miterlimit="10"/>
                        <path d="M96.3996 112.1C98.4986 112.1 100.2 110.399 100.2 108.3C100.2 106.201 98.4986 104.5 96.3996 104.5C94.3006 104.5 92.5996 106.201 92.5996 108.3C92.5996 110.399 94.3006 112.1 96.3996 112.1Z" fill="#EFC87E"/>
                        <path  id="under-cirlce2" d="M131.9 108.3C131.9 111.5 119.9 112.7 119 115.6C118 118.6 127 126.6 125.2 129.1C123.4 131.6 112.9 125.6 110.4 127.4C107.9 129.2 110.4 141 107.4 142C104.5 142.9 99.6 132 96.4 132C93.2 132 88.3 143 85.4 142C82.4 141 84.9 129.2 82.4 127.4C79.9 125.6 69.5 131.6 67.6 129.1C65.9 126.7 74.9 118.6 73.9 115.7C73 112.8 61 111.6 61 108.4C61 105.2 73 104 73.9 101.1C74.9 98.1 65.9 90.1 67.7 87.6C69.5 85.1 80 91.1 82.5 89.3C85 87.5 82.5 75.7 85.5 74.7C88.4 73.8 93.3 84.7 96.5 84.7C99.7 84.7 104.6 73.7 107.5 74.7C110.5 75.7 108 87.5 110.5 89.3C113 91.1 123.4 85.1 125.3 87.6C127.1 90.1 118.2 98.1 119.1 101.1C119.9 103.9 131.9 105.2 131.9 108.3Z" stroke="#E27C6C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M96.4004 76.1V1" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M99.2002 64.5H93.7002V70H99.2002V64.5Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M97.6996 54.2998H95.0996V56.8998H97.6996V54.2998Z" fill="#EFC87E"/>
                        <path d="M97.6996 48.7002H95.0996V51.3002H97.6996V48.7002Z" fill="#EFC87E"/>
                        <path d="M97.6996 43.7998H95.0996V46.3998H97.6996V43.7998Z" fill="#EFC87E"/>

                    </g>

                </g>
            </svg>
{{--            <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" id="star-1">--}}
{{--                <g id="newyear2020">--}}
{{--                    <g id="Group_28">--}}
{{--                        <path id="Vector_256" d="M220.9 47.9V68" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        <path id="Vector_257" d="M231 57.9H210.9" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        <path id="Vector_258" d="M225.9 53L216 62.9" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        <path id="Vector_259" d="M225.9 62.9L216 53" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    </g>--}}

{{--                </g>--}}
{{--            </svg>--}}
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" id="spin-2">
                <g id="Group_16">
                    <path d="M12.2002 9.4V1" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.4004 9.6L8.90039 1.5" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.6004 9.89999L5.90039 3" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.0004 10.4998L3.40039 5.2998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.59979 11.2002L1.7998 8.2002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.40002 12.0004L1 11.4004" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.49979 12.9004L1.2998 14.8004" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.80002 13.7002L2.5 17.9002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.2996 14.2998L4.59961 20.4998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.9998 14.7998L7.2998 22.3998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.8 15L10.5 23.4" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.5996 15L13.8996 23.4" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.4004 14.7998L17.1004 22.3998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.0996 14.2998L19.7996 20.4998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.5996 13.7002L21.8996 17.9002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 12.9004L23.2 14.8004" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 12.0004L23.4 11.4004" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.7998 11.2002L22.6998 8.2002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.4004 10.4998L21.0004 5.2998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.7998 9.89999L18.4998 3" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13 9.6L15.5 1.5" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
            </svg>
            <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg" id="spin-1">
                <g id="circle2">
                    <path d="M22.8994 17.3998V0.799805" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M24.5 17.6998L29.4 1.7998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M26 18.4002L35.4 4.7002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M27.2002 19.5002L40.2002 9.2002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M28.0996 20.8994L43.4996 14.8994" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M28.3994 22.5998L44.9994 21.2998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M28.2998 24.2002L44.4998 27.9002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M27.7002 25.7998L42.1002 34.0998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M26.7002 27L38.0002 39.2" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M25.2998 28L32.4998 43" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M23.7002 28.5L26.2002 44.9" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22.0996 28.5L19.5996 44.9" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.4998 28L13.2998 43" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.0998 27L7.7998 39.2" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.1002 25.7998L3.7002 34.0998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.4998 24.2002L1.2998 27.9002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.3998 22.5998L0.799805 21.2998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.7002 20.8994L2.2002 14.8994" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.4996 19.5002L5.59961 9.2002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.7994 18.4002L10.3994 4.7002" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.1994 17.6998L16.3994 1.7998" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
            </svg>
            <svg width="100px" height="100px" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" id="star-1">
                <g id="Group_28">
                    <path d="M11 1V21.1" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.1 11H1" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 6.09961L6 15.9996" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 15.9996L6 6.09961" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </g>

            </svg>
            <svg width="100px" height="100px" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" id="star-2">
                <g id="Group_28">
                    <path d="M11 1V21.1" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.1 11H1" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 6.09961L6 15.9996" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 15.9996L6 6.09961" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </g>

            </svg>
            {{--                    <g id="jhalar2">--}}
            {{--                        <path id="Vector_197" d="M197.5 176.9C215.339 176.9 229.8 162.439 229.8 144.6C229.8 126.761 215.339 112.3 197.5 112.3C179.661 112.3 165.2 126.761 165.2 144.6C165.2 162.439 179.661 176.9 197.5 176.9Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
            {{--                        <path id="Vector_198" d="M197.5 162.8C207.552 162.8 215.7 154.652 215.7 144.6C215.7 134.548 207.552 126.4 197.5 126.4C187.448 126.4 179.3 134.548 179.3 144.6C179.3 154.652 187.448 162.8 197.5 162.8Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
            {{--                        <path id="Vector_199" d="M197.5 153.9C202.636 153.9 206.8 149.736 206.8 144.6C206.8 139.464 202.636 135.3 197.5 135.3C192.364 135.3 188.2 139.464 188.2 144.6C188.2 149.736 192.364 153.9 197.5 153.9Z" stroke="#EFC87E" stroke-miterlimit="10"></path>--}}
            {{--                        <path id="Vector_200" d="M197.5 148.4C199.599 148.4 201.3 146.699 201.3 144.6C201.3 142.501 199.599 140.8 197.5 140.8C195.401 140.8 193.7 142.501 193.7 144.6C193.7 146.699 195.401 148.4 197.5 148.4Z" fill="#EFC87E"></path>--}}
            {{--                        <path id="under-cirlce2" d="M162 144.6C162 147.8 174 149 174.9 151.9C175.9 154.9 166.9 162.9 168.7 165.4C170.5 167.9 181 161.9 183.5 163.7C186 165.5 183.5 177.3 186.5 178.3C189.4 179.2 194.3 168.3 197.5 168.3C200.7 168.3 205.6 179.3 208.5 178.3C211.5 177.3 209 165.5 211.5 163.7C214 161.9 224.4 167.9 226.3 165.4C228.1 162.9 219.2 154.9 220.1 151.9C221 149 233 147.8 233 144.6C233 141.4 221 140.2 220.1 137.3C219.1 134.3 228.1 126.3 226.3 123.8C224.5 121.3 214 127.3 211.5 125.5C209 123.7 211.5 111.9 208.5 110.9C205.6 110 200.7 120.9 197.5 120.9C194.3 120.9 189.4 109.9 186.5 110.9C183.5 111.9 186 123.7 183.5 125.5C181 127.3 170.6 121.3 168.7 123.8C166.9 126.3 175.8 134.3 174.9 137.3C174 140.2 162 141.5 162 144.6Z" stroke="#E27C6C" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
            {{--                        <path id="Vector_201" d="M197.5 112.4V37.3" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
            {{--                        <path id="Vector_202" d="M194.727 106.224H200.227V100.724H194.727V106.224Z" stroke="#EFC87E" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>--}}
            {{--                        <path id="Vector_203" d="M196.227 93.2425H198.827V90.6425H196.227V93.2425Z" fill="#EFC87E"></path>--}}
            {{--                        <path id="Vector_204" d="M196.227 87.539H198.827V84.939H196.227V87.539Z" fill="#EFC87E"></path>--}}
            {{--                        <path id="Vector_205" d="M196.227 82.6783H198.827V80.0783H196.227V82.6783Z" fill="#EFC87E"></path>--}}
            {{--                    </g>--}}
        @endif
        <div class="banner-text">
            @if(\App\UseCases\ThemeTrait::isNewYear())
                <img src="https://imdibil.ru/images/newyear.png" style="width: 300px">
            @else
                <img src="https://imdibil.ru/images/logogo.png" style="width: 300px">
            @endif
            <h1 class="">Welcome to IMDibil</h1>
            <p>Откройте для себя кино с новой стороны</p>
            <div class="button-container">
                <a href="{{route('meetings')}}" class="button">Заседания</a>
                <a class="button quiz-btn" href="{{route('game')}}">Викторина</a>
                <a class="button" href="{{route('news')}}">Тройки</a>
                <a class="button" href="{{route('profile.index')}}">
                    <i class="fi fi-user-male d-none d-md-block"></i>
                    <span class="d-block d-md-none">Профиль</span>
                </a>

            </div>
        </div>


        <!-- Floating popcorn kernels -->
        <div id="popcorn-container"></div>

        <!-- Added film reel from Figma -->
        <div class="reel-1">
            <img src="https://imdibil.ru/images/pl.svg" alt="Film Reel" class="img-fluid"/>
        </div>
        <div class="reel-2">
            <img src="https://imdibil.ru/images/pl.svg" alt="Film Reel" class="img-fluid"/>
        </div>
        <div class="reel-3">
            <img src="https://imdibil.ru/images/pl.svg" alt="Film Reel" class="img-fluid"/>
        </div>
        <div class="splash-1">
            <svg width="891" height="939" viewBox="0 0 891 939" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="350.765" width="889" height="588" rx="39" fill="#121212"/>
                <g clip-path="url(#clip0_368_290)">
                    <rect x="2" y="350.765" width="889" height="100" rx="15" fill="#121212"/>
                    <rect x="804.48" y="212.765" width="94.8659" height="313.644" transform="rotate(24.3823 804.48 212.765)" fill="#D9D9D9"/>
                    <rect x="657.48" y="205.765" width="94.8659" height="313.644" transform="rotate(24.3823 657.48 205.765)" fill="#D9D9D9"/>
                    <rect x="510.48" y="198.765" width="94.8659" height="313.644" transform="rotate(24.3823 510.48 198.765)" fill="#D9D9D9"/>
                    <rect x="363.48" y="191.765" width="94.8659" height="313.644" transform="rotate(24.3823 363.48 191.765)" fill="#D9D9D9"/>
                    <rect x="216.48" y="184.765" width="94.8659" height="313.644" transform="rotate(24.3823 216.48 184.765)" fill="#D9D9D9"/>
                </g>
                <g clip-path="url(#clip1_368_290)">
                    <rect x="4.01758" y="261.677" width="889" height="100" transform="rotate(-17.1186 4.01758 261.677)" fill="#121212"/>
                    <rect x="730.326" y="-106.42" width="94.8659" height="313.644" transform="rotate(7.26377 730.326 -106.42)" fill="#D9D9D9"/>
                    <rect x="587.777" y="-69.8398" width="94.8659" height="313.644" transform="rotate(7.26377 587.777 -69.8398)" fill="#D9D9D9"/>
                    <rect x="445.229" y="-33.2598" width="94.8659" height="313.644" transform="rotate(7.26377 445.229 -33.2598)" fill="#D9D9D9"/>
                    <rect x="302.682" y="3.31934" width="94.8659" height="313.644" transform="rotate(7.26377 302.682 3.31934)" fill="#D9D9D9"/>
                    <rect x="160.133" y="39.8984" width="94.8659" height="313.644" transform="rotate(7.26377 160.133 39.8984)" fill="#D9D9D9"/>
                </g>
                <path d="M98.5 451.265H2V259.765L55 242.265L107.5 402.265L98.5 451.265Z" fill="#121212" stroke="white" stroke-width="3"/>
                <ellipse cx="26" cy="430.765" rx="12" ry="11" fill="white"/>
                <ellipse cx="81" cy="400.765" rx="12" ry="11" fill="white"/>
                <ellipse cx="40" cy="300.765" rx="12" ry="11" fill="white"/>
                <line x1="53" y1="554.5" x2="822" y2="554.5" stroke="#F6C700" stroke-width="7"/>
                <line x1="279" y1="555" x2="279" y2="718" stroke="#F6C700" stroke-width="2"/>
                <line x1="586" y1="555" x2="586" y2="718" stroke="#F6C700" stroke-width="2"/>
                <line x1="52" y1="717.5" x2="822" y2="717.5" stroke="white"/>
                <line x1="52" y1="795.5" x2="822" y2="795.5" stroke="white"/>
                <line x1="52" y1="873.5" x2="822" y2="873.5" stroke="white"/>
                <defs>
                    <clipPath id="clip0_368_290">
                        <rect width="889" height="100" fill="white" transform="translate(2 350.765)"/>
                    </clipPath>
                    <clipPath id="clip1_368_290">
                        <rect width="889" height="100" fill="white" transform="translate(4.01758 261.677) rotate(-17.1186)"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="splash-2">
            <img src="https://imdibil.ru/images/splash.svg" alt="Film Reel" class="img-fluid"/>
        </div>

        <div class="popcorn-box popcorn-container">
            <svg width="395" height="438" viewBox="0 0 395 438" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M340.5 436.5H73L1.5 1.5H393.5L340.5 436.5Z" fill="#2A2A2A" stroke="#5A5A5A"/>
                <path d="M96.5 435L46 1H113L141.5 435H96.5Z" fill="#FFC107" stroke="#F6C700"/>
                <path d="M303.236 437L354 3H286.649L258 437H303.236Z" fill="#FFC107" stroke="#F6C700"/>
                <path d="M177.052 437H221.466L229 3H160L177.052 437Z" fill="#FFC107" stroke="#F6C700"/>
            </svg>
        </div>

        <div class="camera ">
            <svg width="2775" height="1195" viewBox="0 0 2775 1195" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="393" y="787" width="202" height="140" rx="66" fill="#4B4B4B"/>
                <path d="M393 1181C393 1144.55 422.549 1115 459 1115H529C565.451 1115 595 1144.55 595 1181V1195H393V1181Z" fill="#4B4B4B"/>
                <rect x="106" y="410" width="777" height="433" rx="56" fill="#5F5F5F"/>
                <rect x="340" y="234" width="304" height="176" fill="#424242"/>
                <circle cx="335" cy="205" r="166" fill="#484848"/>
                <circle cx="681" cy="205" r="166" fill="#484848"/>
                <circle cx="335.5" cy="204.5" r="93.5" fill="#D9D9D9"/>
                <circle cx="681.5" cy="204.5" r="93.5" fill="#D9D9D9"/>
                <circle cx="335" cy="205" r="29" fill="#3D3D3D"/>
                <circle cx="681" cy="205" r="29" fill="#3D3D3D"/>
                <circle cx="501.5" cy="370.5" r="20.5" fill="#D9D9D9"/>
                <path d="M2775 0L1070.5 494V674L2775 1073.5V0Z" fill="#DCDCDC" fill-opacity="0.5" class="light"/>
                <path d="M913.286 620.522L907.873 552.47C907.36 546.032 911.318 540.079 917.453 538.061L1081.62 484.046C1090.68 481.066 1100 487.812 1100 497.345V677.026C1100 686.738 1090.35 693.499 1081.22 690.186L922.466 632.572C917.309 630.701 913.721 625.991 913.286 620.522Z" fill="#767676"/>
                <path d="M883 535H927V634H883V535Z" fill="#4B4B4B"/>
                <path d="M883 598H893C904.046 598 913 606.954 913 618V703C913 714.046 904.046 723 893 723H883V598Z" fill="#4B4B4B"/>
                <rect x="169" y="510" width="649" height="265" rx="48" fill="#969696"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M660.614 612.45C667.763 621.323 678.718 627 691 627C712.539 627 730 609.539 730 588C730 581.569 728.443 575.501 725.686 570.153L660.614 612.45ZM721.932 564.244C714.802 554.974 703.599 549 691 549C669.461 549 652 566.461 652 588C652 594.746 653.713 601.092 656.727 606.627L721.932 564.244Z" fill="#D9D9D9"/>
                <circle cx="235.5" cy="727.5" r="21.5" fill="#D9D9D9"/>
                <circle cx="283.5" cy="727.5" r="21.5" fill="#D9D9D9"/>
                <circle cx="331.5" cy="727.5" r="21.5" fill="#D9D9D9"/>
                <rect x="449" y="909" width="84" height="271" fill="#4B4B4B"/>
                <circle cx="491.5" cy="973.5" r="64.5" fill="#5F5F5F"/>
                <path d="M491 924L523.139 935.698L540.24 965.318L534.301 999L508.101 1020.98H473.899L447.699 999L441.76 965.318L458.861 935.698L491 924Z" fill="#4B4B4B"/>
                <path d="M52 630.452V586.762C52 582.932 49.8125 579.438 46.367 577.766L14.867 562.474C8.2255 559.25 0.5 564.088 0.5 571.47V646.966C0.5 654.484 8.4848 659.314 15.1433 655.823L46.6433 639.308C49.9367 637.582 52 634.17 52 630.452Z" fill="#424242"/>
                <rect x="48" y="579" width="58" height="59" fill="#5F5F5F"/>
                <rect x="28" y="927" width="226" height="55" rx="27.5" fill="#424242"/>
                <ellipse cx="225" cy="551.5" rx="17" ry="16.5" fill="#FFC107" class="light"/>

            </svg>


        </div>
    </div>
</div>
<div class="container my-5">
    <h3 class="text-white">Кто мы?</h3>
    <p class="text-white">
        Imdibil - <s>Киноклуб мгту имени баумана</s> Компания друзей, которые любят обсуждать кино. На протяжении почти двух лет мы периодически собираемся для того, чтобы поговорить о фильмах, и  вот наконец настал момент, когда мы поняли, что хотим делиться нашим <s>авторитетным</s> мнением с вами.
    </p>
    <p class="text-white">
        Этот портал был создан для ведения хроники наших заседаний, но вырос в нечто большее и теперь это уютное место для всех, кто как и мы не может представить свою жизнь без кинематографа
    </p>
    <p class="text-white">
        Кроме этого портала, у нас есть также <a href="https://t.me/imdibil_ru" class="text-gold">телеграм-канал</a>, где мы делимся нашими мнениями и впечатлениями от различных событий из мира кино.
    </p>
</div>
    <div class="container content my-5" id="history-cards">

        <h3 class="text-white">Прошедшие заседания</h3>

        <div class="mt-2">
            <div class="flickity-preloader flickity-white flickity-dot-line"
                 data-flickity='{ "autoPlay": false, "cellAlign": "left", "pageDots": false, "prevNextButtons": false, "contain": true, "rightToLeft": false }'>
                @foreach($meetings as $meeting)
                    <div class="col-6 col-md-2 px-1 rounded-10 moview-card">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img data-src="https://imdibil.ru/images/posters/{{$meeting->movie->poster}}" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="Meeting Poster 1" class="lazy movie-poster">
                                </div>
                                <div class="card-back">
                                    <p class="h4">{{$meeting->movie->name_m}}</p>
                                    <p>{{\Carbon\Carbon::parse($meeting->date_at)->translatedFormat('d F Y')}}</p>
                                    <div class="star-rating text-center w-100" data-bs-toggle="tooltip" data-bs-placement="right"
                                         title="Оценка фильма: {{$meeting->movie->our_rate}}" data-rating="{{$meeting->movie->our_rate}}"></div>
                                    <a class="btn btn-outline-warning btn-sm mt-3 rounded-pill" href="{{route('meetings')}}">Подробнее</a>
                                </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
<div class="container-fluid bottom-0 py-4">
    <footer >
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-white">Главная</a></li>
            <li class="nav-item"><a href="{{route('news')}}" class="nav-link px-2 text-white">Новости</a></li>
            <li class="nav-item"><a href="{{route('meetings')}}" class="nav-link px-2 text-white">Заседания</a></li>
            {{--                <li class="nav-item"><a href="/feedback.php" class="nav-link px-2 text-muted">Форум</a></li>--}}
            <li class="nav-item"><a href="{{'statictics'}}" class="nav-link px-2 text-white">Аналитика</a></li>
            <li class="nav-item"><a href="{{'quiz'}}" class="nav-link px-2 text-white">Викторина</a></li>
        </ul>
        <p class="text-center text-white">© 2022 - {{\Carbon\Carbon::now()->format('Y')}} IMDBil</p>
    </footer>
</div>
<script src="{{asset('/js/core.min.js')}}"></script>

<script>
    function createPopcornKernel(num = 1) {
        let i = 0;
        for(i = 0; i < num; i++)
        {
            setTimeout(() => {
                const kernel = document.createElement('div');
                kernel.className = 'popcorn-kernel';

                // Set random size
                const size = Math.random() * 10 + 10; // Size between 10 and 20px
                kernel.style.width = `${size}px`;
                kernel.style.height = `${size}px`;

                // Set random horizontal translation
                const randomX = Math.random() * 150 - 70; // Random value between -50 and 50px
                kernel.style.setProperty('--random-x', `${randomX}px`);

                document.body.appendChild(kernel);

                const rect = document.querySelector('.popcorn-container').getBoundingClientRect();
                kernel.style.left = `${rect.left + rect.width / 2 - size / 2}px`;
                kernel.style.top = `${rect.top - size}px`;

                setTimeout(() => {
                    kernel.remove();
                }, 3000);
            }, 300+i*100);

        }
    }

    setInterval(createPopcornKernel, 500);

    function spawnPopcornKernels() {
        let width = window.innerWidth

        let numKernels = Math.floor(Math.random() * 11) + 5; // Random number between 5 and 15

        if(width <= 800)
        {
            numKernels =0
        }
        for (let i = 0; i < numKernels; i++) {
            const kernel = document.createElement('div');
            kernel.className = 'popcorn';

            // Set random size
            const size = Math.random() * 10 + 10; // Size between 10 and 20px
            kernel.style.width = `${size}px`;
            kernel.style.height = `${size}px`;
            let left = Math.random() * 70 + 20
            let top = Math.random() * 70 + 20
            while (left > 30 && left < 60 && top > 30 && top < 60)
            {
                left = Math.random() * 60 + 20
                top = Math.random() * 60 + 20

            }

            // Set random position
            kernel.style.left = `${left}vw`;
            kernel.style.top = `${top}vh`;

            document.getElementById('popcorn-container').appendChild(kernel);
        }
    }
    $('.popcorn-box').on('click', function () {
        createPopcornKernel(20)
    })

    document.addEventListener('DOMContentLoaded', spawnPopcornKernels);
</script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('/js/vendor_bundle.min.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>

</body>
</html>
