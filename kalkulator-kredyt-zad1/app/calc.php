<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$q = $_REQUEST ['q']; 


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($x) && isset($y) && isset($q))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $x == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $y == "") {
	$messages [] = 'Nie podano lat kredytu';
}
if ( $q == "") {
	$messages [] = 'Nie podano oprocentowania w procentach';
}
//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Lata nie są liczbą całkowitą';
	}	

	if (! is_numeric( $q ) ) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą wiekszą od 0';
	}	

	// sprawdzenie, czy $x i $y i $q są liczbami nie ujemnymi
		if (( $x ) < 0 ) {
			$messages [] = 'Kwota kredytu jest mniejsza od 1';
		}
		
		if (( $y ) <= 0) {
			$messages [] = 'Minimalna wartość do 1 rok ';
		}	
	
		if (( $q ) < 0 ) {
			$messages [] = 'Oprocentowanie nie jest liczbą wiekszą od 0';
		}
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$x = intval($x);
	$y = intval($y);
	$q = round(floatval($q), 2);

	//wykonanie operacji
	$s = (1+(($q/100)/12));
	$a = ($s**($y*12));
	$b = ($s-1);
	$c = ($s**($y*12)-1);
	
	//wynik końcowy
	$result = round($x*$a*$b/$c, 2);
	}

include 'calc_view.php';