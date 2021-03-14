<?php
    /* Project Title: Costume Inventory
     * Author: Adam McCann
     * Course: Senior Project
     * Date: 4/26/2021
     * File: insertInput.php
     * 
     * Receives the details of a costume piece to be added to the database.
All are required for successful submission of the form. The form reterieves data
for title, type, time period, the characters body type, size, material, and color.*/

    include("../scripts/header.php");
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="../scripts/insert.php" method="post">
            <h2>Attributes of the Costume piece to be added</h2>
            <u><b>Title:</b></u> Your title should be concise, but descriptive.<br>
                Ex: A-line Skirt, High Collar Trench Coat, Fish-tail Wedding Gown<br>
                <input type="text" name="title" required><br><br>
            <u><b>Type:</b></u> One word to describe the article of clothing, armor, etc.<br>
                Ex: Hat, Helmet, Boot, Shoe, Shield, Gorget, Quiver<br>
                <input type="text" name="type" required><br><br>
            <u><b>Time Period:</b></u> This should be an exact year.<br>
                Ex: Poodle skirts were wore through out the 1950s, but were
                    invented in 1947. You could enter 1947 or 1950, but not
                    1950s.<br>
                <input type="text" name="time" required><br><br>
            <u><b>Character Body Type:</b></u> This is a one word descriptor only of the character that would
                    wear this article of clothing.<br>
                Ex: Masculine, Feminine, Thin, Androgynous<br>
                <input type="text" name="body" required><br><br>
            <u><b>Size:</b></u> If there is a tag use that size, if not, use a critical measurement.<br>
                Ex: 3XL (shirt), 12 (dress), 42 (waist/men's pant)<br>
                <input type="text" name="size" required><br><br>
            <u><b>Material:</b></u> A single word that indicates the material the article is made of.<br>
                Ex: Metal, Linen, Poly-Blend, Wood, Foam, Paper, Silk, ThermoPlastic<br>
                <input type="text" name="material" required><br><br>
            <u><b>Color:</b></u> Simple one word color description.<br>
                Ex: white, green, indigo, purple, red, pink<br>
                <input type="text" name="color" required><br><br>
            <u><b>Location:</b></u> Where will the piece be stored.<br>
                Ex: Warehouse Upstairs, Warehouse Downstairs, Costume Shop, Drama Department<br>
                <input type="text" name="location" required><br><br>
            <u><b>Care:</b></u> How should the piece be laundered.<br>
                Ex: Spot Clean, Dry Clean, Hand Wash, Machine Wash<br>
                <input type="text" name="care" required><br><br><hr>
            <input type="submit" value="Add">
        </form>
    </body>
</html>

