<?php
 include_once("deck.php");
 
 $myDeck = new Deck;
 
 function fiftyTwoCardsInDeck() {
     echo "\nThere are 52 cards in the deck.\n";
     $testDeck = new Deck;
     $numCardsInDeck = count($testDeck->getDeck());
     assert($numCardsInDeck == 52);
 }
 
 function drawOneCard() {
     echo "\ndeal_one_card returns one card from the deck.\n";
 
     $listOfCards = [
         "2h", "3h", "4h", "5h", "6h", "7h", "8h", "9h", "10h", "Jh", "Qh", "Kh", "Ah",
         "2d", "3d", "4d", "5d", "6d", "7d", "8d", "9d", "10d", "Jd", "Qd", "Kd", "Ad",
         "2c", "3c", "4c", "5c", "6c", "7c", "8c", "9c", "10c", "Jc", "Qc", "Kc", "Ac",
         "2s", "3s", "4s", "5s", "6s", "7s", "8s", "9s", "10s", "Js", "Qs", "Ks", "As"
     ];
 
 
     $testDeck = new Deck;
 
     $dealtCard = $testDeck->deal_one_card();
 
     // assert count
     $numCardsInDeck = $testDeck->getNumCardsInDeck();
     assert($numCardsInDeck === 51);
 
     // assert we returned a card
     $cardFound = array_search($dealtCard, $listOfCards);
     assert($cardFound !== false);
 
 }

 function drawAllCards() {
     echo "\nIf all cards have been dealt, no card is returned.\n";
 
     $testDeck = new Deck;
     $deckShouldBeThisLarge = 52;
 
     while($deckShouldBeThisLarge > 0) {
         $testDeck->deal_one_card();
 
         // assert count decreases with deal
         $numCardsInDeck = $testDeck->getNumCardsInDeck();
 
         $deckShouldBeThisLarge--;
         assert($numCardsInDeck === $deckShouldBeThisLarge);
     }
 
     // assert if all cards have been dealt, no card is returned
     $emptyDeckReturnsNull = $testDeck->deal_one_card();
     assert($emptyDeckReturnsNull === null);
 
 }
 
 function shuffleRetunsNull() {
     echo "\nShuffle returns no value.\n";
 
     $testDeck = new Deck;
 
     // assert shuffle returns null
     $shuffleResult = $testDeck->shuffle();
     assert($shuffleResult === null);
 }
 
 function shuffleChangesDeck() {
     echo "\nCards in the deck are randomly permuted.\n";
 
     $testDeck = new Deck;
     $cardsBeforeShuffle = $testDeck->getDeck();
 
 
     $testDeck->shuffle();
 
     $cardsAfterShuffle = $testDeck->getDeck();
 
     // assert we dropped no cards in shuffle
     assert(count($testDeck->getDeck()) === 52);
 
     // assert decks are not the same
     $deckEqualityAfterShuffle = ($cardsBeforeShuffle === $cardsAfterShuffle);
     assert($deckEqualityAfterShuffle === false);
 }
 
 function providedTestCase() {
     echo "\nA shuffled deck deals 52 cards in random order and no more.\n";
 
     $testDeck = new Deck;
 
     $testDeck->shuffle();
 
     $counter = 52;
     while($counter > 0) {
         $dealtCard = $testDeck->deal_one_card();
 //        print "$dealtCard\t";
         $counter--;
     }
 
     $dealFiftyThirdCard = $testDeck->deal_one_card();
     assert($dealFiftyThirdCard === null);
 
 }
 
 
 
 
 print "\nRunning tests....\n";
 
 fiftyTwoCardsInDeck();
 drawOneCard();
 drawAllCards();
 shuffleRetunsNull();
 shuffleChangesDeck();
 providedTestCase();
 
 print "\nDone.\n\n";