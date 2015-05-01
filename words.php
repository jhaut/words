<?php
//recup des mots
$words = explode(PHP_EOL,implode('',array_map('file_get_contents',glob('words/*'))));

//filtrage des noms
$words = array_filter($words, function($word){
	return strpos($word, '	Nom:')!==false;
});

//parsage des mots
$words = array_map(function($word){
	$word = explode('	',$word);
	return $word[1];
},$words);

//au cas ou
$words = array_unique($words);

//filtrage des petits mots
$words = array_filter($words,function($word){
	return strlen($word)>=14;
});
?>
<html>
	<body>
		<h1 style="font-size:100px;text-align:center;margin: 100px 0;"><?=$words[array_rand($words)];?></h1>
	</body>
</html>