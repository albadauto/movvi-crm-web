<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Email Kaptu</title>
</head>

<body
    style="
      margin: 0;
      padding: 0;
      background-color: #f4f6fb;
      font-family: Arial, Helvetica, sans-serif;
    "
>
<!-- CONTAINER -->
<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f4f6fb">
    <tr>
        <td align="center">
            <!-- CARD PRINCIPAL -->
            <table
                width="600"
                cellpadding="0"
                cellspacing="0"
                style="
              max-width: 600px;
              background: #ffffff;
              border-radius: 12px;
              overflow: hidden;
              box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            "
            >
                <!-- HEADER -->
                <tr>
                    <td
                        align="center"
                        style="
                  background: #f1efe7;
                  padding: 30px;
                "
                    >
                        <img
                            src="https://raw.githubusercontent.com/albadauto/kaptu-web/refs/heads/master/public/img/logo.png"
                            alt="Kaptu Logo"
                            width="180"
                            style="display: block; margin-bottom: 15px"
                        />

                        <h1
                            style="
                    color: #000000;
                    margin: 0;
                    font-size: 24px;
                    font-weight: 600;
                  "
                        >
                            Comunicação Movvi
                        </h1>
                    </td>
                </tr>

                <!-- FAIXA LARANJA -->
                <tr>
                    <td style="height: 6px; background: #050a30"></td>
                </tr>

                <!-- CONTEÚDO DINÂMICO -->
                <tr>
                    <td
                        style="
                  padding: 40px 35px;
                  color: #333333;
                  font-size: 16px;
                  line-height: 1.6;
                "
                    >
                        <h2 style="color: #050a30; margin-top: 0">
                            {{$titulo}}
                        </h2>
                        <p>
                            {{$mensagem}}
                        </p>

                        <!-- BOTÃO -->
                        <table
                            cellpadding="0"
                            cellspacing="0"
                            align="center"
                            style="margin-top: 25px"
                        >
                            <tr>

                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- DIVISOR -->
                <tr>
                    <td style="border-top: 1px solid #eeeeee"></td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td
                        align="center"
                        style="padding: 25px; color: #777777; font-size: 13px"
                    >
                        <p style="margin: 0">
                            © 2026 Movvi • Todos os direitos reservados
                        </p>


                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
