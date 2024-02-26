<?php

class TableRows extends RecursiveIteratorIterator {
   function __construct($it) {
	   parent::__construct($it, self::LEAVES_ONLY);
   }

   function current(): String {
	   return "<td class = \"w3-border\">" . parent::current(). "</td>";
   }

   #[\ReturnTypeWillChange]
   function beginChildren() {
	   echo "<tr>";
   }

   #[\ReturnTypeWillChange]
   function endChildren() {
	   echo "</tr>" . "\n";
   }
}