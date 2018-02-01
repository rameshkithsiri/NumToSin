<?php
/*
	
	This code is written by H.A.Ramesh Kithsiri.
	This is a useful codes to ecommerce websites and cheque writing softwares.
*/

class NumToSin{

	protected $num;

	public function setNumber($num){
		$this->num = $num;
	}

	protected function expByPos($str,$arr){
		sort($arr);
		$explode = array();
		foreach ($arr as $key => $pos){
			if(isset($arr[$key +1])&&strlen($str)>abs($arr[$key+1])&&strlen($str)<abs($pos)){
				array_push($explode, substr($str,0,($arr[$key+1]+strlen($str))));
			}
			elseif(strlen($str)>=abs($pos)){
				array_push($explode, substr($str,$pos,(isset($arr[$key+1]))?$arr[$key+1]-$arr[$key]:strlen($str)));
			}elseif(strlen($str)==1&&$key==0){
				array_push($explode,$str);
			}
		}
		return $explode;
	}

	public function toSinhala($number=1,$last=FALSE){

		if($number==0) return "බින්දුව";
		$values=array(-2,-3,-5,-6,-7,-9,-12,-15);
		$suffixes=array('','සිය ','දහස් ','ලක්ෂ ','මිලියන ','කෝටි ','බිලියන ','ත්‍රිලියන ');
		$mainwords=array("දහය","සියය","දහස","ලක්ෂය","මිලියනය",'කෝටිය','බිලියනය',"ත්රිලියනය");
		$numbers1 = array('එක','දෙක','තුන','හතර','පහ','හය','හත','අට','නවය','දහය','එකොළහ','දොළහ','දහතුන','දහහතර','පහළොව','දහසය','දහහත','දහඅට','දහනවය');
		$numbers1prefix = array('එක්','දෙ','තුන්','හාර','පන්','හය','හත්','අට','නව','දහ','එකෝළොස්','දොළොස්','දහතුන්','දහහතර','පහළොස්','දහසය','දහහත්','දහඅට','දහනව');
		$numbers10=array('විස්ස','තිහ','හතළිහ','පනහ','හැට','හැත්තෑව','අසූව','අනූව','සියය');
		$numbers10suffix=array('විසි','තිස්','හතළිස්','පනස්','හැට','හැත්තෑ','අසූ','අනූ');
		if($last){
			$numbers10=$numbers10suffix;
			$numbers1=$numbers1prefix;
			$mainwords=$suffixes;
		}
		$str = '';
		$zeros = 0;
		$explodes = array_reverse($this->expByPos($this->num,$values));
		foreach($explodes as $key => $numb){
			if(!$key){
				if($numb>0&&$numb<20) {
					$str = $numbers1[$numb-1];
				}elseif($numb==0){
					$zeros=1;
				}
				else {
					if($numb%10==0) $str = $numbers10[floor($numb/10)-2];
					else $str = $numbers10suffix[floor($numb/10)-2].$numbers1[($numb%10)-1] ;
				}
			} else{
				if($numb>0&&$numb<20) {
					if($zeros==0)$str = $numbers1prefix[$numb-1].$suffixes[$key].$str;
					else{
					 $str = $numbers1prefix[$numb-1].$mainwords[$key].$str;
					 $zeros=0;
					}
				}
				elseif($numb!=0&&$numb<100) {
					if($zeros) {
						$suffix = $mainwords[$key];
						$zeros=0;
					}
					else $suffix =$suffixes[$key];
					if($numb%10==0) $str = $numbers10suffix[floor($numb/10)-2].$suffix.$str;
					else $str = $numbers10suffix[floor($numb/10)-2].$numbers1prefix[($numb%10)-1].$suffix.$str ;
				}elseif($numb!=0){

					if($zeros) {
						$suffix = $mainwords[$key];
						$zeros=0;
					}
					else $suffix =$suffixes[$key];
					$str = toSinhala($numb,TRUE).$suffix.$str;
				}
			}
		}
		$str = str_replace(array("එක්සිය", "හතරසිය","පන්බිලියන"),array("එකසිය","හාරසිය","පස්බිලියන"),$str);
		return $str;
	}
}

?>
