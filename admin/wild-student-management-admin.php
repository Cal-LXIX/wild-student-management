<?php

function showCreateStudentForm() {

    if(isset($_POST['lastname']) && isset($_POST['firstname'])) {
        $lastname = htmlentities($_POST['lastname']);
        $firstname = htmlentities($_POST['firstname']);

        ?>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php echo $lastname;  ?>
                    </td>
                    <td>
                        <?php echo $firstname;  ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php
    } else {

    ?>
        <h1>Création d'étudiant</h1>
        
        <form method="POST">  
            <p>
                <label for="">Nom : </label>
                <input type="text" name="lastname"/>
            </p>

            <p>
                <label for="">Prénom : </label>
                <input type="text" name="firstname"/>
            </p>

            <p>
                <input type="submit" value="Créer">
            </p>
        </form>
    <?php
    }
}

add_action( 'admin_menu', 'studentManagementInit' );

function studentManagementInit() {
    add_menu_page(
        'Wild Student Management',
        'Students Management',
        'manage_options',
        'wildstumgmt',
        'showCreateStudentForm'
    );
}