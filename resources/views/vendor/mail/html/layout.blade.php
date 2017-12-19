<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
    .logo-cnt {
      display: flex;
      justify-content: center;
      height: 50px;
      padding: 0;
      font-size: 18px;
      line-height: 20px;
    }
    .logo-cnt a {
      display: flex;
      justify-content: center;
    }
    .logo-cnt .logo {
        max-height: 50px;
        display: block;
    }
    .logo-cnt a{
      text-decoration: none;
      font-size: 25px;
      font-weight: bold;
      color: black;
    }
    .nom-bar-haut{
      position: relative;
      top: 25%;
    }
    .logo-cnt span{
      float: left;
    }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                  <div class="container">
                          <!-- Logo -->
                          <div class="logo-cnt">
                              <a href="{{ url('/') }}">
                              <span class="col-md-4 col-sm-4 col-xs-4">
                                <img class="logo" src="{{asset('img/logo.png')}}" alt="logo">
                              </span>
                              <span class="nom-bar-haut col-md-4">OpenEnsat</span>
                              </a>

                          </div>


                  </div>
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}

                                        {{ $subcopy or '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer or '' }}
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
