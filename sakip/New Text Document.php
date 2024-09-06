<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111" />



  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <title>CodePen - Creating a Radar Chart using Chart.js</title>

  <link rel="stylesheet" media="screen" href="https://cpwebassets.codepen.io/assets/fullpage/fullpage-353bfa90b2f3b218d6c363d890ce4daed555cf399f11ee62709db9b87cd88dbe.css" />
  

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

    <meta name="apple-mobile-web-app-title" content="CodePen">

    <link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

    <link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg" color="#111" />





  <title>CodePen - Creating a Radar Chart using Chart.js</title>

  <style>
    html { font-size: 15px; }
    html, body { margin: 0; padding: 0; min-height: 100%; }
    body { height:100%; display: flex; flex-direction: column; }
    .referer-warning {
      background: black;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      padding: 0.75em;
      color: white;
      text-align: center;
      font-family: 'Lato', 'Lucida Grande', 'Lucida Sans Unicode', Tahoma, system-ui, Sans-Serif;
      line-height: 1.2;
      font-size: 1rem;
      position: relative;
      z-index: 2;
    }
    .referer-warning span { font-family: initial; }
    .referer-warning h1 { font-size: 1.2rem; margin: 0; }
    .referer-warning a { color: #56bcf9; }
  </style>
</head>

<body class="">
  <div class="referer-warning">
    <h1><span>⚠️</span> Do not enter passwords or personal information on this page. <span>⚠️</span></h1>
      This is a code demo posted by a web developer on <a href="https://codepen.io">CodePen</a>.
    <br />
    A referer from CodePen is required to render this page view, and your browser is not sending one (<a href="https://blog.codepen.io/2017/10/05/regarding-referer-headers/" target="_blank" rel="noreferrer noopener">more details</a>).</h1>
  </div>

  <div id="result-iframe-wrap" role="main">
    <iframe
      id="result"
      srcdoc="<!DOCTYPE html>
<html lang=&quot;en&quot; >

<head>
  <meta charset=&quot;UTF-8&quot;>
  

    <link rel=&quot;apple-touch-icon&quot; type=&quot;image/png&quot; href=&quot;https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png&quot; />

    <meta name=&quot;apple-mobile-web-app-title&quot; content=&quot;CodePen&quot;>

    <link rel=&quot;shortcut icon&quot; type=&quot;image/x-icon&quot; href=&quot;https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico&quot; />

    <link rel=&quot;mask-icon&quot; type=&quot;image/x-icon&quot; href=&quot;https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg&quot; color=&quot;#111&quot; />



  
    <script src=&quot;https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js&quot;></script>


  <title>CodePen - Creating a Radar Chart using Chart.js</title>

    <link rel=&quot;canonical&quot; href=&quot;https://codepen.io/Shokeen/pen/WpOzxL&quot;>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato'>
  

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
</head>

<body translate=&quot;no&quot;>
  <canvas id=&quot;marksChart&quot; width=&quot;600&quot; height=&quot;400&quot;></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
      <script id=&quot;rendered-js&quot; >
var marksCanvas = document.getElementById(&quot;marksChart&quot;);

var marksData = {
  labels: [&quot;English&quot;, &quot;Maths&quot;, &quot;Physics&quot;, &quot;Chemistry&quot;, &quot;Biology&quot;, &quot;History&quot;],
  datasets: [{
    label: &quot;Student A&quot;,
    backgroundColor: &quot;rgba(200,0,0,0.2)&quot;,
    data: [65, 75, 70, 80, 60, 80] },
  {
    label: &quot;Student B&quot;,
    backgroundColor: &quot;rgba(0,0,200,0.2)&quot;,
    data: [54, 65, 60, 70, 70, 75] }] };



var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData });
//# sourceURL=pen.js
    </script>

  
</body>

</html>
"
      sandbox="allow-forms allow-modals allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation allow-downloads allow-presentation" allow="camera *; display-capture *; geolocation *; microphone *; web-share *" allowTransparency="true"
      allowpaymentrequest="true" allowfullscreen="true" class="result-iframe">
      </iframe>
  </div>

</body>

</html>
