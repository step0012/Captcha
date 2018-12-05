<?php
/* chaine de caractère disponible*/
$chaine = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';

/*Affichage de l'image*/
$image = imagecreatefrompng('Images/captchas_1.png');

/* couleur de l'écriture*/
$colorfonts = imagecolorallocate($image, 236, 0, 6);

/* police utilisée*/
$font = 'Fonts/Macopah.ttf';

/* nombre de digit et chaine utilisable */
function getCode($length, $chars)
{
    $code = null;
    for ( $i=0; $i < $length; $i++ )
    {
        $code .= $chars { mt_rand( 0, strlen($chars) - 1 ) };
    }
    return $code;
};

/* appel de la fonction pour récupérer une chaine aléatoire */
$code = getCode(5, $chaine);

/* retourne 1 a 1 les caracteres */
$char1 = substr($code,0,1);
$char2 = substr($code,1,1);
$char3 = substr($code,2,1);
$char4 = substr($code,3,1);
$char5 = substr($code,4,1);

/* dessine un texte avec la police choisie 
params: img / taille / angle / posX / posY / couleur / police */
imagettftext($image, 28, -10, 0, 37, $colorfonts, $font, $char1);
imagettftext($image, 28, -10, 0, 37, $colorfonts, $font, $char2);
imagettftext($image, 28, -10, 0, 37, $colorfonts, $font, $char3);
imagettftext($image, 28, -10, 0, 37, $colorfonts, $font, $char4);
imagettftext($image, 28, -10, 0, 37, $colorfonts, $font, $char5);

/* Entete HTTP a renvoyer pour generer l'image */
header('Content-Type: image/png');

/* envoi de l'image png générée au navigateur */
imagepng($image);

/* destruction de l'image*/
imagedestroy($image);
?>