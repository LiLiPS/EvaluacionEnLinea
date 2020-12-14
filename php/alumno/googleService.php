<?php 
# Includes the autoloader for libraries installed with composer
require '../../vendor/autoload.php';
# Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Cloud\Language\V1\PartOfSpeech\Tag;
// Imports the Cloud Storage client library.
use Google\Cloud\Storage\StorageClient;

function analizaSintaxis($text){
	$path = 'C:\Googlekey.json';

	# Your Google Cloud Platform project ID
	$projectId = '';
	# Instantiates a client
	$language = new LanguageClient([
	    'projectId' => $projectId,
	    'keyFilePath' => $path 
	]);


	# The text to analyze
	//$text = 'La inteligencia artificial es una ciencia muy importante para la vida diaria.';

	$response = $language->analyzeSyntax($text);
	$porcentaje = 0;
	$contador = 0;
	/*
	DET -- 10
	ADJ -- 10
	NOUN -- 20
	PRON -- 15
	VERB -- 20 
	PRT --5
	PUNCT --5
	CONJ --5
	ADP --5
	ADV --5
	*/

	foreach ($response->tokens() as $token) {
		/*print_r($token['text']);
		echo "<br>";
		print_r($token['partOfSpeech']['tag']);*/
		switch ($token['partOfSpeech']['tag']) {
			case 'DET':
				$porcentaje += 90;
				break;
			case 'ADJ':
				$porcentaje += 90;
				break;
			case 'NOUN':
				$porcentaje += 100;
				break;
			case 'PRON':
				$porcentaje += 90;
				break;
			case 'VERB':
				$porcentaje += 100;
				break;
			case 'PRT':
				$porcentaje += 50;
				break;
			case 'PUNCT':
				$porcentaje += 50;
				break;
			case 'CONJ':
				$porcentaje += 70;
				break;
			case 'ADP':
				$porcentaje += 50;
				break;
			case 'ADV':
				$porcentaje += 70;
				break;	
		}

		$contador++;
		/*echo "<br>";
		print_r($token['partOfSpeech']);
		echo "<br>";
		print_r($token['dependencyEdge']);
		echo "<br>";
		print_r($token['lemma']);
		echo "<br><br>";*/
	}

	$p_total = $porcentaje/$contador;

	return $p_total;
}


?>