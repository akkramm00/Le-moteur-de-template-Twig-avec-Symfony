<html>
  <head>
    <title>Le monteur de template Twig</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
<h1>Utilisation et Syntaxe de Twig</h1>

    <p>
      Twig peut générer du texte de n'importe hquel format textuel(HTML, XML, CSV, Latex, etc...). Dans ce ours, nous partirons sur des exemples basés surle HTML, qui représentent la plus grande utilisation de Twig.

      Comme nous l'avons vu précédemment, la force d'un motuer de templates comme Twigse situe dans le fait de pouvoir insérerdes variables , des expressions et des conditions PHP dans le HTML.
      NOtons la syntaxe particulière qui est nativement supportée par Twig afin de nous apporter cette puissance:<br><br>

      * {{ ... }} : Permet l'affichage d'une expression <br>
      * {% ... %} : Permet d'exécuter une action.<br>
      * {# ... #} : Permet d'ajouter des commentaires.<br>
    </p>
          
        </div>
      </div>
    </div>
     <section class="container">
      <div class="row">
        <div class="col">
    <h2>Les variables</h2>

    <p>
      La puissance de twig c'est de pouvoir afficher des éléments issus de PHP. Par exemple un objjet, un tableau, ou bien souvent  des éléments issus de la base de données.C'est le controlleur qui a pour mission d'associer ces éléments à la vue . Pour Twiig ces éléments sont des variables (attention à ne pas confondre avec une variable en PHP).

        Ces variables peuvent etre un objet et ce meme objet peut avoir des attributs.On peut par ailleurs y accéder en utilisant la syntaxe: <br><br>
        {{ objet.attribut }}
      <br><br>
      Dans l'exemple ci-dessous "image.name" fait reference au nom de l'objet image. Twig affichera donc son nom. Grace à cette syntaxe? il est possible d'accéder à des méthodes , des prpriétés d'un objet, ou me^me un élément de tableau.
        </div>
      </div>
     </section>

       <header class="container">
      <div class="row">
        <div class="col">
      <h2>Exemple</h2>
       Imaginons que notre image se nomme "Belle image" et que l'on retrouve ceci dans le HTML:<br><br>

      <pre><h1> Le nom de l'image est : {{ image.name}}  </h1></pre><br><br>
    le code ci-dessus affichera :<br>
    le nom de l'image est : Belle image.
    </p>

        <h2> La balise "set"</h2>
    <p>
      Nous pouvons utiliser à tout moment la syntaxe ci-dessous pour créer des variables:
      {%% set exemple = 'coucou'} <br></br>
    Cela définira la variable exemple avec la chaine de caractères "coucou".<br>
    Nous pouvons ensuite utiliser cette varaible ailleurs dans notre modèle en la référençant avec  :  {{ exmple }}.<br>
        {% set exempleTableauiteratif= [1,2]%}<br><br>
          Ce code définira la variable exempleTableauIteratif comme etant un tableau contenant les éléments 1 et 2. Il ne produira aucune sortir dans le modèle.<br><br>

          {% exempleTableauAssociatif = {'lundi': 'travail'}%}<br><br>

          Ce code définira la variable exempleTableauAssociatif comme étant un tableau associatif(également appelé dictionnaire ou map) avec un seul élémnt . L'élément a une clé "lundi" et une valeur "travail"
          
    
      
    </p>
          
        </div>
      </div>
     </section>

    <section class="container">
      <div class="row">
        <div class="col">
         <h2>Les variables Globales </h2>
          <p>
            Un variable globalle est une variable déclarée a l'extérieur des classe mais pouvant etre utilisée n'importe ou dans le projet. Elle peut également prendre le nom de variable de portée globale.<br><br>
            Dans Symfony, pour créer des variables globales ,c-à-d des variables qui seront utilisables dans toute l'application sans avoir besoin de l'injecter à chaque fois dans le controller? il faut commencer par se rendre dans le fichier "twig.yaml" qui se trouve dans le dossier config et créer sa variable globale. <br><br>
            Le chemin exacte est : config\packaegs\twig.yaml. <br><br>
            
          <h2>Exemple</h2>

            Twig:<br>
            default_path: '%kernel.project_dir%/templates'<br>
            globals:<br>
            titre: 'le titre que je veux réutiliser'<br><br</p>


          Pour récuperer cette variable et l'utiliser n'importe ou dans le projet , on peut utiliser la syntaxe suivante: <br><br>
         <h2> {{ titre }}</h2>

          <br><br>
          Twig fournit aussi ceratines variables globales, en voici la liste avec une succincte description:<br>
          * debug : booleen indiquant si le débogage est activé ou non<br>
          * environnement : indique l'environnement en cours , comme dev ou prod<br>
          * request : instance de Symfony\Component\Httpfundation\Request<br>
          * session : instance de Symfony\Component\HttpFoundation\session<br>
          * flashes : tableau de session Flash message<br>
          * user : instance de App\Entity\User<br>
          * tokenStorage : instance de Symfony UsageTtrackingTokenStorage<br><br>

          on appelle ces variables avec le préfixe "app"
          
          <h2>Exemple</h2>

          {% if not app.user %} 
          <br>
           la boucle "if" avec not app.user vérifie si l'objet "app.user est "faux
 ? c'est-à-dire s'il vaut null, false, ou une chaine vide. Si c'est le cas, le contenu de la boucle if sera exécuté.
          
          </p>

          <h2>Les filtres</h2>
          <p>
            Les filtres permettent de modifier les variablres . On sépare la vaiable du filtre avec le symbole pipe "|".<br>
            Il est possible d'enchainer plusieurs filtres ? il faudra à chaque fois rajouter un pipe pour chaque filtre.<br>
            Sachez que vous pouvez créer vous-mêmes vos pro^pores filtres selon vos besoins .<br>
            Un filtre = une fonction d'une classe PHP appelée qui recevera vos différents paramètres.
          </p>
  <h2>Raw et Length </h2>
          <p>
            {{titre |raw |length>50 }}<br>
            Cette expression affiche la longueur de la chaîne de caractères stockée dans la variable "titre".<br>

            Elle utilise également deux filtres: <br>
            * raw :permet de désactiver m'échapement des caractères HTML dans la chaine de caractères. cela signifie que les balises HTML dans la chaine seront interprétées et afichées comme du code HTYML au lieu d'e^tre afficher comme du texte brut.<br>
            le filtre "length" revoie la longueur de la chaine de caractères en nombre de caractères. L'operateur de comparaison " > " vérifie si la longueur de la chaine de caractères est superieur à 50 . SI c'est le cas , l'expression renvoie true? sinon elle revoie false            
         

          <h2> Parenthèse autour des argumuments</h2>
          Les filtres qui acceptent les arguments ont quant à eux des parenthèses autour des arguments comme ceci :<br><br>

          {{ texte |join(', ') }}<br><br>

          Cette expression Twig utilise le filtre pour concaténer tous les éléments d'une liste en une seule chaîne de caractères.<br>
            le filtre join prend en argument une chaine de caractères qui sera utilisée comme séparateur entre chaque élément de la liste .Dans l'expression  {{ texte | join(', ')}}, la chaine ", " (une virgule et un espace ) est utlisée comme séparateur.

             <h2>Apply et endapply</h2>  
On peut notamment appliquer un filtre sur une section de code , avec "apply" et "endapply" comme suit :<br><br>

            {% apply upper %}<br>

            Ce texte  sera en majuscule<br>
            
            {%endapply%}<br>


            <h2>REMARQUE</h2>
            il existe à ce joiur plus d'une cinquantaine de filtre prédéfinis par Twig. Vous pouvez les retrouver dans la documentation officielle de Twig, mais vous avez aussi la possibilité de créer un filtre personnalisé. Pour cela vous devez créer une classe extension afin de pouvoir l'utiliser.
           </p>
        </div>
      </div>
  </section>

         <section class=="container">
           <div class="row">
             <div class="col">
               <h1>Les fonctions en Twig</h1>
               <p>
                  Des fonctions peuvent etre appelées pour générer du contenu. Les fonctions sont appelées par leur nom suivi de parenthèses"()"" et peuvent avoir des arguments. En voici quelques unes foiurnies avec Twig:<br><br>

                 * attributes() : permet d'accéder aux parametres dynamiques d'une variable.<br>
                 * block() : permet de définir un block comme gabarit en utilisant l'héritage et pouvant appelé plusieurs fois.<br>
                 * constant() : permet de retourner la valeur de la constantepar la  chaine de caractères spécifiés.<br>
                 * cycle() : permet de retourner la valeur àla position de cellule d'un tableau.<br>
                 * date() : permet de retourner la dayte avec le format spécifié.<br>
                 * dump() : permet de sortir le contenu d'une variable spécifié.<br>
                 * include () : permet de retourner le rendu du contenu d'un gabarit.<br>
                 * max(): permet de retourner la plus grande valeur d'une séquence ou d'un ensemble de variables.<br>
                 * min() : permet de retourner la plus ptite valeur d'une séquence ou d'un ensemble de variables.<br>
                 * parent() : permet de retourner le contenu du bloc parent quand l'heritage de gabarit est utilisé.<br>
                 ramdon() : permet de retourner iune valeur   aléatoire en fonction du contexte spécifié.<br>
                 * range() : permet de retourner la liste de nombres compris dans l'intervale spécifié.<br>
                 * source() : permet de retourner le contenu d'un gabarit sans son rendu.<br>
                 * template-from_string() : permet de charger un gabarit à partir d'une chaine de acractères spécifiée.<br>
                 
                 
                 
               </p>
             </div>
           </div>
         </section>



    
  </body>
</html>