<?php
 
 class Deck {
 
     public $deck;
 
     function __construct() {
         // these strings represent playing cards
         // for example, "2h" = 2 of hearts
         // or "Ks" = King of spades
         // the rank is the first letter: 2 -> (A)ce
         // the suite is the lowercase letter
         $this->deck = [
             "2h", "3h", "4h", "5h", "6h", "7h", "8h", "9h", "10h", "Jh", "Qh", "Kh", "Ah",
             "2d", "3d", "4d", "5d", "6d", "7d", "8d", "9d", "10d", "Jd", "Qd", "Kd", "Ad",
             "2c", "3c", "4c", "5c", "6c", "7c", "8c", "9c", "10c", "Jc", "Qc", "Kc", "Ac",
             "2s", "3s", "4s", "5s", "6s", "7s", "8s", "9s", "10s", "Js", "Qs", "Ks", "As"
         ];
     }
 
     function printDeck(): void {
         print implode(" ", $this->deck);
         print "\n";
     }
 
     function getDeck(): array {
         return $this->deck;
     }
 
     function getNumCardsInDeck(): int {
         return count($this->deck);
     }
 
     // this is not typed string because instructions specify
     // "if all cards have been dealt, no card is returned" and I interpret "no card" as null
     // and I'm not running php 8 with union typing :(
     function deal_one_card() {
         return array_pop($this->deck);
     }
 
     function shuffle(): void {
         // shuffle twice because more random feels better
         $this->subShuffle();
         $this->subShuffle();
     }
 
     function subShuffle(): void {
         $sizeOfDeck = count($this->deck) - 1;
         // for each index of the array
         // randomly decide if we swap its location with another random location
         $index = 0;
         foreach ($this->deck as $card) {
             $swapThisCard = rand(0, 1);
             if ($swapThisCard === 1) {
                 $randomIndexOfDeck = rand(0, $sizeOfDeck);
                 $temp = $this->deck[$randomIndexOfDeck];
                 $this->deck[$randomIndexOfDeck] = $this->deck[$index];
                 $this->deck[$index] = $temp;
             }
             $index++;
         }
     }
 }
