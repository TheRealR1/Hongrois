<?php

/****************************************************
*													*
*		Programmation de l'algorithme Hongrois		*
*													*
****************************************************/

//A propos des valeurs numériques
	//une fraction est un tableau associatif à 
	//trois champs : 
	//	- NUM (toujours positif), 
	//	- DEN (toujours positif),
	//	- SGN qui prend trois valeurs : 1 pour +, -1 pour - et 0 pour 0
	
	//On convient que X/0 fait l'infini (puis discution suivant le signe de X)
	//On convient que 0/0=0/1
	
	//Dans la bibliothèque Fractions.php, est définie l'addition la multiplication, la simplification etc

//A propos de l'algorithme hongrois :

//SELECTION est une matrice avec des true et des false indiquant si les 0 sont séléctionnés ou non
//MARQUAGE est une matrice avec des true et des false indiquant les zéros marqués ou non
//COUVERTURE est un tableau associatif avec deux cases :
//	* une case 'LIG' qui est un tableau de true ou false indiquant si la ligne en question est couverte ou non
//	* une case 'COL' qui est un tableau de true ou false indiquant si la colonne en question est couverte ou non

//Les coordonnée d'un nombre (eg 0) dans une matrice est un tableau ou le premier indice est la ligne et le second la colonne


//G est la matrice saisie par l'utilisateur

//Fait apparaitre un zéro par ligne
function Apparition0Ligne($G){
	return $G;
}

//Fait apparaitre un zéro par colonne
function Apparition0Colonne($G){ 
	return $G;
}

//Renvoie True si l'algorithme Hongrois est fini
function FinAlgoHongrois($SELECTION){
	return True;
}
	
//Initialisation de la variable SELECTION
function InitSELECTION($G){
	return array();
}

//On initialise la variable COUVERTURE
function InitCOUVERTURE($G, $SELECTION){
	return array();
}

//Séléctionne les 0
function SectionDes0($G, $SELECTION){
	return $SELECTION;
}

//renvoie les coordonnées d'un zéro non couvert
//[-1, -1] si c'est pas possible
function ZeroNonCouvert($G, $COUVERTURE){
	return array(-1 , -1);
}

//On initialise la variable de marquage
function InitMarquage($G){
	return array();
}
		
//On marque le 0 dont les coordonées sont passées en paramètre
//La fonction renvoie les coordonnées du 0 sélectionné sur la même ligne que ZERO
//Renvoie [-1, -1] si c'est pas possible
function marquage($ZERO, $MARQUAGE, $SELECTION){
	return array();
}


//Applique la numérotation des 0
//La valeur de retour est une matrice avec des -1 partout et on remplace
//les coordonée des 0 par leur numéro 0, 1, 2 etc...
function numerotation($INIT, $SELECTION, $MARQUAGE){
	return array();
}
	
//Les éléments de la matrice numérotation avec un numéro paire passe à sectionné et les autre à non sélectionné	
function MajSELECTION($SELECTION, $NUMEROTATION){
	// Boucle for parcourant les lignes de la numérotation
	for($i = 0; $i < count($NUMEROTATION); $i++) {
		// Boucle for parcourant les colonnes de la numérotation
		for($j = 0; $j < count($NUMEROTATION[$i]); $j++) {
			// Si nombre dans la numerotation est paire
			if ($NUMEROTATION[$i][$j] % 2 == 0) {
				// On sélectionne le nombre
				$SELECTION[$i][$j] = true;
			// Si nombre dans la numerotation n'est pas -1 (supérieur à 0) et est impair
			} elseif ($NUMEROTATION[$i][$j] > 0 && $NUMEROTATION[$i][$j] % 2 == 1) {
				// On déselectionne le nombre
				$SELECTION[$i][$j] = false;
			}
		}
	}
	return $SELECTION;
}

//Dans G on ajoute le minimum parmis les coef non couvert aux lignes couvertes et on le soustrait aux colonnes non couvertes
function MajG($G, $COUVERTURE){
	return $G;
}
	
//Algorithme hongrois
//Valeur de retour est un tableau ou la case i vaut j si l'affectation de i est j
function AlgoHongois($G){
	return array();
}

//Donne la valeur d'une affectation passé en paramètre
function ValeurAffectation($G, $AFFECTATION){
	return array();
}

function ExempleDuCours(){
	$n=5;
	$G=array();
	for($i=0 ; $i<5 ; $i++) $G[$i]=array();
	
	$G[0][0]=9;
	$G[0][1]=8;
	$G[0][2]=6;
	$G[0][3]=4;
	$G[0][4]=6;

	$G[1][0]=3;
	$G[1][1]=6;
	$G[1][2]=6;
	$G[1][3]=7;
	$G[1][4]=4;

	$G[2][0]=4;
	$G[2][1]=9;
	$G[2][2]=8;
	$G[2][3]=3;
	$G[2][4]=6;

	$G[3][0]=7;
	$G[3][1]=6;
	$G[3][2]=4;
	$G[3][3]=4;
	$G[3][4]=7;

	$G[4][0]=2;
	$G[4][1]=8;
	$G[4][2]=3;
	$G[4][3]=5;
	$G[4][4]=6;

	//Ecrire ce qu'il faut ici pour faire le test sur $G
	//Peut-être que quelques élément d'affichage en latex pourrait
	//etre fort sympathique - demander à HEBERT
}

$SELECTION = array();
for ($i = 0; $i < 5; $i++) {
	$SELECTION[$i] = array();
	for ($j = 0; $j < 5; $j++) {
		$SELECTION[$i][$j] = false;
	}
}

$NUMEROTATION = array();
for ($i = 0; $i < 5; $i++) {
	$NUMEROTATION[$i] = array();
	for ($j = 0; $j < 5; $j++) {
		$NUMEROTATION[$i][$j] = -1;
	}
}

$NUMEROTATION[3][4] = 0;
$NUMEROTATION[2][4] = 1;
$NUMEROTATION[2][1] = 2;
$NUMEROTATION[0][1] = 3;

$SELECTION[0][3] = true;

$test = MajSelection($SELECTION,$NUMEROTATION);

for ($i = 0; $i < 5; $i++) {
	echo "<p>";
	for ($j = 0; $j < 5; $j++) {
		if (!$test[$i][$j]) print "F";
		if ($test[$i][$j]) print "T";
	}
	echo "</p>";
}

//ExempleDuCours()

?>
