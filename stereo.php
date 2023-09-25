<html lang="en">
  <head>
    <title>VR Stereo JPS Viewer</title>
    <meta charset="UTF-8">

    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-stereo-component@0.5.x/dist/aframe-stereo-component.min.js"></script>

  </head>
  <body>

    <a-scene>
      <a-assets>
        <?php
          $jps = htmlspecialchars($_GET["jps"]);
          echo("<img id=\"jps\" src=\"$jps\">");

          list($jps_width, $jps_height, $jps_type, $jps_attr) = getimagesize("$jps");
          $jps_width = $jps_width / 2;
          $jps_ratio = $jps_height / $jps_width;

          if($jps_ratio > 1){
            $z = -1.5;
          }else{
            $z = -1;
          }
        ?>
      </a-assets>

      <a-sky color="#888888"></a-sky>

      <a-camera stereocam="eye: left"></a-camera>

      <a-plane material="src: #jps; repeat: 0.5 1;"               position="0 1.5 <?php echo($z); ?>" height="<?php echo($jps_ratio); ?>" stereo="eye: left" ></a-plane>
      <a-plane material="src: #jps; repeat: 0.5 1; offset: 0.5 0" position="0 1.5 <?php echo($z); ?>" height="<?php echo($jps_ratio); ?>" stereo="eye: right"></a-plane>

    </a-scene>

  </body>
</html>
