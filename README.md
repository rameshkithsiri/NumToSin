# NumToSin
A simple numeric to Sinhala Unicode converter.
Range is 0 - 99 trillions.


## Usage
1.You want to add our library file.

```
<?php 
require_once('NumToSin.php');
?>
```
2. Create a new object.

```
$numtosin = new NumToSin();
```

3. Set a number with only deciaml number.
```
$numtosin->setNumber(345345435);
```

4. print output
```
echo $numtosin->toSinhala();

//තිස්හාරකෝටි පන්මිලියන තුන්ලක්ෂ හතළිස්පන්දහස් හාරසිය තිස්පහ is output of 345345435
```

