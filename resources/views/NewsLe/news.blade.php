
@php
    //url del sitio
    $urisitio = "http://127.0.0.1:8000";
    //contador para el arreglo de las imagenes
    $contadorimgs=count($imgs);
@endphp
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
                <a href="{{$urisitio}}" style="text-decoration:none;"><img src="https://assets.codepen.io/210284/logo.png" width="165" alt="Logo" style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
              </td>
            </tr>
            <tr>
              <td style="padding:30px;background-color:#ffffff;">
                <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">{{$ttlo}}</h1>
                <p style="margin:0;">{{$crp}}<a href="{{$urisitio}}" style="color:#e50d70;text-decoration:underline;">Visitanos!</a></p>
              </td>
            </tr>
             <!-->
              El for de acontinuacion recorre el arreglo de imagenes si es que se va a enviar mas de una
            <!-->
            @for ($i = 0; $i < $contadorimgs; $i++)
            <tr>              
              <td style="padding:0;font-size:24px;line-height:28px;font-weight:bold;">
                <a href="{{$urisitio}}" style="text-decoration:none;">
                  
                  <img src="{{$message->embed("storage/$imgs[$i]")}}" width="600" alt="" style="width:100%;height:auto;display:block;border:none;text-decoration:none;color:#363636;">
                  
                </a>
              </td>              
            </tr>
            @endfor
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


