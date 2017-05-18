# My-Theme-Options :

[My-Theme-Options](https://github.com/generalchbil/My-Theme-Options.git)
C'est un exemple de création d'une page Setting Wordpress 

# Getting Started

 * Copier le repertoire <span style='color:red'> Functions </span> dans votre theme 
 
 * Ajouter ces deux lignes dans le fichier <span style='color:blue'> functions.php </span>
 ```php
    require get_template_directory() . '/functions/assets-theme.php';
    require get_template_directory() . '/functions/admin-menu.php';
```
