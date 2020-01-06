<?php

/* Function pour afficher les logs */

function logDebug($log)
{
	echo "<div style='font-weight:bold;background-color:red;color:black;border:2px solid black;padding:2px;word-wrap:break-word;'>".$log."</div><br>";
}

/*
*	Enlever les accents
*/
function wd_remove_accents($str, $charset='utf-8')
{
    $str = htmlentities($str, ENT_NOQUOTES, $charset);
    
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    return $str;
}

function wd_unaccent_compare($a, $b)
{
    return strcmp(wd_remove_accents($a), wd_remove_accents($b));
}

if (!function_exists('mb_ucfirst'))
{
    function mb_ucfirst($string)
    {
        if (function_exists('mb_strtoupper') && function_exists('mb_substr'))
        {
            return mb_strtoupper(mb_substr($string, 0, 1), 'UTF-8').mb_substr($string, 1);
        }
        else
        {
            // Credit to Quicker at http://php.net/manual/en/function.ucfirst.php
            // If it does not work, replace it with another utf8 ucfirst function
            if ($string{0} >= "\xc3")
            {
                return ($string{1} >= "\xa0"
                        ? ($string{0}.chr(ord($string{1})-32))
                        : ($string{0}.$string{1})).substr($string, 2);
            }
            return ucfirst($string);
        }
    }
}

/*
*	Mobile device detection
*/
if( !function_exists('mobile_user_agent_switch') ) {
	function mobile_user_agent_switch(){
		$device = '';
		
		if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
			$device = "ipad";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'ipod') ) {
			$device = "ipod";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
			$device = "iphone";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
			$device = "blackberry";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
			$device = "android";
		} else if( stristr($_SERVER['HTTP_USER_AGENT'],'webOS') ) {
			$device = "webOS";
		}
		if( $device ) {
			return $device; 
		} return false; {
			return false;
		}
	}
}

function isTactile() {
	if (mobile_user_agent_switch()!="") return true;
	else return false;
}

/*
*	Smartphone device detection : mettre à jour sur : http://detectmobilebrowsers.com/
*/
function isMobile() {
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		return true;
	else return false;
	header('Location: http://detectmobilebrowser.com/mobile');
}

/* Converti une date sql au format americain YYYYMMDD en une date française en lettres */
function f_dateFR($dateSql)
{
	// TEMPS
	// $temps = time();
	$temps=strtotime($dateSql);
	
	// JOURS
	$jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$jour_numero_semaine = date('w', $temps);
	$jour_lettres = $jours[$jour_numero_semaine];
	// Numero du jour
	$jour_numero = date('d', $temps);

	// MOIS
	$mois = array(' ', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	$mois_numero = date("n", $temps);
	$mois_lettres = $mois[$mois_numero];

	$an = date('Y', $temps);

	$fr_temps="$jour_lettres $jour_numero $mois_lettres $an";

	return "$fr_temps";
}

function f_dateNumber($dateSql)
{
	$temps=strtotime($dateSql);
	$en_temps = date('d/m/y', $temps);
	return "$en_temps";
}

function f_dateEN($dateSql)
{
	// TEMPS
	// $temps = time();
	$temps=strtotime($dateSql);
	$en_temps = date('l jS \of F Y', $temps);
	return "$en_temps";
}

function f_timeFR($dateSql)
{
	// TEMPS
	// $temps = time();
	$temps=strtotime($dateSql);
	
	$heures = date('H', $temps);
	$minutes = date('i', $temps);
	$secondes = date('s', $temps);
	$fr_temps = $heures."h".$minutes;
	return $fr_temps;
}
?>