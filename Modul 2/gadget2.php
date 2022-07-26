<?php
class gadget{
public $color = 'Red';

	function __construct(){
		echo "Welcome Gagdet<br>";
	}
	function layar($size='10',$jenis='amoled'){ //($size=10,$jenis='amoled') merupakan nilai default
echo "Size: ".$size;
echo "<br>Jenis: ".$jenis;
echo "<br>Warna: ".$this->color; //pemanggilan warna dalam function
echo "<br><br>";
	}
	function prosesor($speed,$vendor){
		echo "Speed: ".$speed;
		echo "<br>vendor: ".$vendor;
		echo "<br><br>";
	}
}

	$hp = new gadget; //penurunan fungsi gadget
	$hp->layar(); //ketika pemanggilan tidak di isi maka akan muncul nilai default
	$hp->color = 'Silver';
	$hp->layar('X1'); //pengisian argumen mengikuti urutan jadi X1 mengisi ukuran size
	$hp->color = 'Green'; //pemanggilan warna diluar function
	$hp->layar(10,'IPS');
	$hp->prosesor(120, 'IOS');
	$hp->prosesor(130, 'Android');
?>