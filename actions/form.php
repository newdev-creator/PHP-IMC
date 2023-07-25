<?php

$BMIData = [
  ['name' => "Maigreur", 'color' => "midnightblue", 'range' => [0, 18.5]],
  ['name' => "Bonne santé", 'color' => "green", 'range' => [18.5, 25]],
  ['name' => "Surpoids", 'color' => "lightcoral", 'range' => [25, 30]],
  ['name' => "Obésité modérée", 'color' => "orange", 'range' => [30, 35]],
  ['name' => "Obésité sévère", 'color' => "crimson", 'range' => [35, 40]],
  ['name' => "Obésité morbide", 'color' => "purple", 'range' => [40, PHP_INT_MAX]],
];

$request = [
  filter_input(INPUT_GET, 'height', FILTER_SANITIZE_SPECIAL_CHARS),
  filter_input(INPUT_GET, 'weight', FILTER_SANITIZE_SPECIAL_CHARS),
];

function calculBMI(array $request)
{
  $height = $request[0];
  $weight = $request[1];

  if (!is_numeric($height) || !is_numeric($weight) || $weight <= 0 || $height <= 0) {
    return "Les valeurs de taille et de poids doivent être numériques et ne peuvent être vides.";
  }

  $heightInMeters = $height / 100;
  $weightInKg = $weight;

  $bmi = $weightInKg / ($heightInMeters * $heightInMeters);

  return $bmi;
}

function showResult(float $bmi, array $BMIData)
{
  $result = null;
  foreach ($BMIData as $data) {
    if ($bmi >= $data['range'][0] && $bmi < $data['range'][1]) {
      $result = $data['name'];
      break;
    }
  }
  return $result;
}

$result = calculBMI($request);
$finalResult = showResult($result, $BMIData);

header("Location: ../index.php?bmi=$result&result=$finalResult");
