<?php
    /* Recieves search criteria fromt he user to be sent to search.php. These
critieria include the status of the item, it's id, title, type, time period,
characters body type, size, and color. The only criteria required is the check
out status, the rest can be left blank.*/

    include("../scripts/header.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="../scripts/search.php" method="post">
            <h2>Costume Database Search</h2>
            Do you want to see items that are available or checked out.
            <input type="radio" id="YES" name= "checkout" value="0">
            <label>Available</label>
            <input type="radio" id="NO" name= "checkout" value="1">
            <label>Checked Out</label><br><br>
            <u><b>ID:</b></u> <input type="text" name="id" value="">
            <u><b>Ex:</b></u> If you have the exact id search for it a lone.<br><br>
            <u><b>Title:</b></u> <input type="text" name="title" value="">
            <u><b>Ex:</b></u> A-line Skirt, High Collar Trench Coat, Fish-tail Wedding Gown<br><br>
            <u><b>Type:</b></u> <input type="text" name="type" value="">
            <u><b>Ex:</b></u> Hat, Helmet, Boot, Shoe, Shield, Gorget, Quiver<br><br>
            <u><b>Time Period:</b></u> <input type="text" name="time" value="">
            <u><b>Ex:</b></u> Poodle skirts were wore through out the 1950s, but were
                invented in 1947. You could enter 1947 or 1950, but not
                1950s.<br><br>
            <u><b>Character Body Type:</b></u> <input type="text" name="body" value="">
            <u><b>Ex:</b></u> Masculine, Heavy Muscle; Feminine, Thin; Androgynous<br><br>
            <u><b>Size:</b></u> <input type="text" name="size" value="">
            <u><b>Ex:</b></u> 3XL (shirt), 12 (dress), 42 (waist/men's pant)<br><br>
            <u><b>Material:</b></u> <input type="text" name="material" value="">
            <u><b>Ex:</b></u> Metal, Linen, Poly-Blend, Wood, Foam, Paper, Silk, ThermoPlastic<br><br>
            <u><b>Color:</b></u> <input type="text" name="color" value="">
            <u><b>Ex:</b></u> white, green, indigo, merlow, darkpurple, lightred, pink<br><br><hr>
            <input type="submit" value="Search">
        </form>
    </body>
</html>
