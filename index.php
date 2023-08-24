<html>
  <head>
    <title>Le monteur de template Twig</title>
  </head>
  <body>
<h1>Utilisation et Syntaxe de Twig</h1>

    <p>
      Twig peut générer du texte de n'importe hquel format textuel(HTML, XML, CSV, Latex, etc...). Dans ce ours, nous partirons sur des exemples basés surle HTML, qui représentent la plus grande utilisation de Twig.

      Comme nous l'avons vu précédemment, la force d'un motuer de templates comme Twigse situe dans le fait de pouvoir insérerdes variables , des expressions et des conditions PHP dans le HTML.
      NOtons la syntaxe particulière qui est nativement supportée par Twig afin de nous apporter cette puissance:<br><br>

      * {{ ... }} : Permet l'affichage d'une expression <br>
      * {% ... %} : Permet d'exécuter une action.<br>
      * {# ... #} : Permet d'ajouter des commentaires.<br>
    </p>

    <h2>Les variables</h2>

    <p>
      La puissance de twig c'est de pouvoir afficher des éléments issus de PHP. Par exemple un objjet, un tableau, ou bien souvent  des éléments issus de la base de données.C'est le controlleur qui a pour mission d'associer ces éléments à la vue . Pour Twiig ces éléments sont des variables (attention à ne pas confondre avec une variable en PHP).

        Ces variables peuvent etre un objet et ce meme objet peut avoir des attributs.On peut par ailleurs y accéder en utilisant la syntaxe: <br><br>
        {{ objet.attribut }}
      <br><br>
      Dans l'exemple ci-dessous "image.name" fait reference au nom de l'objet image. Twig affichera donc son nom. Grace à cette syntaxe? il est possible d'accéder à des méthodes , des prpriétés d'un objet, ou me^me un élément de tableau.

      <h2>Exemple</h2>
       Imaginons que notre image se nomme "Belle image" et que l'on retrouve ceci dans le HTML:<br><br>

      <pre><h1> Le nom de l'image est : {{ image.name}}  </h1></pre><br><br>
    le code ci-dessus affichera :<br>
    le nom de l'image est : Belle image.

      
      
        
    </p>
    
  </body>
</html>