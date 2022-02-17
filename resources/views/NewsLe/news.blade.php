
@php
    //url del sitio
    $urisitio = "http://127.0.0.1:8000";
    //contador para el arreglo de las imagenes
    $contadorimgs=count($imgs);
    //redes sociales.
    $facebook="https://www.facebook.com/";

@endphp

 <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
  </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>

<div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
    <table role="presentation" style="width:100%;border:none;border-spacing:0;">
      <tr>
        <td align="center" style="padding:0;">
          <!--[if mso]>
          <table role="presentation" align="center" style="width:600px;">
          <tr>
          <td>
          <![endif]-->
          <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
            <tr>
              <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                <a href="{{$urisitio}}" style="text-decoration:none;"><img src="{{$message->embed("images/logo/logo_verde.png")}}" width="250" alt="Logo" style="width:250px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
              </td>
            </tr>
            <tr>
              <td style="margin-top:-15px;text-align:center;font-size:24px;font-weight:bold;">
                <a href="{{$urisitio}}" style="text-decoration:none;"><h2 class="text-center" style="color: #348C39; font-weight: bolder; font-size: 35pt; font-style: oblique;" >9Volcanes</h2></a>
              </td>
            </tr>
            <tr>
              <td style="padding:30px;background-color:#ffffff;">
                <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">{{$ttlo}}</h1>
                <p style="margin:0;">{{$crp}} <a href="{{$urisitio}}" style="color:#e50d70;text-decoration:underline;">Visitanos!</a></p>
              </td>
            </tr>
             <!-->
              El for de acontinuacion recorre el arreglo de imagenes si es que se va a enviar mas de una
            <----->
            @for ($i = 0; $i < $contadorimgs; $i++)
            <tr>
              <td style="padding:30px;font-size:24px;line-height:28px;font-weight:bold;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                <a href="{{$urisitio}}" style="text-decoration:none;">
                  <img src="{{$message->embed("storage/$imgs[$i]")}}" width="540" alt="" style="width:100%;height:auto;border:none;text-decoration:none;color:#363636;">
                </a>
              </td>
            </tr>
            @endfor
            <tr>
              <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc">
                <p style="margin:0 0 8px 0" >
                  <a href="{{$facebook}}" style="text-decoration:none" target="_blank">
                  <img src="https://ci6.googleusercontent.com/proxy/vKB7V0OmsLwQoTRC8BbPAGXWrTKqY2VyTuk5NWsPS2lOMYnCxzaZqd8IsQVSx3rqnFBcvaqC4arcel4yEyEtWaLp=s0-d-e1-ft#https://assets.codepen.io/210284/facebook_1.png" alt="facebook" style="display:inline-block;color:#cccccc" width="40" height="40" >
                  </a>
                </p>
                <p style="margin:0;font-size:14px;line-height:20px">
                    ® 9 VOLCANES 2022
                    <br>
                </p>
              </td>
            </tr>
          </table>
          <!--[if mso]>
          </td>
          </tr>
          </table>
          <![endif]-->
        </td>
      </tr>
    </table>
  </div> 


