# NumToSin
A simple numeric to Sinhala Unicode converter.
Range is 0 - 99 trillions.

හින්දු අරාබි ඉලක්කම් සිංහල වචන වලට පරිවර්තනය කිරීමට කිසිඳු php ෙක්තයක් ‍නොතිබුණු නිසා මෙය කේත කරන ලදී . අපගේ මුළු පරාසය වනුයේ මිලියන 99 ත් 0ත් අතරය. මෙය ecommerce වෙබ් අඩවි ආදිය සඳහා ප්‍රයෝජනවත් වේවැයි සිතමු.


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

