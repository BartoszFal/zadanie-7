<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Dane wejsciowe
    
    $uczniowie = [
        ["imie" => "Adam", "punkty" => 85],
        ["imie" => "Kasia", "punkty" => 92],
        ["imie" => "Marek", "punkty" => 48],
        ["imie" => "Ola", "punkty" => 67],
        ["imie" => "Tomek", "punkty" => 35]
    ];
    
    //Zadanie 1 
    foreach ($uczniowie as $uczen) {

        $punkty = $uczen["punkty"];
    
        if ($punkty >= 90 && $punkty <= 100) {
            $ocena = 5;
        } else if ($punkty >= 80 && $punkty <= 89) {
            $ocena = 4;
        } else if ($punkty >= 60 && $punkty <= 79) {
            $ocena = 3;
        } else if ($punkty >= 40 && $punkty <= 59) {
            $ocena = 2;
        } else {
            $ocena = 1;
        }
    
        echo $uczen["imie"] . " - Ocena: $ocena<br>";
    }

    //Zadanie 2

    foreach ($uczniowie as $uczen) {

        $imie = $uczen["imie"];
        $punkty = $uczen["punkty"];

        echo "<h3>$imie</h3>";

        echo "Punkty: $punkty<br>";

        echo "Procent: " . obliczProcent($punkty) . "<br>";

        echo "Przyznaj ocene: " . przyznajOcene($punkty) . "<br>";

        if (czyZdal($punkty)) {
            echo "Status zaliczony<br>";
        } else {
            echo "Status niezaliczony<br>";
        }

        echo "<br>";

    }

    //zadanie 3

    function obliczProcent($punkty) {
        return $punkty . "%";
    }

    function przyznajOcene($punkty){
        if ($punkty >= 90) {
            return 5;
        } else if ($punkty >= 80) {
            return 4;
        } else if ($punkty >= 60) {
            return 3;
        } else if ($punkty >= 40) {
            return 2;
        } else {
            return 1;
        } 
    }

    function czyZdal($punkty){
        if($punkty >= 40) {
            return true;
        } else {
            return false;
        }
    }
    
    //zadanie 4

    $sumaPunktow = 0;

    for ($i = 0; $i < count($uczniowie); $i++) {

        $sumaPunktow += $uczniowie[$i]["punkty"];
    }

    $liczbaUczniow = count($uczniowie);

    $srednia = $sumaPunktow /$liczbaUczniow;

    //zadanie 5 

    $zaliczyli = [];
    $nieZaliczyli = [];
    
    foreach ($uczniowie as $uczen) {

        if(czyZdal($uczen["punkty"])) {
            $zaliczyli[] = $uczen["imie"];
        } else {
            $nieZaliczyli[] = $uczen["imie"];
        }
    }

    //zadanie 6

    switch(true) {
        case($srednia < 40):
        $komentarz = "Bardzo słaby wynik klasy";
        break;

        case($srednia < 60):
        $komentarz = "Wynik klasy jest niezadawaląjcy";
        break;

        case($srednia < 80):
        $komentarz = "Dobry wynik klasy";
        break;

        default:
        $komentarz = "Bardzo dobry wynik klasy";
        break;
    }

    //zadanie 7 
    echo "<hr>";
    echo "<h2>Podsumowanie klasy</h2>";

    echo "Liczba uczniów: $liczbaUczniow<br>";

    echo "Suma punktów: $sumaPunktow<br>";

    echo "Średnia punktów: " . round($srednia, 1) . "<br><br>";

    echo "Zaliczyło: " . count($zaliczyli) . "<br>";

    echo "Nie zaliczyło: " . count($nieZaliczyli) . "<br><br>";

    echo "Uczniowie, którzy zaliczyli: ";
    echo implode(", ", $zaliczyli) . "<br>";

    echo "Uczniowie, którzy nie zaliczyli: ";
    echo implode(", ", $nieZaliczyli) . "<br><br>";

    echo "Komentarz: $komentarz";
    ?>
    
</body>
</html>