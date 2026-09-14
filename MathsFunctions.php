<?php

class MathsFunctions
{

  public function __construct(private float $valeur, private string $fonction)
  {
  }

  public function calculer()
  {
    switch ($this->fonction) {
      case 'square':
        return $this->valeur * $this->valeur;

      case 'cube':
        return $this->valeur ** 3;

      case 'squareroot':
        return sqrt($this->valeur);

      case 'ln':
        return log($this->valeur);  // Log népérien par défaut
    }
  }
}
