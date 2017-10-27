<html><body>
<?php
	$tuzla=file('tuzla.txt');
	$f=fopen('261.txt','r');
	$D=array();
	while(!feof($f))
	{
		$line=fgets($f);
		$a=explode("\t", rtrim($line));
		
		$lect=$a[7].' '.$a[8]."\r\n";
		if(!in_array($lect, $tuzla))
		{
			$dept=substr($a[4],0,3);
			if(array_key_exists($dept,$D))
				$D[$dept]+=1;
			else
				$D[$dept]=1;
		};
	};
	fclose($f);
	unset($D[0]);
	arsort($D);
	$f2=fopen('lab05q1.txt','a');
	foreach($D as $k => $v)
		fwrite($f2,$k.' '.$v."\r\n");
	fwrite($f2,"--------\r\n");	
	fwrite($f2,'Total: '.array_sum($D)."\r\n");
	fclose($f2);
?></body></html>
