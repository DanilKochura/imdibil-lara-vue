<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рассылка</title>

    <style>a {
            color: #333333;
            font: 14px Arial, sans-serif;
            line-height: 30px;
            -webkit-text-size-adjust: none;
            display: block;
        }

        span {
            color: #333333;
            font: 14px Arial, sans-serif;
            line-height: 30px;
            -webkit-text-size-adjust: none;
        }

        img {
            display: block;
        }

        table {
            background-color: #f8f8f8;
            color: #000000;
            font-family: "arial", sans-serif;
            font-size: 14px;
        }</style>
</head>
<body>


<table border="0" cellpadding="0" cellspacing="0" width="600px"
       style="padding:0; background-color:#f8f8f8;color:#000000;font-size:16px; margin: 0 auto" class="table">
    <tbody>
    <tr>
        <td style="padding:60px 45px 60px 45px">

            <img height="45" src="https://bot.imdibil.ru/images/logogo.png" width=""
                 style="margin-bottom:15px;margin-left:25px">

            <table align="center" cellpadding="0" cellspacing="0" width="100%"
                   style="background-color:#fff;border:1px solid #e6e6e6;padding:25px 20px 50px 25px; border-radius: 5px;">
                <tbody>
                <tr>
                    <td><h2>Добро пожаловать в сообщество IMDibil</h2></td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Здравствуйте, {{$user->name}}. Вы успешно зарегистрировались на портале imdibil.ru.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>Ваш логин: {{$user->login}}</td>
                </tr>
                <tr>
                    <td>Ваш пароль: {{$password}}</td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <p>
                                Кстати, на портале вы можете проверить свою эрудицию в областе кино, приняв участие в
                                викторине:
                            </p>
                            <div style="margin: 28px auto;width: 200px;text-align: center;font-size: 14px;"><a class="btn" style="background-color: #fad776;padding: 6px 10px;border-radius: 50px;color: rgb(255, 255, 255);text-decoration: none;" href="{{route('game')}}">Играть </a>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <table align="center" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr>
                    <td style="background-image:url('https://scheduler.imdibil.ru/assets/images/logo/img_1.png');padding-top:12px"></td>
                </tr>

                <tr>
                    <td><p style="color:#888888;font-size:12px; padding: 0 30px">Пожалуйста, не отвечайте на это письмо.
                            Связаться со службой поддержки Imdibil Вы можете по адресу <a
                                href="mailto:d.kochura@imdibil.ru" style="display: inline;">d.kochura@imdibil.ru</a>
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>

        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
