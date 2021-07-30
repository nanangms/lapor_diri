<!DOCTYPE html>
<html>
<head>
	<title>Sertifikat Gowes</title>
</head>
<style type="text/css">
	#watermark{
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
    width:    29.3cm;
    height:   20.6cm;
    /* Your watermark should be behind every content*/
    z-index:  -1000;
  }
           
  .font-kop{
    font-family: sans-serif;
    font-size: 60;
  }
  .font-title{
    font-family: sans-serif;
    font-size: 27;
  }
  .rata_kiri{
    text-align: left;
  }
</style>

<body>
	<div id="watermark">
    <img align="center" src="images/setifikatdowes_merdeka76.jpeg" height="100%" width="100%" /> 
  </div>
    <br><br><br><br><br><br><br><br><br>
	<div class="font-kop" style="margin-top: 220; margin-left: -20; color: white;"><b>{{$pendaftaran->kategori}}</b></div>
  <br>
  <div class="font-title" style="margin-top: -200; margin-left: -230; text-align: center;">
	<b>{{$pendaftaran->nama}}</b></div>

</body>
</html>