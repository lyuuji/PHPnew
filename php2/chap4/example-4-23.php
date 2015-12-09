<?php
$dinner = array('Sweet Corn and Asparagus',
                'Lemon Chicken',
                'Braised Bamboo Fungus');
$meal = array('breakfast' => 'Walnut Bun',
              'lunch' => 'Cashew Nuts and White Mushrooms',
              'snack' => 'Dried Mulberries',
              'dinner' => 'Eggplant with Chili Sauce');

print "Before Sorting: <br>\n";
foreach ($meal as $key => $value ) {
    print " \$meal: $key $value\n <br>";
}

ksort($meal);
//krsort($meal);

print "After Sorting:\n";
foreach ($dinner as $key => $value) {
    print " \$dinner: $key $value\n <br>";
}
foreach ($meal as $key => $value) {
    print "   \$meal: $key $value\n <br>";
}
