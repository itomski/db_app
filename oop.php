<?php

class Fahrzeug {

    private static int $count = 0; // Klassenvariable: Alle Objekte teilen sich eine Variable, die in der Klasse steht
    private int $id; // Instanzvariable: Jedes Objekt hat seine eigenen
    private string $kennzeichen;
    private string $marke;
    private string $modell;
    private int $baujahr;

    public function __construct(string $kennzeichen, string $marke, string $modell, int $baujahr)
    {
        // $kennzeichen = lokale Variable
        // $this->kennzeichen = Instanzvariable
        // $this = Referenz auf das aktuelle Objekt
        // self = Referenz auf die Klasse. Alle Objekte greifen über self::count auf die gleiche Variable zu
        $this->id = ++self::$count;
        $this->kennzeichen = $kennzeichen;
        $this->marke = $marke;
        $this->modell = $modell;
        $this->baujahr = $baujahr;
    }

    // Instanzmethoden können auf das statische Inventar (Attribute und Methoden) zugreifen
    // Klassenmethoden können NUR das statische Inventar (Attribute und Methoden) verwenden

    public static function resetCount() {
        self::$count = 0;
    }

    public static function nextCount() {
        ++self::$count;
    }

}

echo '<pre>';
$f1 = new Fahrzeug('HH:AB123', 'VW', 'Polo', 2010);
Fahrzeug::nextCount(); // Aufruf einer statischen Methode
$f2 = new Fahrzeug('HH:XY722', 'Opel', 'Corsa', 2019);
Fahrzeug::nextCount();
$f3 = new Fahrzeug('HH:XY992', 'Ford', 'Mustang', 1972);
Fahrzeug::resetCount();
$f4 = new Fahrzeug('HH:AB997', 'Fiat', '500', 2022);
print_r($f1);
print_r($f2);
print_r($f3);
print_r($f4);
echo '</pre>';