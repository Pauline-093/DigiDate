<title>title beacue fun </title>
<div class="header inset-x-0 top-0">
    <h1>Kindertinder</h1>
    <nav>
        <ul>

<?php
if(isset($_SESSION['user'])){
    //user//
    $menuitems = array(
        array("Home", "Main"),
        array("itemuser","items"),
        array("winkelmand", '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-basket2-fill" viewBox="0 0 16 16">
                <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z"/>
            </svg>'),
//        array("order","pagina"),
//        array("bestelpagina","bestelpagina"),
        array("shipping_details", "shipping details"),
        array("order","pagina"),
        array("geschiedenis", "bestel geschiedenis"),
    );

    echo '<a href="php/logout.php" class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">

    <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/>
    <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/>

  </svg></a>';

    foreach($menuitems as $menuitem) {
        echo '<a href="index.php?page=' . $menuitem[0] . '">' . $menuitem[1] . '</a>';
    }


} else if(isset($_SESSION['admin'])){
    //admin
    $menuitems2 = array(
        array("Home", "Home"),
        array("shipping_details", "shipping details"),

        array("items", "items"),
        array("add","add items"),

        array("producten", "producten"),
        array("productenadd", "producten toevoegen"),
    );

    echo '<a href="php/logout.php" class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 16">

    <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/>
    <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/>

  </svg></a>';


    foreach($menuitems2 as $menuitem2) {
        echo '<a href="index.php?page=' . $menuitem2[0] . '">' . $menuitem2[1] . '</a>';
    }
} else {
    //guest
    $menuitems3 = array(
        array("registreren", "Registreren"),
        array("inlog", "Inlog"),
    );
    foreach($menuitems3 as $menuitem3) {
        echo '<a href="index.php?page=' . $menuitem3[0] . '">' . $menuitem3[1] . '</a>';
    }
}


//admin//
//    "admin" => array(
//        array("Home", "main"),
//        //array("categorieën", "catogorieAdmin"),
//      //  array("products", "products"),
//        array("inloggen", "inlog"),
//        array("registreren", "registreren"),
//
//
//    ),


// Determine user role (for example, based on their login status)
//$userRole = isset($_SESSION['role']) && array_key_exists($_SESSION['role'], $navItems) ? $_SESSION['role'] : 'guest';

// Generate navbar based on user role

?>

<!--            --><?php //foreach ($navItems[$userRole] as $item){ ?>
<!--                <li><a href="?page=--><?//= $item[1] ?><!--">--><?//= $item[0] ?><!--</a></li>-->
<!--            --><?php //} ?>
        </ul>
    </nav>
</div>
<?php