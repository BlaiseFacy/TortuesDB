<?php
session_start();

require("../dbConnection.php"); // Page contenant les methodes de connection et les paramétrages sql
require("../util.php");

// Connexion à la base de données
dbConnect();

$tableMaj = getTableMaj();

$queryTableMaj = "SELECT max(date_maj), max(nb_tortues) FROM $tableMaj";
$result = mysql_query($queryTableMaj) or die ('Erreur SQL !'.$queryTableMaj.'<br />'.mysql_error());
$lastMaj = mysql_fetch_row($result);
$lastDatesMaj = $lastMaj[0];
$nbTortues = intval($lastMaj[1]);
mysql_free_result($result);

$dateDerniereMaj = f_dateEN($lastDatesMaj);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<html>
<head>
<title>Collection de tortues</title>
<link href="./tortue.ico" rel="shortcut icon">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="tortues, tortue, chélonien, chéloniens, collection, collections, collectionneur, collectionneurs">
<meta name="keywords" content="reptile, reptiles, turtle, tortoise">
<meta name="description" content="Présentation d'une collection de tortues de plus de 36000 pièces, de tous matériaux et de toutes formes">
<meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
<link href="./css/simple-sidebar.css" rel="stylesheet">
<link href="./css/tortues.css" rel="stylesheet">
<script type="text/javascript" src="./js/jquery.min.js"></script>

<style type="text/css">
<!--

-->
</style>	

</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
			<?php include("./menu.php"); ?>
        </div>
        <!-- /#sidebar-wrapper -->

		<div id="hautDePage" style="text-align:center">
			<div id="entete"></div>
			<div id="enteteFlash"><embed width="608" height="98" src="./images/tortuerfys.swf"></div>
			<div id="titre"></div>
			<div class="bouton"><a href="#menu-toggle" id="menu-toggle">MENU</a></div>
		</div>
		
        <!-- Page Content -->
		<div id="page-content-wrapper">
			<div style="padding:20px;">



			
			
<audio src='./son/David Bowie & Queen - Under Pressure.mp3' id='musique' autoplay controls loop><span class='ko'>&lt;audio&gt; non supportée !</span></audio>

<p class="MsoNormal" align="center" style="text-align:center"><font face="Times New Roman"><font color="#FFCC99" size="6"><b><span style="mso-ansi-language: EN-US" lang="EN-US">INTRODUCTION<o:p>
</o:p>
</span></b></font><font size="4" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US"><o:p>
</o:p>
</span></font></font></p>
<p class="MsoNormal"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">&nbsp;<o:p> 
  Beeing a collector of turtles of <?php echo $nbTortues ?> items in my collection, I wish to 
  get in touch with other collectors or turtle-freaks to share information or 
  exchange items on a basis of mutual interest.<o:p> </o:p> <br>
  <br>
  </span></font><font face="Times New Roman"><font size="4" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US">This 
  web page is intended to give a short overview of my collection.<o:p> </o:p></span></font></font></p>
<p align="center" class="MsoNormal"><font face="Times New Roman"><font size="4" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US"> 
  <br>
  <br>
  </span></font></font><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">As 
  I do not speak english at all, further contacts will take place using a web 
  based translation tool. My objective is to exchange ideas or…collection items. 
  That’s the reason why, if you feel like doing it, I warmly invite you to contact 
  me.<br>
  <br>
  <font color="#FF0000">This site comes partly to be rewritten and reorganized.<br>
  Certain headings were remelted, removed or added.<br>
  The principal innovation is the setting on line of the whole of my data base 
  with the possibility of viewing the whole of the collection (texts and photographs) 
  - Heading &quot;La Collection&quot; - </font></span></font></p>
<p class="MsoNormal" align="justify">&nbsp;</p>
<p class="MsoNormal" align="center"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><br>
</span></font><font color="#FFCC99" size="6" face="Times New Roman"><b><span style="mso-ansi-language: EN-US" lang="EN-US">WHY
DO I COLLECT TURTLE-LIKE ITEMS?</span></b></font></p>
<p class="MsoNormal" align="center"><font face="Times New Roman"><font size="4" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US"><br>
&nbsp;</span></font></font><font size="4" color="#FFCC99"><font face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">I
unexpectedly started this collection in 1969 and I am still wondering why.</span></font></font></p>
<p class="MsoNormal" align="center"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">I
feel like an a-typical collector because I am not particularly fond of turtles<br>
(an endangered species among many others…)<o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="justify"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">There
should be reasons somewhere else and I primarily suspected the human inclination
to gather things without specific purposes. Time has passed and I
finally got more clearly defined goals and some criteria my collection has to
meet.<o:p>
</o:p>
</span></font></p>
<p class="MsoNormal"><font face="Times New Roman"><font size="4" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US">&nbsp;</span></font><font size="4" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US">Therefore
I try to acquire specific turtle-like items, particulars in two ways:<o:p>
</o:p>
</span></font></font></p>
<p class="MsoNormal" style="margin-left:18.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;
tab-stops:list 18.0pt"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
· <span style="mso-ansi-language: EN-US">Made of any type of material<o:p>
</o:p>
</span></span></font></p>
<p class="MsoNormal" style="margin-left:18.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;
tab-stops:list 18.0pt"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
· <span style="mso-ansi-language: EN-US">Of any shape or nature ( e.g. box,
clock, toy, toothbrush and so on…)<o:p>
</o:p>
</span></span></font></p>
<p class="MsoNormal"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">The
only limits I consider are size or costs<o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="justify"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">However,
beeing a collector, there is always an opportunity for me to catch, during
business trips as well as vacation periods, there are many things to learn
regarding artefacts technology, material origins and names, or even better the
customs and habits of turtles.</span></font></p>
<p class="MsoNormal"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><o:p>
&nbsp;
</span></font></p>
<p class="MsoNormal"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"> 
  </span></font></p>
<p class="MsoNormal" align="center"><font color="#FFCC99" size="6"><b><span style="mso-ansi-language: EN-US" lang="EN-US">&nbsp;INDEXING
TECHNIQUES</span></b></font><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><br>
<br>
After a while, I had to organize my collection and to find a way to classify my
items.<o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="justify"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">Getting
them numbered, I recorded my list on a computer with several descriptors&nbsp;:
item number, category, material, color, form, note, weight, dimensions, year of
acquisition, picture (photography).<o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="justify"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">&nbsp;<o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="justify"><span style="mso-ansi-language: EN-US" lang="EN-US"><font color="#FFCC99" face="Times New Roman" size="4">The</font><font color="#FFCC99" face="Times New Roman" size="6">
<b>Serial number</b></font><font size="4" color="#FFCC99" face="Times New Roman">
is based on acquisition’s date, it is unique and is written on a label
attached or stuck to the item.<br>
<br>
</font></span><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">There
are seven </span></font><font color="#FFCC99" face="Times New Roman" size="6"><span lang="EN-US"><b><span style="mso-ansi-language: EN-US">C</span></b></span></font><font color="#FFCC99" face="Times New Roman" size="6"><span lang="EN-US"><b><span style="mso-ansi-language: EN-US">ategories</span></b></span></font><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">:
<b>Mineral, Metal, Vegetal, Animal, Glas – Crystal, Synthetic.<br>
<br>
</b></span></font><font color="#FFCC99" face="Times New Roman" size="6"><span lang="EN-US"><b><span style="mso-ansi-language: EN-US">Material</span></b></span></font><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"></span><span style="mso-ansi-language: EN-US" lang="EN-US">:
it describes the real components of the artefact&nbsp;; there can be a mix of
three different basic components.<br>
<br>
</span></font><font color="#FFCC99" face="Times New Roman" size="6"><span lang="EN-US"><b><span style="mso-ansi-language: EN-US">Color</span></b></span></font><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"></span><span style="mso-ansi-language: EN-US" lang="EN-US">:
the main colors are listed according to their importance on the artefact.<o:p>
</o:p>
<br>
<br>
</span></font><span style="mso-ansi-language: EN-US" lang="EN-US"><font color="#FFCC99" face="Times New Roman" size="6"><b>Shape
and nature</b></font></span><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">:
this is one of the main reason I collect turtle-like items&nbsp;; I am mostly
intererested in getting at least one object of each possible shape or nature,
even very usual and common artefacts.<br>
<br>
</span></font><span style="mso-ansi-language: EN-US" lang="EN-US"><font color="#FFCC99" face="Times New Roman" size="6"><b>Note</b></font><font color="#FFCC99" face="Times New Roman" size="4">:<span style="mso-bidi-font-style: normal">
</span></font></span><font size="4" face="Times New Roman" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US">a
note can relate to any kind of information regarding the object itself, its
description, its origin, or the identity of<span style="mso-spacerun: yes; mso-ansi-language: EN-US">&nbsp;
</span>the giver.<o:p>
</o:p>
<br>
<br>
</span></font><span style="mso-ansi-language: EN-US" lang="EN-US"><font color="#FFCC99" face="Times New Roman" size="6"><b>Weight
and dimensions</b></font><font color="#FFCC99" face="Times New Roman" size="4">:
</font></span><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">it
was firstly thought of, to distinguish and retrieve the object among others; it
also can be used to define and reserve storage space requirements according to
its physical dimensions.<o:p>
</o:p>
<br>
<br>
</span></font><span style="mso-ansi-language: EN-US" lang="EN-US"><font color="#FFCC99" face="Times New Roman" size="6"><b>Photography</b></font><font color="#FFCC99" face="Times New Roman" size="4">:<span style="mso-bidi-font-style: normal">
</span></font></span><font size="4" face="Times New Roman" color="#FFCC99"><span style="mso-ansi-language: EN-US" lang="EN-US">Increasing
performance of IT and computers allowed to digitize pictures, enabling the use
of photography to illustrate my collection. As I started early, I will probably
need to re-shoot an important part of my collection to meet the current
standards in terms of definition and color accuracy. During my vacation, I
currently carry a laptop computer to display the picture of my collection before
acquiring a new item. Some pictures of my collection are available (see Photo1
and Photo2 in the french pages).<o:p>
</o:p>
<br>
<br>
</span></font><span style="mso-ansi-language: EN-US" lang="EN-US"><font color="#FFCC99" face="Times New Roman" size="6"><b>Tools</b></font><font color="#FFCC99" face="Times New Roman" size="4">:</font></span><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">
a
computer, several reference books and guides as well as measurement devices&nbsp;(see
the Tools section on the french part).<o:p>
</o:p>
</span><span style="mso-ansi-language: EN-US" lang="EN-US"><o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="center">&nbsp;</p>
<p class="MsoNormal" align="center">&nbsp;</p>
<p class="MsoNormal" align="center"><font color="#FFCC99" size="6" face="Times New Roman"><b><span style="mso-ansi-language: EN-US" lang="EN-US">STORAGE<br>
</span></b></font><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><o:p>
</o:p>
</span></font></p>
<p class="MsoNormal" align="justify"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">This
point is getting more and more important as my collection grows. There was a
time when the whole thing was fitting in a cupboard or two. Since then I
experienced severe storage problems. My current project is to dedicate a room to
the exhibition in order to lessen the quantities displayed in the rest of our
appartment. It was due for end of year 2000 but I plan to succed before e.o.y.
2001.</span></font></p>
<p class="MsoNormal"><br>
</p>
<p class="MsoNormal">&nbsp;
</p>
<p class="MsoNormal" align="center"><font color="#FFCC99" size="6" face="Times New Roman"><b><span style="mso-ansi-language: EN-US" lang="EN-US">WHAT
DO I OWN<br>
AND WHAT AM I LOOKING FOR?</span></b></font></p>
<p class="MsoNormal" align="center"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><br>
A detailed information regarding my collection is to be found in the tables in
the french part of this site:</span></font></p>
<p class="MsoNormal" align="center"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US">Please
have a look and do not hesitate to ask questions!
</span></font></p>
<p class="MsoNormal" align="center"><font size="4" color="#FFCC99" face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><br>
<o:p>
 &nbsp;
</span></font><font face="Times New Roman"><span style="mso-ansi-language: EN-US" lang="EN-US"><b><font color="#FFCC99" size="4"><br>
</font><font color="#FFCC99" size="6">
I am looking for the following turtle-like items:</font></b></span></font></p>
<p align=center style='text-align:center'><b><span style='font-size:24.0pt;
color:#FFCC99'>S</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:18.0pt;color:#FFCC99'>hoehorn - </span></b><b><span
style='font-size:24.0pt;color:#FFCC99'>3</span></b><b><span style='font-size:
18.0pt;color:#FFCC99'>D Hologram - </span></b><b><span style='font-size:24.0pt;
color:#FFCC99'>S</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:18.0pt;color:#FFCC99'>ign of restaurant<o:p></o:p></span></b></p>

<p align=center style='text-align:center'><b><span style='font-size:24.0pt;
color:#FFCC99'>B</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:18.0pt;color:#FFCC99'>eard plate - </span></b><b><span
style='font-size:24.0pt;color:#FFCC99'>U</span></b><b style='mso-bidi-font-weight:
normal'><span style='font-size:18.0pt;color:#FFCC99'>mbrella holder - </span></b><b><span
style='font-size:24.0pt;color:#FFCC99'>S</span></b><b style='mso-bidi-font-weight:
normal'><span style='font-size:18.0pt;color:#FFCC99'>calpel<o:p></o:p></span></b></p>

<p align=center style='text-align:center'><b><span style='font-size:24.0pt;
color:#FFCC99'>F</span></b><b style='mso-bidi-font-weight:normal'><span
style='font-size:18.0pt;color:#FFCC99'>ireback - </span></b><b><span
style='font-size:24.0pt;color:#FFCC99'>R</span></b><b style='mso-bidi-font-weight:
normal'><span style='font-size:18.0pt;color:#FFCC99'>osette handle - </span></b><b><span
style='font-size:24.0pt;color:#FFCC99'>C</span></b><b style='mso-bidi-font-weight:
normal'><span style='font-size:18.0pt;color:#FFCC99'>ompass</span></b><b><span
style='font-size:24.0pt;color:#FFCC99'><o:p></o:p></span></b></p>

<CENTER>
<HR ALIGN="CENTER" WIDTH="80%" SIZE="4">
<br>

<span style="color: rgb(255, 204, 153);">Website created in May 1999. Last Update <?php echo $dateDerniereMaj ?></span></p>

</CENTER>

<br><br>	
		
		
		
		
		
			</div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<!-- Menu Toggle Script -->
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	checkVersion("- RESUME ANGLAIS -");
	checkSon();
    </script>

</body>

</html>
