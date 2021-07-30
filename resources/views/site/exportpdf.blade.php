<!DOCTYPE html>
<html>
<head>
	<title>Bukti Pendaftaran</title>
<style>

</style> 
</head>

  <style type="text/css">
  	#watermark {
      position: fixed;
      /** 
          Set a position in the page for your image
          This should center it vertically
      **/
      margin-bottom:   -1cm;
      margin-left:     -1cm;
      margin-top: -1cm;
      margin-right: -1cm;
      /* Change image dimensions*/
      width:    15.5cm;
      height:   13.7cm;
      /* Your watermark should be behind every content*/
      z-index:  -1000;
    }  
    .font-kop{
      font-family: sans-serif;
      font-size: 70;
    }
    .font-title{
      font-family: sans-serif;
      font-size: 20;
    }
    .rata_kiri{
      text-align: left;
    }
  </style>

  <body>
  	<div id="watermark">
      <img align="center" src="images/desain_no_peserta.jpg" height="100%" width="100%" />
    </div>
    <br><br><br><br><br><br>
  	<div class="font-kop" align="center"><b>{{$pendaftaran->no_pendaftaran}}</b></div>
    <div class="font-title" align="center"><b>{{$pendaftaran->nama}}</b></div>

  </body>
</html>